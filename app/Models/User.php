<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registration($request){
        $formFields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:5|max:255|same:confirmPassword',
        ]);


        $formFields['password'] = Hash::make($formFields['password'], ['rounds' => 10]);

        // $newUser = DB::table('users')
        //     ->insert([
        //         'name' => $formFields['name'],
        //         'email' => $formFields['email'],
        //         'password' => $formFields['password'],
        //         'level' => 1,
        //     ]);
        
        $user = User::create($formFields);


        return $user;
    }

    public function login($request){
        $formFields = $request->validate([
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        // $user = DB::table('users')
        // ->where('email', $request->email)
        // ->first();

        $user = User::where('email', '=', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginUser', ['id'=>$user->id,'email'=>$user->email,'name'=>$user->name]);
                return ['user' => $user, 'message' => 'Welcome'];
            }else{
                return ['user' => null,'message' => 'Password is not matches.'];
            }
        }else{
            return ['user' => null,'message' => 'This email is not registrated'];
        }
    }

    public function logout(){
        if(Session::has('loginUser')){
            Session::pull('loginUser');
            return Session::has('loginUser');
        }
    }
}
