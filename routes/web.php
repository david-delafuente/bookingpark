<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

//Start route
Route::view('/', 'index')->name('index');

//register and login
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//protected by auth
Route::middleware('auth')->group(function () {
    //web home
    Route::get('/welcome', [UserController::class, 'index'])->name('welcome');

    //user profile
    Route::get('/profile', [UserController::class, 'show_profile'])->name('profile');
    Route::get('/cancel_booking/{booking_id}', [BookingController::class, 'cancel_booking'])->name('cancel_booking');
    Route::get('/remove_vehicle/{vehicle_id}', [VehicleController::class, 'destroy'])->name('remove_vehicle');
    Route::post('add_vehicle', [VehicleController::class, 'create_form'])->name('add_vehicle');

    //become to Premium
    Route::view('/joinus', 'pages/nav/joinus')->name('joinus');
    Route::post('/joinus', [MembershipController::class, 'premium']);

    //become to Basic
    Route::get('/comeBackBasic', [MembershipController::class, 'basic'])->name('membership_cancel');

    //booking for day
    Route::get('/bookings_day', [DistrictController::class, 'index'])->name('booking_day');
    //booking for hour
    Route::get('/bookings_hours', [DistrictController::class, 'index2'])->name('booking_hour');

    //Contact us
    Route::view('/contact', 'pages/header/contact')->name('contact');


    //show parkings for district
    Route::match(['get', 'post'], '/show_parkings', [DistrictController::class, 'show'])->name('show_parkings');
    //show parkings for district hour//
    Route::match(['get', 'post'], '/show_parkings_hour', [DistrictController::class, 'show2'])->name('show_parkings_hour');

    //show parking selected
    Route::match(['get', 'post'], '/show_parking_data', [ParkingController::class, 'show'])->name('show_parking_data');
    //show parking selected per hour
    Route::match(['get', 'post'], '/show_parking_data_hour', [ParkingController::class, 'show2'])->name('show_parking_data_hour');

    //It's possible refactor this part but I don't know how do it
    //complete booking day
    Route::post('/complete_booking_day', [BookingController::class, 'complete_booking_day'])->name('complete_booking_day');
    //complete booking hour
    Route::post('/complete_booking_hour', [BookingController::class, 'complete_booking_hour'])->name('complete_booking_hour');

    //logout
    Route::match(['get', 'post'], '/logout', [LogoutController::class, 'destroy'])->name('logout');
});
