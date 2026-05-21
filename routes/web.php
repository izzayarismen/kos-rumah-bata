<?php

use App\Http\Controllers\Admin\AdminKamarController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// User
Route::get('/', [HomeController::class, 'index']);
Route::get('/aktivitas', [HomeController::class, 'activity']);
Route::get('/tentang-kami', [HomeController::class, 'galeri']);

// Flow Sewa
Route::prefix('kamar')->group(function () {
    Route::get('/', [KamarController::class, 'index']);
    Route::get('/{id}', [KamarController::class, 'show']);
    Route::get('/{id}/ajukan-sewa', function () {
        return view('ajukan-sewa');
    });
});

// Payment
Route::get('/pembayaran', function () {
    return view('pembayaran');
});
Route::get('/pelunasan', function () {
    return view('pelunasan');
});

Route::middleware('auth')->group(function () {

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'getProfile']);
        Route::put('/', [ProfileController::class, 'updateProfile']);
        Route::put('/password', [ProfileController::class, 'updatePassword']);

        Route::get('/status-pembayaran', function () {
            return view('status-pembayaran');
        });

        Route::get('/laporan-fasilitas', function () {
            return view('laporan-fasilitas');
        });
    });

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

// admin
Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    // CRUD Kamar Admin
    Route::resource('/kamar', AdminKamarController::class);

    // CRUD FAQ Admin
    Route::resource('/konten/faq', AdminFaqController::class);

    // CRUD Activity Admin
    Route::resource('/konten/activity', AdminActivityController::class);

    // CRUD Galeri Admin
    Route::resource('/konten/galeri', \App\Http\Controllers\Admin\AdminGaleriController::class);
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

Route::get('/admin/pembayaran', function () {
    return view('admin.pembayaran');
});

Route::get('/admin/pembayaran/create', function () {
    return view('admin.pembayaran_create');
});

Route::get('/admin/pembayaran/edit', function () {
    return view('admin.pembayaran_edit');
});

Route::get('/admin/pembayaran/detail', function () {
    return view('admin.pembayaran_detail');
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

