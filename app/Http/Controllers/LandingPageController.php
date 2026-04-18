<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;


use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $testimonis = Testimonial::where('status', 'approved')->latest()->get();
        return view('welcome', compact('testimonis'));
    }
}
