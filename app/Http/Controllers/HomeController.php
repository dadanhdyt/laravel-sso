<?php

namespace App\Http\Controllers;

use App\Models\AppClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $client_ids = auth()->user()->app()->pluck('client_id');
        $apps = AppClient::whereIn('client_id',$client_ids)->orderBy('client_id')->get();
        return view('home',compact('apps'));
    }
    public function updatePassword(Request $request){
        return view('update-password');
    }
    public function change(Request $request){
        $vlaidated = $request->validate([
            'password_lama' => "required",
            'password' => 'required|confirmed',
        ]);
        $user = Auth::user();
        if(password_verify($vlaidated['password_lama'],$user->password)) {
            if(password_verify($vlaidated['password'],$user->password)) {
                return redirect()->back()->withErrors([
                    'password' => "Password baru sama dengan password lama!"
                ]);

            }
            $user->update([
                'password' => password_hash($vlaidated['password'],PASSWORD_DEFAULT)
            ]);
            return redirect()->route('home')->withErrors([
                'suksess' => "Password berhasil di ubah"
            ]);
        }else{
            return redirect()->back()->withErrors([
                'password_lama' => "Password lama salah"
            ]);
        }
    }
}
