<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

//HOME
Route::view('/', 'home')->name('home');

//user registration and login
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

//protected by authentication
Route::middleware('auth')->group(function () {
    Route::get('/welcome', [UserController::class, 'index'])->name('welcome');
    Route::get('/logout', [LogoutController::class, 'destroy'])->name('logout');
    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});
