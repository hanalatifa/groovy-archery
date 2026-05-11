<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Atlet;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AtletController extends Controller
{

    public function dashboardIndex()
    {
        $pendingTestis = Testimonial::where('status', 'pending')->latest()->get();
        $pendingAtlets = Atlet::where('status', 'pending')->latest()->get();

        return view('dashboard.dashboard', compact('pendingTestis', 'pendingAtlets'));
    }

    public function index()
    {
        $atlets = Atlet::where('status', 'approved')->latest()->get();
        return view('atlet.index', compact('atlets'));
    }

    public function kelola()
    {
        $atlets = Atlet::where('status', 'approved')->latest()->get();
        $pendingCount = Atlet::where('status', 'pending')->count();

        return view('atlet.kelola-atlet', compact('atlets', 'pendingCount'));
    }

    public function requests()
    {
        $pendingAtlets = Atlet::where('status', 'pending')->latest()->get();
        return view('atlet.requests', compact('pendingAtlets'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama'      => 'required|string|max:255',
                'umur'      => 'required|numeric',
                'deskripsi' => 'required|string',
                'foto'      => 'required|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $isDuplicate = Atlet::where('nama', $request->nama)
                ->where('umur', $request->umur)
                ->where('created_at', '>=', now()->subSeconds(5))
                ->exists();

            if ($isDuplicate) {
                return response()->json([
                    'success' => false,
                    'error'   => 'Mohon Bersabar, data sedang diproses.'
                ], 422);
            }

            $data = $validated;
            $data['status'] = Auth::check() ? 'approved' : 'pending';
            $data['tgl_bergabung'] = now()->format('Y-m-d');

            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('atlet', 'public');
                $data['foto'] = basename($path);
            }

            Atlet::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil dikirim!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error'   => 'Gagal simpan data.'
            ], 500);
        }
    }

    public function approve(int $id)
    {
        $atlet = Atlet::findOrFail($id);
        $atlet->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Atlet berhasil disetujui!');
    }

    public function reject(int $id)
    {
        $atlet = Atlet::findOrFail($id);
        if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
            Storage::disk('public')->delete('atlet/' . $atlet->foto);
        }
        $atlet->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus.');
    }

    public function create()
    {
        return view('atlet.create');
    }
    public function edit($id)
    {
        return view('atlet.edit', ['atlet' => Atlet::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $atlet = Atlet::findOrFail($id);

        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'umur'      => 'nullable|numeric',
            'deskripsi' => 'required|string',
            'kategori'  => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = $validated;

        if ($request->hasFile('foto')) {

            if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
                Storage::disk('public')->delete('atlet/' . $atlet->foto);
            }

            $path = $request->file('foto')->store('atlet', 'public');
            $data['foto'] = basename($path);
        }
        $atlet->update($data);

        return redirect()->route('atlet.kelola')->with('success', 'Profil ' . $atlet->nama . ' berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $atlet = Atlet::findOrFail($id);

            if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
                Storage::disk('public')->delete('atlet/' . $atlet->foto);
            }
            $atlet->delete();
            return redirect()->route('atlet.kelola')->with('success', 'Data atlet berhasil dihapus selamanya.');
        } catch (\Exception $e) {
            Log::error('Gagal hapus atlet: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }
}
