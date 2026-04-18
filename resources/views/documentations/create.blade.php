<div style="font-family: sans-serif; max-width: 600px; margin: 20px auto;">
    <h2>Tambah Dokumentasi Baru</h2>

    {{-- Pesan Error Validasi --}}
    @if ($errors->any())
        <div style="color: red; background: #fee2e2; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div style="margin-bottom: 15px;">
            <label>Judul:</label><br>
            <input type="text" name="judul" value="{{ old('judul') }}" style="width: 100%; padding: 8px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Deskripsi:</label><br>
            <textarea name="deskripsi" style="width: 100%; padding: 8px; height: 100px;" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Upload Foto (Maksimal 9):</label><br>
            <input type="file" name="foto[]" id="foto" accept="image/*" required multiple>
        </div>

        {{-- Wadah Preview --}}
        <div id="preview" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>

        <div style="margin-top: 20px;">
            <button type="submit" style="background: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                Simpan Dokumentasi
            </button>
            <a href="{{ url('/documentations') }}" style="margin-left: 10px; text-decoration: none; color: #666;">Batal</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('foto');
        const preview = document.getElementById('preview');
    
        if (!input || !preview) return;
    
        input.addEventListener('change', function (event) {
            // Bersihkan preview setiap kali user memilih file baru
            preview.innerHTML = "";
    
            const files = event.target.files;
    
            // Validasi jumlah file di sisi client
            if (files.length > 9) {
                alert("Maksimal 9 foto!");
                event.target.value = ""; // Reset input file
                return;
            }
    
            // Loop setiap file untuk ditampilkan
            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.width = "100px";
                img.style.height = "100px";
                img.style.objectFit = "cover";
                img.style.borderRadius = "8px";
                img.style.border = "1px solid #ddd";

                preview.appendChild(img);
                
                // Bebaskan memori setelah gambar dimuat
                img.onload = () => {
                    URL.revokeObjectURL(img.src);
                };
            });
        });
    });
</script>