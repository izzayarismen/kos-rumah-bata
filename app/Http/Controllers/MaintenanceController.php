<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $maintenances = Maintenance::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('laporan-fasilitas', compact('maintenances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $user = Auth::user();
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
