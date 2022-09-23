<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [BlogController::class, 'fetchHomePosts']);



// Fetch insurances
Route::get('/insurances',[AdminController::class, 'getInsurances'])
->middleware('isLoggedIn');

// Registration
Route::get('/registration', function(){
    return view('registration');
})->middleware('isLoggedIn');

// Create post
Route::get('/create', function(){
    return view('create');
})->middleware('isLoggedIn');

Route::post('/create', [BlogController::class, 'createBlog']);

// Edit post (view data)
Route::get('/edit/post/{id}', [BlogController::class, 'editPostData'])
->middleware('isLoggedIn');
// Edit post
Route::post('/edit/post/{id}', [BlogController::class, 'editPost'])->middleware('isLoggedIn');

// Archive,publish and delete post
Route::delete('/delete/post/{id}', [BlogController::class, 'deletePost'])->middleware('isLoggedIn');
Route::put('/archive/post/{id}', [BlogController::class, 'archivePost'])->middleware('isLoggedIn');
Route::put('/publish/post/{id}', [BlogController::class, 'publishPost'])->middleware('isLoggedIn');

// Get posts with user
Route::get('/posts', [UserController::class, 'postListGetUser']);
//Get posts
Route::get('/api/posts', [BlogController::class, 'fetchPosts']);
// Get single post
Route::get('/posts/{id}', [BlogController::class, 'fetchPost']);

// Login / Logout
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/get/user', [UserController::class, 'getUser']);


Route::get('/checkuserlogged', [UserController::class, 'getUser']);
