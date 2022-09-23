<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function registration(Request $request){
        $user = new User();
        return $user->registration($request); 
    }

    public function login(Request $request){
        $user = new User();
        return $user->login($request);
    }

    public function logout(Request $request){
        $user = new User();
        return $user->logout($request);
    }

    public function getUser(Request $request){
        return session('loginUser');
    }
    
    public function postListGetUser(Request $request){
        return view('postList', ['user' => session('loginUser')]);
    }
}
