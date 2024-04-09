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
    Route::get('/cancel_booking/{booking_id}', [BookingController::class, 'cancel_booking'])->name('cancel_booking');
    Route::get('/remove_vehicle/{vehicle_id}', [VehicleController::class, 'destroy'])->name('remove_vehicle');
    Route::post('add_vehicle', [VehicleController::class, 'create_form'])->name('add_vehicle');

    //become to Premium
    Route::view('/joinus', 'pages/nav/joinus')->name('joinus');
    Route::post('/joinus', [MembershipController::class, 'premium']);
    //Come back to Basic
    Route::get('/comeBackBasic', [MembershipController::class, 'basic'])->name('membership_cancel');

    //booking for day
    Route::get('/bookings_day', [DistrictController::class, 'index'])->name('booking_day');
    //booking for hour
    Route::get('/bookings_hours', [DistrictController::class, 'index2'])->name('booking_hour');

    //show parkings for district
    Route::post('/show_parkings', [DistrictController::class, 'show'])->name('show_parkings');
    Route::get('/show_parkings', [DistrictController::class, 'show'])->name('show_parkings');

    //show parkings for district//
    Route::post('/show_parkings_hour', [DistrictController::class, 'show2'])->name('show_parkings_hour');
    Route::get('/show_parkings_hour', [DistrictController::class, 'show2'])->name('show_parkings_hour');

    //show parking selected
    Route::post('/show_parking_data', [ParkingController::class, 'show'])->name('show_parking_data');
    Route::get('/show_parking_data', [ParkingController::class, 'show'])->name('show_parking_data');
    //show parking selected per hour
    Route::post('/show_parking_data_hour', [ParkingController::class, 'show2'])->name('show_parking_data_hour');
    Route::get('/show_parking_data_hour', [ParkingController::class, 'show2'])->name('show_parking_data_hour');




    //complete booking for day
    Route::post('/complete_booking_day', [BookingController::class, 'complete_booking_day'])->name('complete_booking_day');

    //booking for hours
    Route::get('/bookings_hours', [DistrictController::class, 'index2'])->name('booking_hour');


    //booking by hours
    Route::view('bookings_hour', 'pages.nav.bookings_hour')->name('bookings_hour');
    //logout
    Route::get('/logout', [LogoutController::class, 'destroy'])->name('logout');
    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});
