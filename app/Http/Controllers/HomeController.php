<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Hanya mengambil FAQ yang berstatus aktif untuk ditampilkan ke pelanggan
        $faqs = Faq::where('status', 'aktif')->orderBy('sort_order', 'asc')->get();
        
        return view('home', compact('faqs'));
    }
}