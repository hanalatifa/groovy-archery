<x-layouts.admin-layout title="Edit Data Atlet">
    <style>
        .photo-preview-container {
            position: relative;
            width: 100%;
            height: 320px;
            border-radius: 24px;
            border: 2px dashed #d1d5db;
            background-color: #f9fafb;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .photo-preview-container:hover {
            border-color: #7c3aed;
            background-color: #f3f4f6;
        }
        .image-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
            color: white;
            font-weight: 600;
        }
        .photo-preview-container:hover .image-overlay {
            opacity: 1;
        }
    </style>

    <div class="max-w-4xl mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('atlet.kelola') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2 font-medium">
                ← Kembali ke Daftar Atlet
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Profil Atlet</h1>

        <div class="bg-white rounded-3xl shadow-xl p-10 border border-gray-100">
            <form action="{{ route('atlet.update', $atlet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $atlet->nama) }}"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Kategori</label>
                        <select name="kategori" class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none bg-white transition shadow-sm">
                            <option value="Junior" {{ $atlet->kategori == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Senior" {{ $atlet->kategori == 'Senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">Foto Profil (Klik untuk ganti)</label>
                        
                        <div class="photo-preview-container shadow-inner" id="photo-area">
                            <input type="file" name="foto" id="foto-input" accept="image/*" class="hidden">

                            <img id="image-display" 
                                 src="{{ $atlet->foto ? asset('storage/atlet/' . $atlet->foto) : 'https://via.placeholder.com/400x300?text=No+Image' }}" 
                                 class="w-full h-full object-cover rounded-3xl" alt="Foto Atlet">

                            <div class="image-overlay rounded-3xl">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    <span>Ganti Foto Baru</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2 italic">*Klik pada gambar di atas untuk memilih file baru dari perangkat anda.</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Deskripsi / Prestasi</label>
                        <textarea name="deskripsi" rows="5"
                                  class="w-full px-5 py-4 border border-gray-200 rounded-3xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm resize-none">{{ old('deskripsi', $atlet->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-12 pt-8 border-t border-gray-50">
                    <a href="{{ route('atlet.kelola') }}"
                       class="px-8 py-4 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-2xl transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-12 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl transition shadow-lg shadow-indigo-200 active:scale-95">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const photoArea = document.getElementById('photo-area');
        const fotoInput = document.getElementById('foto-input');
        const imageDisplay = document.getElementById('image-display');

        photoArea.addEventListener('click', () => fotoInput.click());

        fotoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageDisplay.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-layouts.admin-layout>