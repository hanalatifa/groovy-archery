<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Atlet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AtletController extends Controller
{
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
                'nama'          => 'required|string|max:255',
                'umur'          => 'required|numeric',
                'deskripsi'     => 'required|string',
                'kategori'      => 'nullable|string',
                'tgl_bergabung' => 'nullable|date',
                'foto'          => 'required|image|mimes:jpeg,png,jpg|max:10240',
            ]);

            $isDuplicate = Atlet::where('nama', $request->nama)
                ->where('umur', $request->umur)
                ->where('created_at', '>=', now()->subSeconds(5))
                ->exists();

            if ($isDuplicate) {
                return redirect()->back()->with('error', 'Mohon bersabar, data sedang diproses.');
            }

            $data = $validated;

            $isAdmin = Auth::check();
            $data['status'] = $isAdmin ? 'approved' : 'pending';

            $data['tgl_bergabung'] = $request->tgl_bergabung ?? now()->format('Y-m-d');

            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('atlet', 'public');
                $data['foto'] = basename($path);
            }

            $atlet = Atlet::create($data);

            Activity::create([
                'user_id'     => Auth::id() ?? 1,
                'description' => ($isAdmin ? 'activity_atlet_added' : 'activity_atlet_pending') . '|' . $atlet->nama,
                'status'      => $isAdmin ? 'success' : 'pending'
            ]);

            if ($isAdmin) {
                return redirect()->route('atlet.kelola')->with('success', __('dashboard.atlet_success'));
            } else {
                return redirect()->back()->with('success', 'Pendaftaran Anda berhasil dikirim dan menunggu persetujuan.');
            }
        } catch (\Exception $e) {
            Log::error('Gagal simpan atlet: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal simpan data.');
        }
    }

    public function approve(int $id)
    {
        $atlet = Atlet::findOrFail($id);
        $atlet->update(['status' => 'approved']);

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_atlet_approved|' . $atlet->nama,
            'status'      => 'success'
        ]);

        return redirect()->back()->with('success', 'Atlet berhasil disetujui!');
    }

    public function reject(int $id)
    {
        $atlet = Atlet::findOrFail($id);
        $namaAtlet = $atlet->nama;

        if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
            Storage::disk('public')->delete('atlet/' . $atlet->foto);
        }
        $atlet->delete();

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_atlet_rejected|' . $namaAtlet,
            'status'      => 'deleted'
        ]);

        return redirect()->back()->with('success', 'Permintaan pendaftaran dihapus.');
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

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_atlet_updated|' . $atlet->nama,
            'status'      => 'success'
        ]);

        return redirect()->route('atlet.kelola')->with('success', __('dashboard.atlet_updated'));
    }

    public function destroy($id)
    {
        try {
            $atlet = Atlet::findOrFail($id);
            $namaAtlet = $atlet->nama;

            if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
                Storage::disk('public')->delete('atlet/' . $atlet->foto);
            }
            $atlet->delete();

            Activity::create([
                'user_id'     => Auth::id(),
                'description' => 'activity_atlet_deleted|' . $namaAtlet,
                'status'      => 'deleted'
            ]);

            return redirect()->route('atlet.kelola')->with('success', __('dashboard.atlet_deleted'));
        } catch (\Exception $e) {
            Log::error('Gagal hapus atlet: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }

    public function create()
    {
        return view('atlet.create');
    }
}
