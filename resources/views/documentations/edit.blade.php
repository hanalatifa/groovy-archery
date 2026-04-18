<h2>Edit Dokumentasi</h2>

<form action="{{ url('/documentations/' . $doc->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- WAJIB untuk update --}}

    <div>
        <label>Judul:</label><br>
        <input type="text" name="judul" value="{{ $doc->judul }}" required>
    </div>

    <div style="margin-top: 10px;">
        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required>{{ $doc->deskripsi }}</textarea>
    </div>

    <div style="margin-top: 10px;">
        <label>Foto Baru (Kosongkan jika tidak ingin ganti):</label><br>
        <input type="file" name="foto[]" multiple>
    </div>

    <div style="margin-top: 10px;">
        <p>Foto Saat Ini:</p>
        @foreach(json_decode($doc->foto) as $img)
            <img src="{{ asset('storage/docs/' . $img) }}" width="100" style="margin-right: 5px; border-radius: 5px;">
        @endforeach
    </div>

    <button type="submit" style="margin-top: 20px; background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
        Update Data
    </button>
    <a href="/documentations">Batal</a>
</form>