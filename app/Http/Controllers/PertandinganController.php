<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertandinganRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class PertandinganController extends Controller
{
    public function welcome()
    {
        $pertandingans = Pertandingan::latest()->take(6)->get();
        return view('welcome', compact('pertandingans'));
    }

    public function index()
    {
        $pertandingans = Pertandingan::all();
        return view('pertandingan.index', compact('pertandingans'));
    }

    public function create()
    {
        return view('pertandingan.create');
    }

    public function store(StorePertandinganRequest $request)
    {
        $data = $request->validated();
        $files = [];

        if ($request->hasFile('dokumentasi')) {
            foreach ($request->file('dokumentasi') as $file) {
                $path = $file->store('pertandingans', 'public');
                $files[] = $path;
            }
        }

        $data['dokumentasi'] = $files;

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
        $pertandingans = Pertandingan::findOrFail($id);
        return view('profile.edit', compact('pertandingans'));
    }

    public function update(Request $request, $id)
    {
        $pertandingans = Pertandingan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('dokumentasi')) {
            if ($pertandingans->dokumentasi) {
                foreach ($pertandingans->dokumentasi as $fotoLama) {
                    FacadesStorage::disk('public')->delete($fotoLama);
                }
            }

            $files = [];
            foreach ($request->file('dokumentasi') as $file) {
                $path = $file->store('pertandingans', 'public');
                $files[] = $path;
            }
            $data['dokumentasi'] = $files;
        } else {
            $data['dokumentasi'] = $pertandingans->dokumentasi;
        }

        $pertandingans->update($data);

        Activity::create([
            'user_id' => Auth::id(),
            'description' => 'Memperbarui data pertandingan: ' . $pertandingans->nama_pertandingan,
            'status' => 'success'
        ]);

        return redirect()->route('pertandingan.index')->with('success', 'Data pertandingan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pertandingans = Pertandingan::findOrFail($id);
        $namaLama = $pertandingans->nama_pertandingan;

        if ($pertandingans->dokumentasi) {
            foreach ($pertandingans->dokumentasi as $foto) {
                FacadesStorage::disk('public')->delete($foto);
            }
        }

        $pertandingans->delete();

        Activity::create([
            'user_id' => Auth::id(),
            'description' => 'Menghapus data pertandingan: ' . $namaLama,
            'status' => 'deleted'
        ]);

        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil dihapus!');
    }

    public function achievements()
    {
        $pertandingans = Pertandingan::latest()->get();
        return view('achievements.achievements', compact('pertandingans'));
    }
}