<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertandinganRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PertandinganController extends Controller
{
    public function welcome()
    {
        $pertandingan = Pertandingan::latest()->take(6)->get();
        return view('welcome', compact('pertandingan'));
    }

    public function index()
    {
        $pertandingan = Pertandingan::latest()->get();
        return view('pertandingan.index', compact('pertandingan'));
    }

    public function create()
    {
        return view('pertandingan.create');
    }

    public function store(StorePertandinganRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('dokumentasi')) {
            $path = $request->file('dokumentasi')->store('pertandingan', 'public');
            $data['dokumentasi'] = basename($path);
        }

        $pertandingan = Pertandingan::create($data);

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_match_added|' . $pertandingan->nama_pertandingan,
            'status'      => 'success'
        ]);

        return redirect()->route('pertandingan.index')->with('success', __('dashboard.pertandingan_success'));
    }

    public function edit($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        return view('pertandingan.edit', compact('pertandingan'));
    }

    public function update(Request $request, $id)
    {
        $pertandingan = Pertandingan::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('dokumentasi')) {
            if ($pertandingan->dokumentasi && Storage::disk('public')->exists('pertandingan/' . $pertandingan->dokumentasi)) {
                Storage::disk('public')->delete('pertandingan/' . $pertandingan->dokumentasi);
            }
            $path = $request->file('dokumentasi')->store('pertandingan', 'public');
            $data['dokumentasi'] = basename($path);
        } else {
            $data['dokumentasi'] = $pertandingan->dokumentasi;
        }

        $pertandingan->update($data);

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_match_updated|' . $pertandingan->nama_pertandingan,
            'status'      => 'success'
        ]);

        return redirect()->route('pertandingan.index')->with('success', __('dashboard.pertandingan_updated'));
    }

    public function destroy($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        $namaLama = $pertandingan->nama_pertandingan;

        if ($pertandingan->dokumentasi) {
            if (is_array($pertandingan->dokumentasi)) {
                foreach ($pertandingan->dokumentasi as $foto) {
                    if (Storage::disk('public')->exists($foto)) {
                        Storage::disk('public')->delete($foto);
                    } 
                    elseif (Storage::disk('public')->exists('pertandingan/' . $foto)) {
                        Storage::disk('public')->delete('pertandingan/' . $foto);
                    }
                }
            } 
            else {
                if (Storage::disk('public')->exists('pertandingan/' . $pertandingan->dokumentasi)) {
                    Storage::disk('public')->delete('pertandingan/' . $pertandingan->dokumentasi);
                }
            }
        }

        $pertandingan->delete();

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_match_deleted|' . $namaLama,
            'status'      => 'deleted' // atau ubah ke 'success' agar seragam dengan audit log lainnya
        ]);

        return redirect()->route('pertandingan.index')->with('success', __('dashboard.pertandingan_deleted'));
    }

    public function achievements()
    {
        $pertandingan = Pertandingan::latest()->get();
        return view('achievements.achievements', compact('pertandingan'));
    }
}
