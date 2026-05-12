<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Testimonial;

class LandingPageController extends Controller
{
    public function index() {
        $testimonis = Testimonial::where('status', 'approved')->latest()->get();
        
        $atlets = Atlet::where('status', 'approved')->latest()->get();
        
        return view('welcome', compact('testimonis', 'atlets'));
    }

    public function athletes()
    {
        $atlets = Atlet::where('status', 'approved')->latest()->get(); 
        return view('athletes-page.athletes', compact('atlets'));
    }
}