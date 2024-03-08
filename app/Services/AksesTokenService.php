<?php
namespace App\Services;

use App\Exceptions\AksesTokenExpiredException;
use App\Exceptions\UnauthorizeException as ExceptionsUnauthorizeException;
use App\Models\AksesToken;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use UnauthorizeException;

class AksesTokenService{
    /**
     * Undocumented function
     *
     * @param string $user_id
     * @param string $app_client_id
     * @return AksesToken
     */
    public function create(string $user_id, string $app_client_id) : AksesToken{
        $akses_token = md5(openssl_random_pseudo_bytes(256).uuid_create(UUID_TYPE_DEFAULT));
        return AksesToken::create([
            'user_id' => $user_id,
            'app_client_id' => $app_client_id,
            'akses_token' => $akses_token,
            'expired' => time()+60*60,
        ]);

    }
    public function validateToken(?string $akses_token){
        $token = AksesToken::whereAksesToken($akses_token)->first();
        if(empty($akses_token)){
            throw new \InvalidArgumentException("Request tidak ada aksestoken nya");
        }
        if ( !$token ){
            throw new ExceptionsUnauthorizeException("Unauthorized");
        }
        if($token->expired < time()) {
            throw new AksesTokenExpiredException("Akses token expired");
        }
        return $token;
    }
}
