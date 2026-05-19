<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;

class TestimonialController extends Controller
{
    public function create()
    {
        return view('dashboard.testimonials.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama'      => 'required|string|max:255',
        'peran'     => 'required|string|max:255',
        'rating'    => 'required|integer|min:1|max:5',
        'deskripsi' => 'required|string|min:5',
    ]);

    $isAdmin = Auth::check();
    $status  = $isAdmin ? 'approved' : 'pending';

    $testi = Testimonial::create([
        'nama'      => $request->nama,
        'peran'     => $request->peran,
        'rating'    => $request->rating,
        'deskripsi' => $request->deskripsi,
        'status'    => $status,
    ]);

    Activity::create([
        'user_id'     => $isAdmin ? Auth::id() : 1,
        'description' => $isAdmin 
            ? 'activity_testi_added|' . $testi->nama 
            : 'activity_testi_pending|' . $testi->nama,
        'status'      => $isAdmin ? 'success' : 'pending'
    ]);

    if ($isAdmin) {
        return redirect()->route('testi.index')->with('success', __('dashboard.testi_success'));
    }

    return redirect()->back()->with('success', 'Terima kasih! Testimoni Anda sedang menunggu persetujuan admin.');
}

    public function dashboardIndex()
    {
        $pendingTestis = Testimonial::where('status', 'pending')->latest()->get();
        $pendingCount = $pendingTestis->count();
        $aktivitas = Activity::latest()->take(5)->get();

        return view('dashboard.dashboard', compact('pendingTestis', 'pendingCount', 'aktivitas'));
    }

    public function adminIndex()
    {
        $approvedTestis = Testimonial::where('status', 'approved')->latest()->get();
        $pendingCount = Testimonial::where('status', 'pending')->count();

        return view('dashboard.testimonials.index', compact('approvedTestis', 'pendingCount'));
    }

    public function adminRequests()
    {
        $pendingTestis = Testimonial::where('status', 'pending')->latest()->get();
        return view('dashboard.testimonials.requests', compact('pendingTestis'));
    }

    public function makePending($id)
    {
        $testi = Testimonial::findOrFail($id);
        $testi->update(['status' => 'pending']);

        Activity::create([
            'user_id' => Auth::id(),
            'description' => __('dashboard.activity_testi_reset_pending', ['name' => $testi->nama]),
            'status' => 'success'
        ]);

        return redirect()->back()->with('success', __('dashboard.testi_hidden'));
    }

    public function approve($id)
    {
        $testi = Testimonial::findOrFail($id);
        $testi->update(['status' => 'approved']);

        Activity::create([
            'user_id' => Auth::id(),
            'description' => 'activity_testi_approved|' . $testi->nama,
            'status' => 'success'
        ]);

        return redirect()->back()->with('success', __('dashboard.testi_approved'));
    }

    public function reject($id)
    {
        $testi = Testimonial::findOrFail($id);
        $namaTesti = $testi->nama;

        $testi->delete();

        Activity::create([
            'user_id' => Auth::id(),
            'description' => 'activity_testi_deleted|' . $namaTesti,
            'status' => 'deleted'
        ]);

        return redirect()->back()->with('error', __('dashboard.testi_deleted'));
    }
}