<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtletRequest;
use App\Http\Requests\UpdateAtletRequest;
use App\Models\Atlet;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    // menampilkan semua data atlet
    public function index()
    {
        $atlets = Atlet::all();
        return view('atlet.index', compact('atlets'));
    }

    // menampilkan form tambah atlet
    public function create()
    {
        return view('atlet.create');
    }

    // proses menyimpan data atlet
    public function store(StoreAtletRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('atlet', 'public');
            $data['foto'] = basename($path); // simpan nama file aja
        }

        Atlet::create($data);

        return redirect()->route('atlet.index')
            ->with('success', 'Data atlet berhasil disimpan!');
    }

    // menampilkan form edit data atlet
    public function edit($id)
    {
        $atlets = Atlet::findOrFail($id);
        return view('atlet.edit', compact('atlets'));
    }

    // proses update data atlet
    public function update(UpdateAtletRequest $request, $id)
    {
        $atlets = Atlet::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            if ($atlets->foto && Storage::disk('public')->exists('atlet/' . $atlets->foto)) {
                Storage::disk('public')->delete('atlet/' . $atlets->foto);
            }

            $path = $request->file('foto')->store('atlet', 'public');
            $data['foto'] = basename($path);
        }

        $atlets->update($data);

        return redirect()->route('atlet.index')
            ->with('success', 'Data berhasil diupdate!');
    }

    // proses delete data
    public function destroy($id)
    {
        $atlets = Atlet::findOrFail($id);

        if ($atlets->foto && Storage::disk('public')->exists('atlet/' . $atlets->foto)) {
            Storage::disk('public')->delete('atlet/' . $atlets->foto);
        }

        $atlets->delete();

        return redirect()->route('atlet.index')
            ->with('success', 'Data atlet sudah dihapus!');
    }
}
