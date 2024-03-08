<?php

namespace App\Http\Middleware;

use App\Exceptions\AksesTokenExpiredException;
use App\Exceptions\UnauthorizeException;
use App\Services\AksesTokenService;
use Closure;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ApiOauthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        try{

            $tokenService = new AksesTokenService();
           $validated = $tokenService->validateToken($token);
           if($validated->user) {
            $request->attributes->add(['user'=>$validated->user]);
            return $next($request);
           }
           throw new UnauthorizeException("Unauthorized");
        }catch(AksesTokenExpiredException $e){
            return response([
                'error' => "akses_token_expired",
                'message' => $e->getMessage()
            ],403);
        } catch(UnauthorizeException $th){
            return response([
                'error' => "Unauthorized",
                'message' => $th->getMessage()
            ],401);
        } catch(InvalidArgumentException $th){
            return response([
                'error' => "Bad Request",
                'message' => $th->getMessage()
            ],401);
        }
    }
}
