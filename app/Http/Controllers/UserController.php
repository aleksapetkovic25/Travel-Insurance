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

    public function getUser(Request $request){
        dd(Session::get('user'));
        return ['sesija' => session('user')];
    }
}
