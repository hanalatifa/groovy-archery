<x-layouts.admin-layout title="Edit Data Atlet">

    <div class="p-6 max-w-5xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('atlet.kelola') }}" class="flex items-center gap-2 font-medium" style="color: #85488F;">
                {{ __('dashboard.atlet_kembali') }}
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">
            {{ __('dashboard.atlet_edit_profil') }}
        </h1>

        <div class="bg-white shadow-sm p-10">

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-4 mb-6">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('atlet.update', $atlet->id) }}" method="POST" enctype="multipart/form-data" id="atletForm">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                    {{-- Nama Lengkap --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_nama') }}
                        </label>
                        <input type="text" name="nama" value="{{ old('nama', $atlet->nama) }}"
                               placeholder="{{ __('dashboard.atlet_nama_placeholder') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                               onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                               required>
                    </div>

                    {{-- Umur --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_umur') }}
                        </label>
                        <input type="number" name="umur" value="{{ old('umur', $atlet->umur) }}"
                               placeholder="{{ __('dashboard.atlet_umur_placeholder') }}"
                               class="w-full px-5 py-4 border border-gray-200"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F';"
                               onblur="this.style.borderColor='#E5E7EB';"
                               min="10" max="60" required>
                    </div>

                    {{-- Tanggal Bergabung --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_tgl_bergabung') }}
                        </label>
                        <input type="date" name="tgl_bergabung" value="{{ old('tgl_bergabung', $atlet->tgl_bergabung ? $atlet->tgl_bergabung->format('Y-m-d') : '') }}"
                               class="w-full px-5 py-4 border border-gray-200"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F';"
                               onblur="this.style.borderColor='#E5E7EB';"
                               required>
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_kategori') }}
                        </label>
                        <select name="kategori"
                                class="w-full px-5 py-4 border border-gray-200 bg-white"
                                style="outline: none;"
                                onfocus="this.style.borderColor='#85488F';"
                                onblur="this.style.borderColor='#E5E7EB';"
                                required>
                            <option value="">{{ __('dashboard.atlet_kategori_pilih') }}</option>
                            <option value="Junior" {{ old('kategori', $atlet->kategori) == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Senior" {{ old('kategori', $atlet->kategori) == 'Senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                    </div>

                    {{-- Upload / Preview Foto --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            {{ __('dashboard.atlet_foto') }}
                        </label>
                        <div id="upload-area"
                             class="border-2 border-dashed border-gray-300 p-12 text-center transition cursor-pointer"
                             onmouseover="this.style.borderColor='#85488F'"
                             onmouseout="this.style.borderColor='#D1D5DB'">
                            <input type="file" name="foto" id="foto-input" accept="image/*" class="hidden">
                            
                            {{-- Jika ada foto lama, langsung tampilkan preview-nya --}}
                            <div id="preview-container" class="{{ $atlet->foto ? '' : 'hidden' }} mb-4">
                                <img id="image-preview" 
                                     src="{{ $atlet->foto ? asset('storage/atlet/' . $atlet->foto) : '' }}" 
                                     class="mx-auto max-h-60 shadow" alt="Preview">
                            </div>
                            
                            <div id="placeholder" class="{{ $atlet->foto ? 'hidden' : '' }}">
                                <div class="w-16 h-16 mx-auto bg-gray-100 flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16v-4m0 0l4 4m-4-4l4-4m12 0v4m0 0l-4-4m4 4l-4 4"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 font-medium">{{ __('dashboard.atlet_foto_click') }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ __('dashboard.atlet_foto_hint') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_deskripsi') }}
                        </label>
                        <textarea name="deskripsi" rows="5"
                                  placeholder="{{ __('dashboard.atlet_deskripsi_placeholder') }}"
                                  class="w-full px-5 py-4 border border-gray-200 resize-y"
                                  style="outline: none;"
                                  onfocus="this.style.borderColor='#85488F';"
                                  onblur="this.style.borderColor='#E5E7EB';">{{ old('deskripsi', $atlet->deskripsi) }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('atlet.kelola') }}"
                       class="px-10 py-4 bg-red-500 hover:bg-red-600 text-white font-medium transition">
                        {{ __('dashboard.btn_cancel') }}
                    </a>
                    <button type="submit"
                            class="px-10 py-4 text-white font-medium transition hover:opacity-90 bg-blue-900 hover:bg-blue-950">
                            {{ __('dashboard.btn_simpan_perubahan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const uploadArea       = document.getElementById('upload-area');
        const fileInput        = document.getElementById('foto-input');
        const previewContainer = document.getElementById('preview-container');
        const imagePreview     = document.getElementById('image-preview');
        const placeholder      = document.getElementById('placeholder');

        uploadArea.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;
            if (!file.type.startsWith('image/')) {
                alert('Hanya file gambar yang diperbolehkan!');
                return;
            }
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>

</x-layouts.admin-layout>