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
        $pertandingan = Pertandingan::all();
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
            'user_id' => Auth::id(),
            'description' => 'Menambah data pertandingan: ' . $pertandingan->nama_pertandingan,
            'status' => 'success'
        ]);

        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil ditambah!');
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
            'user_id' => Auth::id(),
            'description' => 'Memperbarui data pertandingan: ' . $pertandingan->nama_pertandingan,
            'status' => 'success'
        ]);

        return redirect()->route('pertandingan.index')->with('success', 'Data pertandingan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        $namaLama = $pertandingan->nama_pertandingan;

        if ($pertandingan->dokumentasi && Storage::disk('public')->exists('pertandingan/' . $pertandingan->dokumentasi)) {
            Storage::disk('public')->delete('pertandingan/' . $pertandingan->dokumentasi);
        }

        $pertandingan->delete();

        Activity::create([
            'user_id' => Auth::id(),
            'description' => 'Menghapus data pertandingan: ' . $namaLama,
            'status' => 'deleted'
        ]);

        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil dihapus!');
    }

    public function achievements()
    {
        $pertandingan = Pertandingan::latest()->get();
        return view('achievements.achievements', compact('pertandingan'));
    }
}