<?php

namespace App\Http\Controllers\SSO;

use App\Http\Controllers\Controller;
use App\Models\AppClient;
use App\Models\AuthCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthorizeController extends Controller
{
    public function index(Request $request)
    {
        $parameters = $request->only(['client_id', 'state', 'redirect_uri']);
        /**
         * cek redirect uri
         */
        $error = '';
        if (empty($parameters['client_id'])) {
            $error = "Akses diblokir: Permintaan aplikasi ini tidak valid 'client_id' empty";
        } else if (empty($parameters['redirect_uri'])) {
            $error = "Akses diblokir: Permintaan aplikasi ini tidak valid 'redirect_uri' empty";
        }
        if(!empty($error)){
            return view('sso.error',compact('error'));
        }
        $redirect_uri = urldecode($parameters['redirect_uri']);
        $appClient = AppClient::whereClientId($parameters['client_id'])->first();
        if (!$appClient) {
            return view('sso.error',['error'=>'Aplikasi tidak aktif']);
        } else if ($appClient->callback_url !== $redirect_uri) {
            return view('sso.error',['error'=>'Akses Di blokir: Permintaan tidak valid']);
        }

        $back_uri = [
            'back_to' => urlencode(url($_SERVER['REQUEST_URI'])),
        ];



        //cek apakah user telah login di server sso?
        if (!auth()->check()) {
            return redirect()->route('users.login', $back_uri);
        }

        /**
         * get user yang telah login
         */
        $user = Auth::user();
        $auth = AuthCode::create([
            'code' => Str::uuid(),
            'expired' => strtotime('+1hour'),
            'user_id' => $user->id,
            'app_client_id' => $appClient->id
        ]);
        $redirect_uri = urldecode($parameters['redirect_uri']) . "?state=$request->state&code=$auth->code";
        return redirect()->to($redirect_uri, 302, secure: true);
    }
}
