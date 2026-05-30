<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPenghuniController extends Controller
{
    /**
     * Display a listing of the active tenants.
     */
    public function index()
    {
        // Ambil user ber-role customer yang pengajuan sewanya berstatus disetujui
        $penghuni = User::where('role', 'customer')
            ->whereHas('pengajuanSewa', function ($query) {
                $query->where('status', 'disetujui');
            })
            ->with(['pengajuanSewa.kamar']) // Memuat data pengajuan sewa beserta data kamarnya
            ->get();

        return view('admin.penghuni', compact('penghuni'));
    }

    /**
     * Display the specified tenant details.
     */
    public function show($id)
    {
        // Implementasi detail jika diperlukan nanti
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified tenant.
     */
    public function edit($id)
    {
        // Implementasi edit jika diperlukan nanti
        return redirect()->back();
    }

    /**
     * Remove the specified tenant from storage.
     */
    public function destroy($id)
    {
        // Implementasi hapus/batal sewa jika diperlukan nanti
        return redirect()->back();
    }
}
