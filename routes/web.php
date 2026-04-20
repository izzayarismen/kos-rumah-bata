<?php

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
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
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
