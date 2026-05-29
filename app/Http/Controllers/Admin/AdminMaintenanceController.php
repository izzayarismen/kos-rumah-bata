<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Models\Kamar;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMaintenanceController extends Controller
{
    /**
     * Menampilkan daftar semua pengajuan maintenance (Halaman Utama Admin)
     */
    public function index()
    {
        // Mengambil semua data maintenance beserta data user dan kamar terkait
        $maintenances = Maintenance::with(['user', 'kamar'])->orderBy('created_at', 'desc')->get();
        
        // Mengarah ke file view index admin (misal: resources/views/admin/pengajuan_maintenance.blade.php)
        return view('admin.pengajuan_maintenance', compact('maintenances'));
    }

    /**
     * Menampilkan form tambah maintenance baru (Sisi Admin)
     */
    public function create()
    {
        // Mengambil semua data user dan kamar untuk opsi select option di form
        $users = User::all();
        $kamars = Kamar::all();

        // Mengarah ke file resources/views/admin/maintenance_create.blade.php
        return view('admin.maintenance_create', compact('users', 'kamars'));
    }

    /**
     * Menyimpan data maintenance baru yang diinput oleh Admin
     */
    public function store(Request $request)
    {
        // Validasi input data dari form admin
        $request->validate([
            'user_id'     => 'required|integer',
            'kamar_id'    => 'required|integer',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'cost'        => 'required|numeric|min:0',
            'status'      => 'required|string|in:waiting,process,done',
        ]);

        // Menyimpan data ke dalam database
        Maintenance::create([
            'user_id'     => $request->user_id,
            'kamar_id'    => $request->kamar_id,
            'title'       => $request->title,
            'description' => $request->description,
            'cost'        => $request->cost,
            'status'      => $request->status,
            'date'        => $request->date,
        ]);

        // Redirect kembali ke halaman utama maintenance admin dengan pesan sukses
        return redirect('/admin/maintenance')->with('success', 'Data maintenance berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail pengajuan maintenance tertentu
     */
    public function show($id)
    {
        $maintenance = Maintenance::with(['user', 'kamar'])->findOrFail($id);
        
        return view('admin.pengajuan_maintenance_detail', compact('maintenance'));
    }
}