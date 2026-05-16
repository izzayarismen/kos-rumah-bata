<?php

namespace App\Http\Controllers;

use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Menampilkan daftar seluruh kamar untuk halaman pelanggan.
     */
    public function index()
    {
        // Mengambil data kamar terbaru berdasarkan ID (kamar baru berada paling atas)
        $kamars = Kamar::orderBy('id', 'desc')->get();

        // Mengembalikan view kamar di folder resources/views/kamar.blade.php
        return view('kamar', compact('kamars'));
    }

    /**
     * Menampilkan detail informasi dari kamar tertentu.
     */
    public function show($id)
    {
        // Mencari data kamar berdasarkan ID, jika tidak ditemukan langsung mengembalikan error 404
        $kamar = Kamar::findOrFail($id);

        // Mengembalikan view detail kamar (misal: resources/views/detail-kamar.blade.php)
        return view('detail-kamar', compact('kamar'));
    }
}
