<?php

namespace App\Http\Controllers\SSO;

use App\Exceptions\ExceptionInterface;
use App\Exceptions\InvalidClientException;
use App\Exceptions\InvalidGrantException;
use App\Exceptions\InvalidRequestException;
use App\Exceptions\UnsuportedGrantTypeException;
use App\Http\Controllers\Controller;
use App\Services\AppClientSevice;
use App\Services\GrantTypeHandlerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TokenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,
    GrantTypeHandlerService $grantTypeHandlerService,
    AppClientSevice $appClientSevice)
    {
        try {
            $param = $request->only([
                'grant_type',
                'client_id',
                'secret_key',
            ]);
            $grantTypeHandlerService->checkGrantType($param['grant_type']);
            $appClientSevice->validate($request);
            return $grantTypeHandlerService->handle($request);

        } catch (UnsuportedGrantTypeException|InvalidRequestException|InvalidGrantException $th) {
            return response(unserialize($th->getMessage()),400, [
                'Content-Type:application/json'
            ]);
        } catch(InvalidClientException $th){
            return response(unserialize($th->getMessage()),401, [
                'Content-Type:application/json'
            ]);
        }

    }
}
