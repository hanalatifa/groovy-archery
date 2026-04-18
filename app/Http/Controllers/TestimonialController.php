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

    public function adminIndex() 
    {
        $pendingTestis = Testimonial::where('status', 'pending')->latest()->get();
        return view('dashboard.testimonials.index', compact('pendingTestis'));
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
        return redirect()->back()->with('error', 'Testimoni dihapus.');
    }
}