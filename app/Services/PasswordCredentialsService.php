<?php

namespace App\Services;

use App\Exceptions\InvalidRequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordCredentialsService
{
    public $request;
    public AksesTokenService $aksesTokenService;
    public AppClientSevice $appClientSevice;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->aksesTokenService = new AksesTokenService();
        $this->appClientSevice = new AppClientSevice();
    }
    public function getCredentialFromRequest()
    {
        return [
            'email' => $this->request->get('email'),
            'password' => $this->request->get('password')
        ];
    }
    public function getResponse()
    {
        $credentialFromRequest = $this->getCredentialFromRequest();
        if (!$credentialFromRequest['email']) {
            throw new InvalidRequestException("Credential email kosong");
        } else if (!$credentialFromRequest['password']) {
            throw new InvalidRequestException("Credential password kosong");
        }
        $app = $this->appClientSevice->validate($this->request);
        $auth = Auth::attempt($credentialFromRequest);
        $user = Auth::user();
        if ($auth) {
            $token = $this->aksesTokenService->create($user->id, $app->id);
            return [
                'aksess_token' => $token->akses_token,
                'token_type' => "Bearer",
                'expires_in' => time() + 60 * 60,
            ];
        }
        throw new InvalidRequestException("User not found");
    }
}
