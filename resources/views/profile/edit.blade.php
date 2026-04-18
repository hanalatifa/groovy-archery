<form action="{{ route('documentations.update', $doc->id) }}" method="POST" enctype="multipart/form-data">

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @csrf
    @method('PUT') 

    <div style="margin-bottom: 10px;">
        <label>Judul:</label><br>
        <input type="text" name="judul" value="{{ $doc->judul }}" required>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required>{{ $doc->deskripsi }}</textarea>
    </div>

    <div style="margin-bottom: 10px;">
        <label>Ganti Foto (Opsional):</label><br>
        <input type="file" name="foto[]" multiple>
    </div>

    <div style="margin-bottom: 10px;">
        <p>Foto saat ini:</p>
        @foreach(json_decode($doc->foto) as $img)
            <img src="{{ asset('storage/docs/' . $img) }}" width="100" style="border-radius: 5px; margin-right: 5px;">
        @endforeach
    </div>
    
    <button type="submit" style="background: #28a745; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">
        Update Data
    </button>
    <a href="/documentations" style="margin-left: 10px; text-decoration: none; color: gray;">Batal</a>
</form>