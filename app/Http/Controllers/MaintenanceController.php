<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    // Menampilkan riwayat pelaporan fasilitas oleh user yang login
    public function index()
    {
        $user = Auth::user();
        // Menampilkan list laporan pengerjaan milik user saat ini
        $maintenances = Maintenance::where('user_id', $user->id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('laporan-fasilitas', compact('maintenances'));
    }

    // Menyimpan laporan kerusakan baru dari user
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $user = Auth::user();
        
        // Mengambil nomor kamar user secara dinamis (pastikan model User mempunyai relasi kamar / field kamar_id)
        $kamarId = $user->kamar_id; 

        if (!$kamarId) {
            return redirect()->back()->with('error', 'Anda belum terdaftar di kamar manapun.');
        }

        Maintenance::create([
            'user_id' => $user->id,
            'kamar_id' => $kamarId,
            'title' => $request->title,
            'description' => $request->description,
            'cost' => 0, // Biaya default awal 0 sebelum dihitung admin
            'status' => 'waiting',
            'date' => now()->toDateString(),
        ]);

        return redirect()->back()->with('success', 'Laporan kerusakan berhasil dikirim! Admin akan segera mengecek.');
    }
}