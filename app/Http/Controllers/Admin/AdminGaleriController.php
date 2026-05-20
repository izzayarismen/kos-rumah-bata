<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    // 1. TAMPILKAN DAFTAR GALERI (Halaman Utama Admin)
    public function index()
    {
        $galeris = Galeri::orderBy('sort_order', 'asc')->get();
        return view('admin.konten_galeri', compact('galeris'));
    }

    // 2. FORM TAMBAH DATA GALERI
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:aktif,nonaktif',
            'sort_order' => 'required|integer|min:1',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galeri', 'public');
        }

        Galeri::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'status' => $request->status,
            'sort_order' => $request->sort_order,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    // 3. FORM EDIT DATA GALERI
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.konten_galeri_edit', compact('galeri'));
    }

    // 4. PROSES UPDATE DATA (Bagian Utama yang Memperbaiki Redirect)
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:aktif,nonaktif',
            'sort_order' => 'required|integer|min:1',
        ]);

        // Kumpulkan data teks
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'sort_order' => $request->sort_order,
        ];

        // Jika mengunggah foto baru
        if ($request->hasFile('image')) {
            // Hapus foto lama dari storage jika ada
            if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                Storage::disk('public')->delete($galeri->image);
            }
            // Simpan foto baru
            $data['image'] = $request->file('image')->store('galeri', 'public');
        } else {
            // Tetap gunakan foto lama jika tidak ada unggahan baru
            $data['image'] = $galeri->image;
        }

        // Eksekusi Update ke Database
        $galeri->update($data);

        // LANGSUNG REDIRECT KEMBALI KE KONTEN GALERI (INDEX)
        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil diperbarui!');
    }

    // 5. PROSES HAPUS FOTO
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
            Storage::disk('public')->delete($galeri->image);
        }

        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }
}