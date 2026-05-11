<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        // Hanya ambil testimoni yang sudah di-approve
        $testimonis = Testimonial::where('status', 'approved')->latest()->get();
        
        // FIXED: Hanya ambil atlet yang sudah di-approve untuk landing page
        $atlets = Atlet::where('status', 'approved')->latest()->get();
        
        return view('welcome', compact('testimonis', 'atlets'));
    }

    public function athletes()
    {
        // FIXED: Sama juga buat halaman list atlet lengkap, filter by status
        $atlets = Atlet::where('status', 'approved')->latest()->get(); 

        return view('athletes-page.athletes', compact('atlets'));
    }
}