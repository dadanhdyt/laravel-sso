<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index(Request $request){
        return response([
            'error' => false,
            'message'=> 'success get userinfo',
            'userinfo' => $request->get('user')
        ],200);
    }
}
