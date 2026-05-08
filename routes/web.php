<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
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

Route::get('/kamar/{id}', function () {
    return view('detail-kamar');
});

Route::get('/kamar/detail/ajukan-sewa', function () {
    return view('ajukan-sewa');
});

Route::get('/kamar/detail/pembayaran', function () {
    return view('pembayaran');
});
Route::get('/pelunasan', function () {
    return view('pelunasan');
});

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::put('/profile', [ProfileController::class, 'updateProfile']);

    Route::get('/profile/data-diri', function () {
        return view('data-diri');
    });

    Route::get('/profile/status-pembayaran', function () {
        return view('status-pembayaran');
    });

    Route::get('/profile/laporan-fasilitas', function () {
        return view('laporan-fasilitas');
    });

    // Update Password
    Route::put('/profile/password', [ProfileController::class, 'updatePassword']);

    // Logout
    Route::get('/logout', [AuthController::class, 'getLogout']);
});

Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [AuthController::class, 'getRegister']);
    Route::post('/register', [AuthController::class, 'postRegister']);

    // Login
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

});
