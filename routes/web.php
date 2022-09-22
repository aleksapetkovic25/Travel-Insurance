<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;


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

Route::get('/edit/post/{id}', [BlogController::class, 'editPost'])
->middleware('isLoggedIn');

Route::delete('/delete/post/{id}', [BlogController::class, 'deletePost']);

Route::put('/archive/post/{id}', [BlogController::class, 'archivePost']);
Route::put('/publish/post/{id}', [BlogController::class, 'publishPost']);



Route::get('/posts', [UserController::class, 'postListGetUser']);


//Get posts
Route::get('/api/posts', [BlogController::class, 'fetchPosts']);

Route::get('/posts/{id}', [BlogController::class, 'fetchPost']);




Route::post('/create', [BlogController::class, 'createBlog']);


Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout']);
Route::get('/get/user', [UserController::class, 'getUser']);

Route::get('/checkuserlogged', [UserController::class, 'getUser']);
