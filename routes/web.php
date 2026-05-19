<?php

use App\Http\Controllers\Admin\AdminKamarController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// Route untuk melihat semua kamar di sisi pelanggan
Route::get('/kamar', [KamarController::class, 'index']);

// Route untuk melihat detail kamar spesifik di sisi pelanggan
Route::get('/kamar/{id}', [KamarController::class, 'show']);

Route::get('/tentang-kami', function () {
    return view('about');
});

Route::get('/aktivitas', [ActivityController::class, 'index']);

Route::get('/kamar/{id}/ajukan-sewa', function () {
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

Route::get('/admin/konten/galeri', function () {
    return view('admin.konten_galeri');
});

Route::get('/admin/konten/galeri/edit', function () {
    return view('admin.konten_galeri_edit');
});
