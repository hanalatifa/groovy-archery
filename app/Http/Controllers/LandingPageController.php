<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Testimonial;


use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $testimonis = Testimonial::where('status', 'approved')->latest()->get();
        $atlets = Atlet::all();
        return view('welcome', compact('testimonis', 'atlets'));
    }

    // TAMBAHKAN FUNGSI INI (Penyebab error 500 tadi)
    public function athletes()
    {
        $atlets = \App\Models\Atlet::all(); 

    // Kirim dengan nama 'atlets' (TANPA HURUF H)
        return view('athletes-page.athletes', compact('atlets'));
    }
}
