<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        // Mengambil aktivitas yang aktif, diurutkan dari yang di-pin dan tanggal rilis terbaru
        $activities = Activity::where('status', 'aktif')
                              ->orderBy('is_pinned', 'desc')
                              ->orderBy('date', 'desc')
                              ->get();

        return view('activity', compact('activities'));
    }
}