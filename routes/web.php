<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function(){
//     return view('login');
// });

Route::get('/insurances', function(){
    return view('admin');
})->middleware('isLoggedIn');

Route::get('/registration', function(){
    return view('registration');
})->middleware('isLoggedIn');

Route::get('/create', function(){
    return view('create');
})->middleware('isLoggedIn');

Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout']);
Route::get('/get/user', [UserController::class, 'getUser']);

Route::get('/checkuserlogged', [UserController::class, 'getUser']);