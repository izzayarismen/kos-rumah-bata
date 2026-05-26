<?php

use App\Http\Controllers\Admin\AdminKamarController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminPembayaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanSewaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// User
Route::get('/', [HomeController::class, 'index']);
Route::get('/aktivitas', [HomeController::class, 'activity']);
Route::get('/tentang-kami', [HomeController::class, 'galeri']);

// Kamar
Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/kamar/{id}', [KamarController::class, 'show']);

Route::get('/pelunasan', function () {
    return view('pelunasan');
});

Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [AuthController::class, 'getRegister']);
    Route::post('/register', [AuthController::class, 'postRegister']);

    // Login
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);
});

Route::middleware('auth')->group(function () {
    // Logout
    Route::get('/logout', [AuthController::class, 'getLogout']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::put('/profile', [ProfileController::class, 'updateProfile']);
    Route::put('/profile/password', [ProfileController::class, 'updatePassword']);
    Route::get('/profile/status-pembayaran', function () {
        return view('status-pembayaran');
    });
    Route::get('/profile/laporan-fasilitas', function () {
        return view('laporan-fasilitas');
    });

    // Flow Sewa
    Route::get('/kamar/{id}/ajukan-sewa', [PengajuanSewaController::class, 'create']);
    Route::post('/kamar/{id}/ajukan-sewa', [PengajuanSewaController::class, 'store']);
    Route::get('/pembayaran/{order_id}', [PengajuanSewaController::class, 'show']);
    Route::post('/pembayaran/{order_id}', [PengajuanSewaController::class, 'payment']);
});

Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // CRUD Kamar Admin
    Route::resource('/kamar', AdminKamarController::class);

    // CRUD FAQ Admin
    Route::resource('/konten/faq', AdminFaqController::class);

    // CRUD Activity Admin
    Route::resource('/konten/activity', AdminActivityController::class);

    // CRUD Galeri Admin
    Route::resource('/konten/galeri', AdminGaleriController::class);

    // Pembayaran
    Route::get('/pembayaran', [AdminPembayaranController::class, 'index']);
    Route::get('/pembayaran/{order_id}', [AdminPembayaranController::class, 'show']);
    Route::put('/pembayaran/{order_id}/verifikasi', [AdminPembayaranController::class, 'verifikasi']);
});

Route::get('/admin/penghuni', function () {
    return view('admin.penghuni');
});

Route::get('/admin/penghuni/create', function () {
    return view('admin.penghuni_create');
});

Route::get('/admin/penghuni/edit', function () {
    return view('admin.penghuni_edit');
});

Route::get('/admin/penghuni/detail', function () {
    return view('admin.penghuni_detail');
});

Route::get('/admin/maintenance', function () {
    return view('admin.maintenance');
});

Route::get('/admin/maintenance/create', function () {
    return view('admin.maintenance_create');
});

Route::get('/admin/maintenance/edit', function () {
    return view('admin.maintenance_edit');
});

Route::get('/admin/pengajuan-maintenance', function () {
    return view('admin.pengajuan_maintenance');
});

Route::get('/admin/pengajuan-maintenance/detail', function () {
    return view('admin.pengajuan_maintenance_detail');
});

Route::get('/admin/laporan', function () {
    return view('admin.laporan');
});

Route::get('/admin/profile', function () {
    return view('admin.profile');
});

Route::get('/admin/pengajuan-sewa', function () {
    return view('admin.pengajuan_sewa');
});

Route::get('/admin/pengajuan-sewa/detail', function () {
    return view('admin.pengajuan_sewa_detail');
});

