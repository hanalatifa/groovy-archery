<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    public function gallery()
    {
        $docs = Documentation::all();
        return view('gallery.gallery', compact('docs')); 
    }

    public function index()
    {
        $docs = Documentation::all();
        $totalDocs = Documentation::count();
        return view('documentations.index', compact('docs', 'totalDocs'));
    }


    public function create()
    {
        return view('documentations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required', // Tambah kategori
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:10240', // Validasi single image
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('docs', 'public');
            $fotoName = basename($path);
        }

        Documentation::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori, // Simpan kategori
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoName, // Simpan sebagai string biasa
        ]);

        return redirect('/documentations')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $doc = Documentation::findOrFail($id);
        return view('documentations.edit', compact('doc'));
    }

    public function update(Request $request, $id)
    {
        $doc = Documentation::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'kategori' => 'required', // Tambah kategori
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // Nullable jika tidak ingin ganti foto
        ]);

        $fotoName = $doc->foto; // Gunakan foto lama sebagai default

        if ($request->hasFile('foto')) {
            // Hapus fisik foto lama jika ada
            if ($doc->foto && Storage::disk('public')->exists('docs/' . $doc->foto)) {
                Storage::disk('public')->delete('docs/' . $doc->foto);
            }

            // Upload foto baru
            $path = $request->file('foto')->store('docs', 'public');
            $fotoName = basename($path);
        }

        $doc->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoName,
        ]);

        return redirect('/documentations')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $doc = Documentation::findOrFail($id);

        // Hapus fisik foto tunggal
        if ($doc->foto && Storage::disk('public')->exists('docs/' . $doc->foto)) {
            Storage::disk('public')->delete('docs/' . $doc->foto);
        }

        $doc->delete();
        return redirect('/documentations')->with('success', 'Dokumentasi dan foto berhasil dihapus!');
    }
}
