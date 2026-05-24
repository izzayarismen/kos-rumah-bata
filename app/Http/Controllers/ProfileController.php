<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . Auth::id(),
            'no_hp'          => 'required|numeric',
            'jenis_kelamin'  => 'required|in:Perempuan,Laki-laki',
            'alamat'         => 'required|string',
            'kontak_darurat' => 'required|numeric',
            'ktp_dokumen'    => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:3072',
            'surat_komitmen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:3072',
        ]);

        $user = User::findOrFail(Auth::id());

        $data = [
            'nama'           => $request->nama,
            'email'          => $request->email,
            'no_hp'          => $request->no_hp,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'alamat'         => $request->alamat,
            'kontak_darurat' => $request->kontak_darurat,
        ];

        // 1. HANDLE UPLOAD FILE KTP (Mengikuti gaya lokal public luwihaja-hill)
        if ($request->hasFile('ktp_dokumen')) {
            // Hapus file fisik lama jika sebelumnya sudah ada path yang tersimpan
            if ($user->ktp_dokumen) {
                $oldKtpPath = public_path($user->ktp_dokumen);
                if (File::exists($oldKtpPath)) {
                    File::delete($oldKtpPath);
                }
            }

            $fileKtp = $request->file('ktp_dokumen');
            // Membuat nama file unik menggunakan penanda masa (timestamp)
            $ktpName = time() . '-ktp.' . $fileKtp->getClientOriginalExtension();
            // Pindahkan file ke direktori public/documents/ktp
            $fileKtp->move(public_path('documents/ktp'), $ktpName);
            // Simpan path penuh dari root public ke database
            $data['ktp_dokumen'] = '/documents/ktp/' . $ktpName;
        }

        // 2. HANDLE UPLOAD SURAT KOMITMEN (Mengikuti gaya lokal public luwihaja-hill)
        if ($request->hasFile('surat_komitmen')) {
            // Hapus file fisik lama jika sebelumnya sudah ada path yang tersimpan
            if ($user->surat_komitmen) {
                $oldSuratPath = public_path($user->surat_komitmen);
                if (File::exists($oldSuratPath)) {
                    File::delete($oldSuratPath);
                }
            }

            $fileSurat = $request->file('surat_komitmen');
            // Membuat nama file unik menggunakan penanda masa (timestamp)
            $suratName = time() . '-komitmen.' . $fileSurat->getClientOriginalExtension();
            // Pindahkan file ke direktori public/documents/surat_komitmen
            $fileSurat->move(public_path('documents/surat_komitmen'), $suratName);
            // Simpan path penuh dari root public ke database
            $data['surat_komitmen'] = '/documents/surat_komitmen/' . $suratName;
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current'  => 'required',
            'password' => 'required|min:6',
            'confirm'  => 'required'
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
