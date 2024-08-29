<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UnLikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store']);
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.index');

Route::post('post/{post}/like', [LikeController::class, 'store'])->name('like');
Route::delete('post/{post}/unlike', [UnlikeController::class, 'destroy'])->name('unlike');
Route::delete('post/{post}/delete', [PostController::class, 'destroy'])->name('delete');

Route::get('/user/{user:username}/posts', [UserPostController::class, 'list'])->name('user.posts');