<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtletRequest;
use App\Models\Atlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    // menampilkan semua data atlet
    public function index() {
        $atlets =Atlet::all();
        return view('', compact('atlets')); // TODO: masukin link page atau file untuk dashboard all atlet 
    }

    // menampilkan form tambah atlet
    public function create() {
        return view(''); // TODO: masukin link page atau file untuk form tambah atlet
    }

    // proses menyimpan data atlet
    public function store(StoreAtletRequest $request) {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('atlets', 'public');
        }

        \App\Models\Atlet::create($data);

        return redirect()->route('atlet.index')->with('success', 'Data atlet berhasil disimpan!');
    }

    // menampilkan form edit data atlet
    public function edit($id) {
        $atlets = Atlet::findOrFail($id);
        return view('', compact('atlets'));
    }

    // proses update data atlet
    public function update(Request $request, $id) {
        $atlets = Atlet::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('foto')) {
            if ($atlets->foto) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($atlets->foto);
            }
            $data['foto'] = $request->file('foto')->store('atlets', 'public');
        }
        $atlets->update($data);
        return redirect()->route('')->with('success', 'Data berhasil diupdate!');
    }

    // proses delete data
    public function destroy($id) {
        $atlets = Atlet::findOrFail($id);
        if ($atlets->foto) {
            $lokasiFoto = public_path('storage/' .$atlets->foto);

            if (file_exists($lokasiFoto)) {
                @unlink($lokasiFoto);
            }
        }

        $atlets->delete();

        return redirect()->route('')->with('success', 'Data atlet sudah dihapus!');
    }
}
