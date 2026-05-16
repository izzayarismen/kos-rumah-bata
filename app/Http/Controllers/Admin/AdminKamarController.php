<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::orderBy('id', 'desc')->get();
        return view('admin.kamar', compact('kamars'));
    }

    public function create()
    {
        return view('admin.kamar_create');
    }

    // PROSES SIMPAN KAMAR BARU
    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar'     => 'required|string|max:10',
            'tower'           => 'required|string|max:50',
            'tipe_kamar'      => 'required|in:ac,non-ac',
            'harga'           => 'required|numeric',
            'luas'            => 'required|string|max:30',
            'fasilitas'       => 'required|array',
            'deskripsi'       => 'nullable|string',
            'status'          => 'required|in:tersedia,penuh',
            'foto_utama'      => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'foto_tambahan_1' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'foto_tambahan_2' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'foto_tambahan_3' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $data = $request->all();

        // Upload Foto Utama
        if ($request->hasFile('foto_utama')) {
            $data['foto_utama'] = $request->file('foto_utama')->store('kamar', 'public');
        }

        // Upload Foto Tambahan (1, 2, 3)
        for ($i = 1; $i <= 3; $i++) {
            $inputName = 'foto_tambahan_' . $i;
            if ($request->hasFile($inputName)) {
                $data[$inputName] = $request->file($inputName)->store('kamar', 'public');
            }
        }

        Kamar::create($data);

        return redirect('/admin/kamar')->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('admin.kamar_edit', compact('kamar'));
    }

    // PROSES UPDATE DATA KAMAR
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);

        $request->validate([
            'nomor_kamar'     => 'required|string|max:10',
            'tower'           => 'required|string|max:50',
            'tipe_kamar'      => 'required|in:ac,non-ac',
            'harga'           => 'required|numeric',
            'luas'            => 'required|string|max:30',
            'fasilitas'       => 'required|array',
            'deskripsi'       => 'nullable|string',
            'status'          => 'required|in:tersedia,penuh',
            'foto_utama'      => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'foto_tambahan_1' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'foto_tambahan_2' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'foto_tambahan_3' => 'nullable|image|mimes:jpeg,png,jpg,webp',
        ]);

        $data = $request->all();

        // Update Foto Utama
        if ($request->hasFile('foto_utama')) {
            if ($kamar->foto_utama && Storage::disk('public')->exists($kamar->foto_utama)) {
                Storage::disk('public')->delete($kamar->foto_utama);
            }
            $data['foto_utama'] = $request->file('foto_utama')->store('kamar', 'public');
        }

        // Update Foto Tambahan (1, 2, 3)
        for ($i = 1; $i <= 3; $i++) {
            $inputName = 'foto_tambahan_' . $i;
            if ($request->hasFile($inputName)) {
                // Hapus foto tambahan lama jika ada file baru yang masuk
                if ($kamar->$inputName && Storage::disk('public')->exists($kamar->$inputName)) {
                    Storage::disk('public')->delete($kamar->$inputName);
                }
                $data[$inputName] = $request->file($inputName)->store('kamar', 'public');
            }
        }

        $kamar->update($data);

        return redirect('/admin/kamar')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // PROSES HAPUS KAMAR TOTAL beserta seluruh fotonya
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);

        // Hapus Foto Utama dari Storage
        if ($kamar->foto_utama && Storage::disk('public')->exists($kamar->foto_utama)) {
            Storage::disk('public')->delete($kamar->foto_utama);
        }

        // Hapus Seluruh Foto Tambahan dari Storage
        for ($i = 1; $i <= 3; $i++) {
            $fieldName = 'foto_tambahan_' . $i;
            if ($kamar->$fieldName && Storage::disk('public')->exists($kamar->$fieldName)) {
                Storage::disk('public')->delete($kamar->$fieldName);
            }
        }

        $kamar->delete();

        return redirect('/admin/kamar')->with('success', 'Kamar berhasil dihapus!');
    }
}
