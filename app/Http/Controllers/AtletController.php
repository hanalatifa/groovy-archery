<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtletRequest;
use App\Models\Atlet;
use Illuminate\Http\Request;

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
}
