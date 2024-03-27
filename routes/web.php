<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

//HOME
Route::view('/', 'index')->name('index');

//user registration and login
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//protected by authentication
Route::middleware('auth')->group(function () {
    //web home
    Route::get('/welcome', [UserController::class, 'index'])->name('welcome');
    //user profile
    Route::get('/profile', [UserController::class, 'show_profile'])->name('profile');
    //become to Premium
    Route::view('/joinus', 'pages/nav/joinus')->name('joinus');
    Route::post('/joinus', [MembershipController::class, 'premium']);
    //booking by day
    Route::view('bookings_day', 'pages.nav.bookings_day')->name('bookings_day');
    //booking by hours
    Route::view('bookings_hour', 'pages.nav.bookings_hour')->name('bookings_hour');
    //logout
    Route::get('/logout', [LogoutController::class, 'destroy'])->name('logout');
    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});
