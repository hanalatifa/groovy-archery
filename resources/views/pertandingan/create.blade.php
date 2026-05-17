<x-layouts.admin-layout title="{{ __('dashboard.pertandingan_tambah_title') }}">

    <div class="p-6 max-w-5xl mx-auto">

        {{-- Tombol Kembali --}}
        <div class="mb-6">
            <a href="{{ route('pertandingan.index') }}" class="flex items-center gap-2 font-medium" style="color: #85488F;">
                {{ __('dashboard.pertandingan_back') }}
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">
            {{ __('dashboard.pertandingan_tambah_title') }}
        </h1>

        <div class="bg-white shadow-sm p-10">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-4 mb-6">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pertandingan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.pertandingan_nama') }}
                        </label>
                        <input type="text" name="nama_pertandingan" value="{{ old('nama_pertandingan') }}"
                               placeholder="{{ __('dashboard.pertandingan_nama_placeholder') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                               onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.pertandingan_kategori') }}
                        </label>
                        <select name="kategori"
                                class="w-full px-5 py-4 border border-gray-200 bg-white"
                                style="outline: none;"
                                onfocus="this.style.borderColor='#85488F';"
                                onblur="this.style.borderColor='#E5E7EB';"
                                required>
                            <option value="">{{ __('dashboard.pertandingan_kategori_pilih') }}</option>
                            <option value="Nasional" {{ old('kategori') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ old('kategori') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.pertandingan_tgl') }}
                        </label>
                        <input type="date" name="tgl_pertandingan" value="{{ old('tgl_pertandingan') }}"
                               class="w-full px-5 py-4 border border-gray-200"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F';"
                               onblur="this.style.borderColor='#E5E7EB';"
                               required>
                    </div>

                    {{-- Upload Area & Preview --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            {{ __('dashboard.pertandingan_dokumentasi') }}
                        </label>
                        <div id="upload-area"
                             class="border-2 border-dashed border-gray-300 p-12 text-center transition cursor-pointer"
                             onmouseover="this.style.borderColor='#85488F'"
                             onmouseout="this.style.borderColor='#D1D5DB'"
                             onclick="document.getElementById('file-input').click()">

                            {{-- Name diubah jadi tunggal tanpa [] dan tanpa multiple --}}
                            <input type="file" name="dokumentasi" id="file-input" accept="image/*" class="hidden">

                            {{-- Tempat Gambar Muncul --}}
                            <div id="preview-container" class="hidden mb-4">
                                <img id="image-preview" class="mx-auto max-h-60 shadow-md" alt="Preview">
                            </div>

                            {{-- Placeholder Awal --}}
                            <div id="placeholder-content">
                                <div class="w-16 h-16 mx-auto bg-gray-100 flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16v-4m0 0l4 4m-4-4l4-4m12 0v4m0 0l-4-4m4 4l-4 4"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 font-medium">{{ __('dashboard.pertandingan_dokumentasi_upload') }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ __('dashboard.pertandingan_dokumentasi_hint') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.pertandingan_deskripsi') }}
                        </label>
                        <textarea name="deskripsi_kegiatan" rows="5"
                                  placeholder="{{ __('dashboard.pertandingan_deskripsi_placeholder') }}"
                                  class="w-full px-5 py-4 border border-gray-200 resize-y"
                                  style="outline: none;"
                                  onfocus="this.style.borderColor='#85488F';"
                                  onblur="this.style.borderColor='#E5E7EB';">{{ old('deskripsi_kegiatan') }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('pertandingan.index') }}"
                       class="px-10 py-4 bg-red-500 hover:bg-red-600 text-white font-medium transition">
                        {{ __('dashboard.btn_cancel') }}
                    </a>
                    <button type="submit"
                            class="px-10 py-4 text-white font-medium transition hover:opacity-90 bg-blue-900 hover:bg-blue-950">
                        {{ __('dashboard.btn_simpan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const fileInput        = document.getElementById('file-input');
        const previewContainer = document.getElementById('preview-container');
        const imagePreview     = document.getElementById('image-preview');
        const placeholderCont  = document.getElementById('placeholder-content');

        fileInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('File yang dipilih harus berupa gambar!');
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                placeholderCont.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>

</x-layouts.admin-layout>