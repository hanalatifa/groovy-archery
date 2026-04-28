<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePertandinganRequest;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class PertandinganController extends Controller
{
    // halaman utama
    public function index() {
        $pertandingan = Pertandingan::latest()->get();
        return view('pertandingan.index', compact('pertandingan'));
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
                $path = $file->store('pertandingan', 'public');
                $files[] = $path;
            }
        }

        $data['dokumentasi'] = $files;

        Pertandingan::create($data);

        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil ditambah!');
    }

    // menampilkan form edit
    public function edit($id) {
        $pertandingan = Pertandingan::findOrFail($id);
        return view('pertandingan.edit', compact('pertandingan'));
    }

    // update data
    public function update(Request $request, $id) {
        $pertandingan = Pertandingan::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('dokumentasi')) {
            if ($pertandingan->dokumentasi) {
                foreach ($pertandingan->dokumentasi as $fotoLama) {
                    FacadesStorage::disk('public')->delete($fotoLama);
                }
            }

            $files = [];
            foreach ($request->file('dokumentasi') as $file) {
                $path = $file->store('pertandingan', 'public');
                $files[] = $path;
            }
            $data['dokumentasi'] = $files;
        } else {
            $data['dokumentasi'] = $pertandingan->dokumentasi;
        }

        $pertandingan->update($data);

        return redirect()->route('pertandingan.index')->with('success', 'Data pertandingan berhasil diupdate!');
    }

    // hapus data
    public function destroy($id) {
        $pertandingan = Pertandingan::findOrFail($id);

        if ($pertandingan->dokumentasi) {
            foreach ($pertandingan->dokumentasi as $foto) {
                FacadesStorage::disk('public')->delete($foto);
            }
        }

        $pertandingan->delete();
        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan dan dokumentasi berhasil dihapus!');
    }
}
