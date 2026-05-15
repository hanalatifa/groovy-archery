<x-layouts.admin-layout title="{{ __('dashboard.pertandingan_edit_title') }}">
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

    <div class="max-w-4xl mx-auto p-6">
        <div class="mb-6">
            <a href="/kelola-pertandingan" class="flex items-center gap-2 font-medium" style="color: #85488F;">
                ← {{ __('dashboard.pertandingan_back') }}
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ __('dashboard.pertandingan_edit_title') }}</h1>

        <div class="bg-white shadow-xl p-10 border border-gray-100">
            <form action="{{ route('pertandingan.update', $pertandingan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">{{ __('dashboard.pertandingan_nama') }}</label>
                        <input type="text" name="nama_pertandingan"
                               value="{{ old('nama_pertandingan', $pertandingan->nama_pertandingan) }}"
                               placeholder="{{ __('dashboard.pertandingan_nama_placeholder') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">{{ __('dashboard.pertandingan_kategori') }}</label>
                        <select name="kategori" class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none bg-white transition shadow-sm">
                            <option value="Nasional" {{ old('kategori', $pertandingan->kategori) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ old('kategori', $pertandingan->kategori) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">{{ __('dashboard.pertandingan_tgl') }}</label>
                        <input type="date" name="tgl_pertandingan"
                               value="{{ old('tgl_pertandingan', $pertandingan->tgl_pertandingan ? $pertandingan->tgl_pertandingan->format('Y-m-d') : '') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">{{ __('dashboard.pertandingan_dokumentasi') }} ({{ __('dashboard.pertandingan_dokumentasi_upload') }})</label>

                        <div class="photo-preview-container shadow-inner" id="photo-area">
                            <input type="file" name="dokumentasi[]" id="foto-input" accept="image/*" multiple class="hidden">

                            <div id="image-preview-wrapper" class="w-full h-full flex items-center justify-center p-4 gap-4 flex-wrap overflow-y-auto">
                                @if($pertandingan->dokumentasi && count($pertandingan->dokumentasi) > 0)
                                    @foreach($pertandingan->dokumentasi as $img)
                                        <img src="{{ asset('storage/' . $img) }}" class="h-full max-h-[280px] object-contain shadow-sm" alt="{{ __('dashboard.pertandingan_dokumentasi') }}">
                                    @endforeach
                                @else
                                    <div id="placeholder-text" class="text-center text-gray-400">
                                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span>{{ __('dashboard.pertandingan_empty') }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="image-overlay">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    <span class="text-white">{{ __('dashboard.pertandingan_dokumentasi_upload') }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2 italic">*{{ __('dashboard.pertandingan_dokumentasi_hint') }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">{{ __('dashboard.pertandingan_deskripsi') }}</label>
                        <textarea name="deskripsi_kegiatan" rows="5"
                                  placeholder="{{ __('dashboard.pertandingan_deskripsi_placeholder') }}"
                                  class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm resize-none">{{ old('deskripsi_kegiatan', $pertandingan->deskripsi_kegiatan) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-12 pt-8 border-t border-gray-50">
                    <a href="/kelola-pertandingan"
                       class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-bold transition">
                        {{ __('dashboard.btn_batal') }}
                    </a>
                    <button type="submit"
                            class="bg-blue-900 hover:bg-blue-950 px-12 py-4 text-white font-bold transition shadow-lg active:scale-95">
                        {{ __('dashboard.btn_simpan_perubahan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const photoArea = document.getElementById('photo-area');
        const fotoInput = document.getElementById('foto-input');
        const previewWrapper = document.getElementById('image-preview-wrapper');

        photoArea.addEventListener('click', () => fotoInput.click());

        fotoInput.addEventListener('change', function() {
            const files = this.files;
            if (files && files.length > 0) {
                previewWrapper.innerHTML = '';

                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'h-full max-h-[280px] object-contain shadow-sm';
                            img.alt = 'Preview Dokumentasi';
                            previewWrapper.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
</x-layouts.admin-layout>
