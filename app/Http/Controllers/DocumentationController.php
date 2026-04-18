<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
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
            'deskripsi' => 'required',
            'foto' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $images = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                if (count($images) >= 9) break;
                $path = $file->store('docs', 'public');
                $images[] = basename($path);
            }
        }

        Documentation::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => json_encode($images),
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
            'deskripsi' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $images = json_decode($doc->foto, true) ?? [];

        if ($request->hasFile('foto')) {
            //hapus fisik foto lama dari folder
            foreach ($images as $oldImage) {
                if (Storage::disk('public')->exists('docs/' . $oldImage)) {
                    Storage::disk('public')->delete('docs/' . $oldImage);
                }
            }

            // upload foto baru
            $images = [];
            foreach ($request->file('foto') as $file) {
                if (count($images) >= 9) break;
                $path = $file->store('docs', 'public');
                $images[] = basename($path);
            }
        }

        $doc->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => json_encode($images),
        ]);

        return redirect('/documentations')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $doc = Documentation::findOrFail($id);
        $images = json_decode($doc->foto, true);

        if (is_array($images)) {
            foreach ($images as $img) {
                if (Storage::disk('public')->exists('docs/' . $img)) {
                    Storage::disk('public')->delete('docs/' . $img);
                }
            }
        }

        $doc->delete();
        return redirect('/documentations')->with('success', 'Dokumentasi dan foto berhasil dihapus!');
    }
}
