<x-layouts.admin-layout title="Edit Dokumentasi">
    <style>
        .photo-preview-container {
            position: relative;
            width: 100%;
            height: 320px;
            border: 2px dashed #d1d5db;
            background-color: #f9fafb;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .photo-preview-container:hover {
            border-color: #85488F;
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
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">{{ __('dashboard.documentation_edit_title') }}</h1>

    <div class="max-w-4xl mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('documentations.index') }}" class="flex items-center gap-2 font-medium" style="color: #85488F;">
                ← Kembali ke Daftar Dokumentasi
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-8">Edit Dokumentasi</h1>

        <div class="bg-white shadow-xl p-10 border border-gray-100">
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-none mb-6 border border-red-100">
                    <ul class="list-disc list-inside text-sm font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('documentations.update', $doc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Judul</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('dashboard.documentation_form_title') }}</label>
                        <input type="text" name="judul" value="{{ old('judul', $doc->judul) }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm"
                               required>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Kategori</label>
                        <select name="kategori" required
                                class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none bg-white transition shadow-sm">
                            <option value="" disabled>Pilih Kategori</option>
                            <option value="Latihan" {{ old('kategori', $doc->kategori) == 'Latihan' ? 'selected' : '' }}>Latihan</option>
                            <option value="Kompetisi" {{ old('kategori', $doc->kategori) == 'Kompetisi' ? 'selected' : '' }}>Kompetisi</option>
                            <option value="Event" {{ old('kategori', $doc->kategori) == 'Event' ? 'selected' : '' }}>Event</option>
                            <option value="Team" {{ old('kategori', $doc->kategori) == 'Team' ? 'selected' : '' }}>Team</option>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('dashboard.documentation_form_category') }}</label>
                        <select name="kategori" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition bg-white cursor-pointer">
                            <option value="" disabled>{{ __('dashboard.documentation_form_category_ph') }}</option>
                            <option value="Latihan" {{ old('kategori', $doc->kategori) == 'Latihan' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_training') }}</option>
                            <option value="Kompetisi" {{ old('kategori', $doc->kategori) == 'Kompetisi' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_competition') }}</option>
                            <option value="Event" {{ old('kategori', $doc->kategori) == 'Event' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_event') }}</option>
                            <option value="Team" {{ old('kategori', $doc->kategori) == 'Team' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_team') }}</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">Foto Dokumentasi (Klik untuk ganti)</label>
                        
                        <div class="photo-preview-container shadow-inner" id="photo-area">
                            <input type="file" name="foto" id="foto-input" accept="image/*" class="hidden">

                            <img id="image-display" 
                                 src="{{ $doc->foto ? asset('storage/docs/' . $doc->foto) : 'https://via.placeholder.com/400x300?text=No+Image' }}" 
                                 class="w-full h-full object-cover" alt="Foto Dokumentasi">

                            <div class="image-overlay">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    <span class="text-white">Ganti Foto Baru</span>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('dashboard.documentation_form_photo') }}</label>
                        <div id="preview-container" class="relative group">
                            <input type="file" name="foto" id="foto" accept="image/*" class="sr-only">
                            <label for="foto" class="flex flex-col items-center justify-center w-full h-72 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-gray-100 hover:border-purple-400 transition overflow-hidden relative">

                                <img id="img-preview" src="{{ $doc->foto ? asset('storage/docs/' . $doc->foto) : '' }}"
                                     class="{{ $doc->foto ? '' : 'hidden' }} absolute inset-0 w-full h-full object-cover z-10">

                                <div id="placeholder" class="{{ $doc->foto ? 'hidden' : '' }} flex flex-col items-center justify-center pt-5 pb-6 z-0">
                                    <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 20 16">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 font-medium">{{ __('dashboard.documentation_form_photo_hint') }}</p>
                                    <p class="text-xs text-gray-400">{{ __('dashboard.documentation_form_photo_note') }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2 italic">*Klik pada gambar di atas untuk memilih file baru dari perangkat anda (Maks. 10MB).</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" rows="5"
                                  class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm resize-none"
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ __('dashboard.documentation_form_desc') }}</label>
                        <textarea name="deskripsi"
                                  class="w-full h-72 px-4 py-4 border-2 border-gray-300 border-dashed rounded-2xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition resize-none bg-gray-50 placeholder-gray-400"
                                  placeholder="Tuliskan deskripsi kegiatan di sini..." required>{{ old('deskripsi', $doc->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-12 pt-8 border-t border-gray-50">
                    <a href="{{ route('documentations.index') }}"
                       class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-bold transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="bg-blue-900 hover:bg-blue-950 px-12 py-4 text-white font-bold transition shadow-lg active:scale-95">
                        Simpan Perubahan
                <div class="flex justify-end gap-3 mt-10">
                    <a href="{{ url('/documentations') }}"
                       class="px-6 py-2.5 rounded-lg text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                        {{ __('dashboard.documentation_btn_cancel') }}
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-lg text-sm font-semibold text-white bg-green-600 hover:bg-green-700 transition shadow-sm">
                        {{ __('dashboard.documentation_btn_update') }}
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
