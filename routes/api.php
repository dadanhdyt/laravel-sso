<?php

use App\Http\Controllers\Api\UserInfoController;
use App\Http\Middleware\ApiOauthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(ApiOauthMiddleware::class)->group(function(){
    Route::get('/userinfo',[UserInfoController::class,'index']);
});
