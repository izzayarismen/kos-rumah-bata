<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class AdminActivityController extends Controller
{
    // Menampilkan halaman daftar aktivitas di sisi Admin
    public function index()
    {
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'link_url' => 'nullable|url|max:255',
            'link_label' => 'nullable|string|max:100',
            'category' => 'required|string|in:Info Kamar,Update Kos,Aktivitas,Promo,Social',
            'date' => 'required|date',
            'is_pinned' => 'nullable|in:1',
        ]);

        $data = $request->all();
        $data['status'] = 'aktif';
        $alertMessage = 'Aktivitas berhasil ditambahkan!';

        // Logika batasan maksimal 1 sematan (Pinned)
        if ($request->has('is_pinned')) {
            $existingPinned = Activity::where('is_pinned', 1)->exists();

            if ($existingPinned) {
                // Lepas sematan yang lama
                Activity::where('is_pinned', 1)->update(['is_pinned' => 0]);
                $alertMessage = 'Aktivitas berhasil disematkan! Sematan pada aktivitas sebelumnya telah otomatis dilepas.';
            }
            $data['is_pinned'] = 1;
        } else {
            $data['is_pinned'] = 0;
        }

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/activities'), $imageName);
            $data['image'] = $imageName;
        }

        Activity::create($data);

        return redirect()->back()->with('success', $alertMessage);
    }

    // Menampilkan halaman form edit
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'link_url' => 'nullable|url|max:255',
            'link_label' => 'nullable|string|max:100',
            'category' => 'required|string|in:Info Kamar,Update Kos,Aktivitas,Promo,Social',
            'date' => 'required|date',
            'is_pinned' => 'nullable|in:1',
        ]);

        $activity = Activity::findOrFail($id);
        $data = $request->all();
        $alertMessage = 'Aktivitas berhasil diperbarui!';

        // Logika batasan maksimal 1 sematan saat update data
        if ($request->has('is_pinned')) {
            $existingPinned = Activity::where('is_pinned', 1)
                                      ->where('id', '!=', $id)
                                      ->exists();

            if ($existingPinned) {
                Activity::where('is_pinned', 1)
                        ->where('id', '!=', $id)
                        ->update(['is_pinned' => 0]);
                $alertMessage = 'Aktivitas berhasil diperbarui dan disematkan! Sematan pada aktivitas sebelumnya telah otomatis dilepas.';
            }
            $data['is_pinned'] = 1;
        } else {
            $data['is_pinned'] = 0;
        }

        // Ganti gambar baru jika ada
        if ($request->hasFile('image')) {
            if ($activity->image && file_exists(public_path('images/activities/' . $activity->image))) {
                unlink(public_path('images/activities/' . $activity->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/activities'), $imageName);
            $data['image'] = $imageName;
        }

        $activity->update($data);

        return redirect('/admin/konten/activity')->with('success', $alertMessage);
    }

    // Menghapus data aktivitas
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image && file_exists(public_path('images/activities/' . $activity->image))) {
            unlink(public_path('images/activities/' . $activity->image));
        }

        $activity->delete();

        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus!');
    }
}
