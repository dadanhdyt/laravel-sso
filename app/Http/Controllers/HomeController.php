<?php

namespace App\Http\Controllers;

use App\Models\AppClient;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $client_ids = auth()->user()->app()->pluck('client_id');
        $apps = AppClient::whereIn('client_id',$client_ids)->orderBy('client_id')->get();
        return view('home',compact('apps'));
    }
}
