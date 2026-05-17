<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
            'judul'    => 'required',
            'kategori' => 'required',
            'deskripsi'=> 'required',
            'foto'     => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('docs', 'public');
            $fotoName = basename($path);
        }

        $doc = Documentation::create([
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi'=> $request->deskripsi,
            'foto'     => $fotoName,
        ]);

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_doc_added|' . $doc->judul,
            'status'      => 'success'
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
            'judul'    => 'required',
            'kategori' => 'required',
            'deskripsi'=> 'required',
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $fotoName = $doc->foto;

        if ($request->hasFile('foto')) {
            if ($doc->foto && Storage::disk('public')->exists('docs/' . $doc->foto)) {
                Storage::disk('public')->delete('docs/' . $doc->foto);
            }
            $path = $request->file('foto')->store('docs', 'public');
            $fotoName = basename($path);
        }

        $doc->update([
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi'=> $request->deskripsi,
            'foto'     => $fotoName,
        ]);

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_doc_updated|' . $doc->judul,
            'status'      => 'success'
        ]);

        return redirect('/documentations')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $doc = Documentation::findOrFail($id);
        $judulDoc = $doc->judul;

        if ($doc->foto && Storage::disk('public')->exists('docs/' . $doc->foto)) {
            Storage::disk('public')->delete('docs/' . $doc->foto);
        }

        $doc->delete();

        Activity::create([
            'user_id'     => Auth::id(),
            'description' => 'activity_doc_deleted|' . $judulDoc,
            'status'      => 'deleted'
        ]);

        return redirect('/documentations')->with('success', 'Dokumentasi dan foto berhasil dihapus!');
    }
}
