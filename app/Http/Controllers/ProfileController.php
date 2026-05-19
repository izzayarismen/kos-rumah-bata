<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'no_hp' => 'required|numeric',
            'jenis_kelamin' => 'required|in:Perempuan,Laki-laki',
            'alamat' => 'required|string',
            'kontak_darurat' => 'required|numeric',
            'ktp_dokumen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'surat_komitmen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $user = User::findOrFail(Auth::id());

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'kontak_darurat' => $request->kontak_darurat,
        ];

        // Handle upload file KTP jika ada file baru
        if ($request->hasFile('ktp_dokumen')) {
            if ($user->ktp_dokumen) {
                Storage::delete('public/documents/' . $user->ktp_dokumen);
            }
            $ktpName = 'ktp_' . time() . '.' . $request->file('ktp_dokumen')->getClientOriginalExtension();
            $request->file('ktp_dokumen')->storeAs('public/documents', $ktpName);
            $data['ktp_dokumen'] = $ktpName;
        }

        // Handle upload file Surat Komitmen jika ada file baru
        if ($request->hasFile('surat_komitmen')) {
            if ($user->surat_komitmen) {
                Storage::delete('public/documents/' . $user->surat_komitmen);
            }
            $suratName = 'surat_' . time() . '.' . $request->file('surat_komitmen')->getClientOriginalExtension();
            $request->file('surat_komitmen')->storeAs('public/documents', $suratName);
            $data['surat_komitmen'] = $suratName;
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current' => 'required',
            'password' => 'required|min:6',
            'confirm' => 'required'
        ]);

        if (!Hash::check($request->current, Auth::user()->password)) {
            return back()->with('error', 'Password saat ini salah!');
        }

        if ($request->password != $request->confirm) {
            return back()->with('error', 'Password dan Konfirmasi tidak cocok!');
        }

        $user = User::where('id', Auth::user()->id)->first();

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}
