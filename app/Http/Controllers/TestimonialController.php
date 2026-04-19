<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Simpan testimoni dari user (Public)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'rating'    => 'required|integer|min:1|max:5',
            'deskripsi' => 'required|string|min:5',
        ]);

        Testimonial::create([
            'nama'      => $request->nama,
            'rating'    => $request->rating,
            'deskripsi' => $request->deskripsi,
            'status'    => 'pending',
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Testimoni kamu sedang ditinjau admin.');
    }

    /**
     * 1. Halaman Dashboard Utama (Ringkasan Statistik & Tabel Kecil)
     */
    public function dashboardIndex() 
    {
        $pendingTestis = Testimonial::where('status', 'pending')->latest()->get();
        $pendingCount = $pendingTestis->count();
        
        // Kirim ke view dashboard utama
        return view('dashboard.dashboard', compact('pendingTestis', 'pendingCount'));
    }

    /**
     * 2. Halaman Kelola Testimoni (Daftar Testimoni yang sudah Live/Approved)
     */
    public function adminIndex() 
    {
        $approvedTestis = Testimonial::where('status', 'approved')->latest()->get();
        $pendingCount = Testimonial::where('status', 'pending')->count();
    
        // Kirim ke view kelola testimoni
        return view('dashboard.testimonials.index', compact('approvedTestis', 'pendingCount'));
    }

    /**
     * 3. Halaman Khusus Permintaan Baru (Pending)
     */
    public function adminRequests()
    {
        $pendingTestis = Testimonial::where('status', 'pending')->latest()->get();
        return view('dashboard.testimonials.requests', compact('pendingTestis'));
    }

    /* --- AKSI --- */

    public function makePending($id)
    {
        $testi = Testimonial::findOrFail($id);
        $testi->update(['status' => 'pending']);
        return redirect()->back()->with('success', 'Testimoni disembunyikan.');
    }

    public function approve($id)
    {
        $testi = Testimonial::findOrFail($id);
        $testi->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Testimoni disetujui!');
    }

    public function reject($id)
    {
        $testi = Testimonial::findOrFail($id);
        $testi->delete();
        return redirect()->back()->with('error', 'Testimoni berhasil dihapus.');
    }
}