<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
//Login ---------------------------------------------------------------------------------------------------------Login
Route::get('/login', [LoginController::class, 'index'] )->name('login');
Route::post('/login', [LoginController::class, 'store'] );

//logout----------------------------------------------------------------------------------------------------------
Route::post('/logout', [LogoutController::class, 'store'] )->name('logout');


// Register -----------------------------------------------------------------------------------------------------
Route::get('/register', [RegisterController::class, 'index'] )->name('register');
Route::post('/register', [RegisterController::class, 'store'] );

//home------------------------------------------------------------------------------------------------------------
Route::get('/', function (){
    return view('home');
         } )->name('home');


//Dashboard-------------------------------------------------------------------------------------------------------
Route::get('/dashboard', [DashboardController::class, 'index'] )
    ->name('dashboard');



//ADD-DELETE Posts----------------------------------------------------------------------------------------------------------
Route::get('/posts', [PostController::class, 'index'] )->name('posts');
Route::post('/posts', [PostController::class, 'store'] );
Route::delete('/posts/{post}', [PostController::class, 'destroy'] )->name('posts.destroy');;


//Like,Unlike Posts route-----------------------------------------------------------------------------
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'] )->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'] )->name('posts.likes');

//User poser controller
Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'] )->name('users.posts');
