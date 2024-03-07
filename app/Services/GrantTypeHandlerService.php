<?php

namespace App\Services;
use App\Exceptions\UnsuportedGrantTypeException;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Password;

class GrantTypeHandlerService{
    protected $grantTypeSupported = [
        'authorization_code',
        'password',
    ];
    const GRANT_AUTORIZATION_CODE = "authorization_code";
    const GRANT_PASSWORD = 'password';
    public function checkGrantType($grantType) : bool{
        if(!in_array($grantType,$this->grantTypeSupported)) {
            throw new UnsuportedGrantTypeException('Grant type tidak di dukung');
        }
        return true;

    }
   /**
    * Undocumented function
    *
    * @param Request $request
    * @return HttpResponse
    */
    public function handle(Request $request) : HttpResponse{
        $service = null;
        if ( $request->get('grant_type') === self::GRANT_AUTORIZATION_CODE ) {
            $service = new AuthorizationCodeService($request);
        } else if($request->get('grant_type')===self::GRANT_PASSWORD) {
            $service = new PasswordCredentialsService($request);
        }
        return response($service->getResponse(),200, [
            'Content-Type:application/json'
        ]);
    }
}
