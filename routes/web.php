<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SSO\AuthorizeController;
use App\Http\Controllers\SSO\TokenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('/sso')->name('sso.')->group(function () {
    Route::get('/authorize', [AuthorizeController::class, 'index'])->name('authorize');
    Route::post('/oauth2/token', TokenController::class)->name('oauth.token');
});
Route::middleware('guest')->group(function () {
    Route::get('/users/login', [AuthController::class, 'login'])->name('users.login');
    Route::post('/users/login', [AuthController::class, 'checkLogin'])->name('users.login.check');
});
Route::middleware('auth')->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/update-password', [HomeController::class,'updatePassword'])->name('update-password');
});
