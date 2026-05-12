<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertandinganRequest;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class PertandinganController extends Controller
{
    public function welcome() {
    $pertandingans = Pertandingan::latest()->take(6)->get();
    
    return view('welcome', compact('pertandingans'));
    }

    // halaman utama
    public function index() {
    $pertandingans = Pertandingan::all();

    return view('pertandingan.index', compact('pertandingans'));
    }

    // menampilkan form tambah data
    public function create() {
        return view('pertandingan.create');
    }

    // looping untuk menyimpan foto satu persatu (menyimpan data)
    public function store(StorePertandinganRequest $request) {
        $data = $request->validated();
        $files = [];

        if ($request->hasFile('dokumentasi')) {
            foreach ($request->file('dokumentasi') as $file) {
                $path = $file->store('pertandingans', 'public');
                $files[] = $path;
            }
        }

        $data['dokumentasi'] = $files;

        Pertandingan::create($data);

        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil ditambah!');
    }

    // menampilkan form edit
    public function edit($id) {
        $pertandingans = Pertandingan::findOrFail($id);
        return view('profile.edit', compact('pertandingans'));
    }

    // update data
    public function update(Request $request, $id) {
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

        return redirect()->route('pertandingan.index')->with('success', 'Data pertandingan berhasil diupdate!');
    }

    // hapus data
    public function destroy($id) {
        $pertandingans = Pertandingan::findOrFail($id);

        if ($pertandingans->dokumentasi) {
            foreach ($pertandingans->dokumentasi as $foto) {
                FacadesStorage::disk('public')->delete($foto);
            }
        }

        $pertandingans->delete();
        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan dan dokumentasi berhasil dihapus!');
    }

    public function achievements() {
    $pertandingans = Pertandingan::latest()->get();
    
    return view('achievements.achievements', compact('pertandingans'));
    }
}
