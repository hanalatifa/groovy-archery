<div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; font-family: sans-serif;">
    <h2 style="margin: 0;">Daftar Dokumentasi</h2>
    
    <a href="{{ url('/documentations/create') }}" 
       style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 14px;">
       + Tambah Dokumentasi
    </a>
</div>

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; font-family: sans-serif;">
        {{ session('success') }}
    </div>
@endif

<table border="1" style="width: 100%; border-collapse: collapse; text-align: left; font-family: sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 10px;">Judul</th>
            <th style="padding: 10px;">Deskripsi</th>
            <th style="padding: 10px;">Foto</th>
            <th style="padding: 10px;">Waktu Upload</th> 
            <th style="padding: 10px; text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($docs as $doc)
            <tr>
                <td style="padding: 10px; vertical-align: top;">
                    <strong>{{ $doc->judul }}</strong>
                </td>
                <td style="padding: 10px; vertical-align: top;">
                    {{ $doc->deskripsi }}
                </td>
                <td style="padding: 10px;">
                    <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                        @php $images = json_decode($doc->foto); @endphp
                        @if($images)
                            @foreach($images as $img)
                                <img src="{{ asset('storage/docs/' . $img) }}" width="80" style="border-radius: 4px; object-fit: cover;">
                            @endforeach
                        @endif
                    </div>
                </td>
                <td style="padding: 10px; vertical-align: top; font-size: 13px;">
                    {{ $doc->created_at->format('d M Y') }} <br>
                    <small style="color: gray;">{{ $doc->created_at->format('H:i') }} WIB</small>
                </td>
                <td style="padding: 10px; text-align: center; vertical-align: middle;">
                    <div style="display: flex; gap: 5px; justify-content: center;">
                        <a href="{{ url('/documentations/' . $doc->id . '/edit') }}" style="background-color: #ffc107; color: black; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 13px;">Edit</a>
                        
                        <form action="{{ route('documentations.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus data ini?')">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>