<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FootballSlipsController;
use App\Http\Controllers\BasketballTipsController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('add/footballticket', [FootballSlipsController::class, 'index'])->name('football');
Route::post('add/footballticket', [FootballSlipsController::class, 'store']);


Route::get('add/basketballticket', [BasketballTipsController::class, 'index'])->name('basketball');
Route::post('add/basketballticket', [BasketballTipsController::class, 'store']);




Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'attempt']);

Route::get('logout', [LogoutController::class, 'store'])->name('logout');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
