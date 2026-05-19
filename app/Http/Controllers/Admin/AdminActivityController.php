<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminActivityController extends Controller
{
    // Menampilkan halaman daftar aktivitas di sisi Admin
    public function index()
    {
        // Mengurutkan berdasarkan yang disematkan (is_pinned) terlebih dahulu, baru berdasarkan tanggal rilis terbaru
        $activities = Activity::orderBy('is_pinned', 'desc')
                              ->orderBy('date', 'desc')
                              ->get();
                              
        return view('admin.konten_activity', compact('activities'));
    }

    // Menyimpan aktivitas baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|in:Info Kamar,Update Kos,Aktivitas,Promo,Social',
            'date' => 'required|date',
            'is_pinned' => 'nullable|in:1',
        ]);

        $data = $request->all();

        // Mengatur status default (karena tidak ada input status di form tambah milikmu)
        $data['status'] = 'aktif';

        // Jika checkbox sematkan dicentang, nilainya 1. Jika tidak dicentang, kita paksa isi 0.
        $data['is_pinned'] = $request->has('is_pinned') ? 1 : 0;

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/activities'), $imageName);
            $data['image'] = $imageName;
        }

        Activity::create($data);

        return redirect()->back()->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    // Menampilkan halaman form edit aktivitas
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.konten_activity_edit', compact('activity'));
    }

    // Memperbarui data aktivitas
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|in:Info Kamar,Update Kos,Aktivitas,Promo,Social',
            'date' => 'required|date',
            'is_pinned' => 'nullable|in:1',
        ]);

        $activity = Activity::findOrFail($id);
        $data = $request->all();

        // Jika checkbox sematkan dicentang nilainya 1, jika kosong diubah ke 0
        $data['is_pinned'] = $request->has('is_pinned') ? 1 : 0;

        // Proses update gambar baru jika diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada berkasnya
            if ($activity->image && file_exists(public_path('images/activities/' . $activity->image))) {
                unlink(public_path('images/activities/' . $activity->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/activities'), $imageName);
            $data['image'] = $imageName;
        }

        $activity->update($data);

        return redirect('/admin/konten/activity')->with('success', 'Aktivitas berhasil diperbarui!');
    }

    // Menghapus data aktivitas
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        // Hapus gambar dari local folder jika ada
        if ($activity->image && file_exists(public_path('images/activities/' . $activity->image))) {
            unlink(public_path('images/activities/' . $activity->image));
        }

        $activity->delete();

        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus!');
    }
}