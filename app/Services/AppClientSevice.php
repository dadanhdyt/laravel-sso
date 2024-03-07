<?php

namespace App\Services;

use App\Exceptions\InvalidClientException;
use App\Models\AppClient;
use Illuminate\Http\Request;

class AppClientSevice
{
    public function validate(Request $request)
    {
        if( !$request->get('client_id') ) {
            throw new InvalidClientException("Request was missing the 'client_id' parameter");
        } else if(!$request->get('secret_key')) {
            throw new InvalidClientException("Request was missing the 'secret_key' parameter");
        }
        $app = AppClient::where([
            'client_id' => $request->get('client_id'),
            'secret_key' => $request->get('secret_key')
        ])->first();
        if (!$app) {
            throw new InvalidClientException("Client app tidak terdaftar di sistem oauth kami");
        }
        return $app;
    }
}
