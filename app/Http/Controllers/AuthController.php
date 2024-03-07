<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function checkLogin(Request $request){
        $data = $request->validate([
            'email' => "required|email",
            'password' => 'required'
        ]);

        if(Auth::attempt($data,true)) {
            $backUri = urldecode($request->get('back_to'));
            if( $backUri ) {
                return redirect()->to($backUri);
            }
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors([
                'email' => "Tidak terdaftar atau password salah"
            ]);
        }
    }
}
