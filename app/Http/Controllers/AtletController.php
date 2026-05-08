<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtletRequest;
use App\Http\Requests\UpdateAtletRequest;
use App\Models\Atlet;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    public function index()
    {
        $atlets = Atlet::all();
        return view('atlet.index', compact('atlets'));
    }

    public function create()
    {
        return view('atlet.create');
    }

    public function kelola()
    {
        $atlets = Atlet::latest()->get();
        return view('atlet.kelola-atlet', compact('atlets'));
    }

    public function store(StoreAtletRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('atlet', 'public');
            $data['foto'] = basename($path);
        }

        Atlet::create($data);

        return redirect()->route('atlet.index')->with('success', 'Data atlet berhasil disimpan!');
    }

    public function edit($id)
    {
        $atlet = Atlet::findOrFail($id);
        return view('atlet.edit', compact('atlet'));
    }

    public function update(UpdateAtletRequest $request, $id)
    {
        $atlet = Atlet::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
                Storage::disk('public')->delete('atlet/' . $atlet->foto);
            }

            // Simpan foto baru
            $path = $request->file('foto')->store('atlet', 'public');
            $data['foto'] = basename($path);
        }

        $atlet->update($data);

        return redirect()->route('atlet.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $atlet = Atlet::findOrFail($id);

        // Hapus file foto dari storage jika ada
        if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
            Storage::disk('public')->delete('atlet/' . $atlet->foto);
        }

        // Hapus data dari database
        $atlet->delete();

        return redirect()->route('atlet.index')->with('success', 'Data atlet sudah dihapus!');
    }
}