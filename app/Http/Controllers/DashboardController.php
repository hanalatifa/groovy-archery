<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\Atlet;
use App\Models\Testimonial;
use App\Models\Documentation;
use App\Models\Pertandingan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAtlet = Atlet::where('status', 'approved')->count();
        $totalDokumentasi = Documentation::count();
        $totalPertandingan = Pertandingan::count();
        $aktivitas = Activity::latest()->take(5)->get();
        $pendingTestis = Testimonial::where('status', 'pending')->latest()->take(5)->get();
        $pendingAtlets = Atlet::where('status', 'pending')->latest()->take(5)->get();

        return view('dashboard.dashboard', compact(
            'totalAtlet', 
            'totalDokumentasi', 
            'totalPertandingan', 
            'aktivitas', 
            'pendingTestis', 
            'pendingAtlets'
        ));
    }
}