<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/kamar', function () {
    return view('kamar');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/activity', function () {
    return view('activity');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/kamar/detail', function () {
    return view('detail-kamar');
});

Route::get('/kamar/detail/ajukan-sewa', function () {
    return view('ajukan-sewa');
});

Route::get('/kamar/detail/pembayaran', function () {
    return view('pembayaran');
});

Route::get('/logout', [AuthController::class, 'getLogout']);

Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [AuthController::class, 'getRegister']);
    Route::post('/register', [AuthController::class, 'postRegister']);

    // Login
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

});
