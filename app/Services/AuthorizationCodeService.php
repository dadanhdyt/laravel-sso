<?php

namespace App\Services;

use App\Exceptions\InvalidGrantException;
use App\Exceptions\InvalidGrantTypeException;
use App\Models\AuthCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorizationCodeService
{
    public AksesTokenService $aksesTokenServce;
    public Request $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->aksesTokenServce = new AksesTokenService();
    }
    public function findByCode($code)
    {
        return AuthCode::whereCode($code)->first();
    }
    public function check()
    {
        $code = $this->request->get('code');
        $authCode = $this->findByCode($code);
        if (!$authCode) {
            throw new InvalidGrantException('Authorization code tidak di temukan');
        }
        if ($authCode->app_client->client_id != $this->request->get('client_id')) {
            throw new InvalidGrantException('Authorization grant invalid');
        }
        if ($authCode->expired <= time()) {
            throw new InvalidGrantException('Authorization code expired');
        }
        return $authCode;
    }
    public function getUser()
    {
        $info = $this->findByCode($this->request->get('code'));
        if (!$info) {
            throw new InvalidGrantException("Invalid user");
        }
        return $info->user;
    }
    public function getResponse()
    {
        $authCode = $this->check();
        $user =  $this->getUser();
        $token  = $this->aksesTokenServce->create($user->id, $authCode->app_client_id);
        $authCode->delete();
        return [
            'aksess_token' => $token->akses_token,
            'token_type' => "Bearer",
            'expires_in' => time() + 60 * 60,
        ];
    }
}
