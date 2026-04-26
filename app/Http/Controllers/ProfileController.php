<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|numeric'
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp
        ]);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current' => 'required',
            'password' => 'required',
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
