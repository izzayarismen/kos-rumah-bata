<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKamarController extends Controller
{
    // Tampilan daftar kamar di Admin
    public function index()
    {
        // Mengurutkan berdasarkan ID terbesar (terbaru dimasukkan)
        $kamars = Kamar::orderBy('id', 'desc')->get();

        return view('admin.kamar', compact('kamars'));
    }

    // Form Tambah Kamar
    public function create()
    {
        return view('admin.kamar_create');
    }

    // Proses Simpan Kamar Baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|max:10',
            'tower'       => 'required|string|max:50',
            'tipe_kamar'  => 'required|in:ac,non-ac',
            'harga'       => 'required|numeric',
            'luas'        => 'required|string|max:30',
            'fasilitas'   => 'required|array', // Diinput berupa array checkbox/tag
            'deskripsi'   => 'nullable|string', // <-- TAMBAHKAN VALIDASI DESKRIPSI DI SINI
            'status'      => 'required|in:tersedia,penuh',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kamar', 'public');
        }

        Kamar::create($data);

        return redirect('/admin/kamar')->with('success', 'Kamar berhasil ditambahkan!');
    }

    // Form Edit Kamar
    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('admin.kamar_edit', compact('kamar'));
    }

    // Proses Update Data Kamar
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        $request->validate([
            'nomor_kamar' => 'required|string|max:10',
            'tower'       => 'required|string|max:50',
            'tipe_kamar'  => 'required|in:ac,non-ac',
            'harga'       => 'required|numeric',
            'luas'        => 'required|string|max:30',
            'fasilitas'   => 'required|array',
            'deskripsi'   => 'nullable|string', // <-- TAMBAHKAN VALIDASI DESKRIPSI DI SINI
            'status'      => 'required|in:tersedia,penuh',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($kamar->foto && Storage::disk('public')->exists($kamar->foto)) {
                Storage::disk('public')->delete($kamar->foto);
            }
            $data['foto'] = $request->file('foto')->store('kamar', 'public');
        }

        $kamar->update($data);

        return redirect('/admin/kamar')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // Proses Hapus Kamar
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);

        if ($kamar->foto && Storage::disk('public')->exists($kamar->foto)) {
            Storage::disk('public')->delete($kamar->foto);
        }

        $kamar->delete();

        return redirect('/admin/kamar')->with('success', 'Kamar berhasil dihapus!');
    }
}
