<x-layouts.admin-layout title="Tambah Dokumentasi">

    <div class="p-6 max-w-5xl mx-auto">

        <div class="mb-8">
            <a href="{{ route('documentations.index') }}"
               class="flex items-center gap-2 font-medium hover:opacity-80"
               style="color: #85488F;">
            ← Kembali ke Daftar Dokumentasi
               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
             {{ __('dashboard.documentation_back_list') }}
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">
            {{ __('dashboard.documentation_add_title') }}
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

            <form action="{{ route('documentations.store') }}" method="POST" enctype="multipart/form-data" id="docForm">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.documentation_form_title') }}
                        </label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                               placeholder="{{ __('dashboard.documentation_form_title_ph') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                               onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.documentation_form_category_ph') }}
                        </label>
                        <select name="kategori"
                                class="w-full px-5 py-4 border border-gray-200 bg-white"
                                style="outline: none;"
                                onfocus="this.style.borderColor='#85488F';"
                                onblur="this.style.borderColor='#E5E7EB';"
                                required>
                            <option value="" disabled selected>{{ __('dashboard.documentation_form_category_ph') }}</option>
                            <option value="Latihan" {{ old('kategori') == 'Latihan' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_training') }}</option>
                            <option value="Kompetisi" {{ old('kategori') == 'Kompetisi' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_competition') }}</option>
                            <option value="Event" {{ old('kategori') == 'Event' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_event') }}</option>
                            <option value="Team" {{ old('kategori') == 'Team' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_team') }}</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            {{ __('dashboard.documentation_form_photo') }}
                        </label>
                        <div id="upload-area"
                             class="border-2 border-dashed border-gray-300 p-12 text-center transition cursor-pointer"
                             onmouseover="this.style.borderColor='#85488F'"
                             onmouseout="this.style.borderColor='#D1D5DB'">
                            <input type="file" name="foto" id="foto-input" accept="image/*" class="hidden" required>

                            <div id="preview-container" class="hidden mb-4">
                                <img id="image-preview" class="mx-auto max-h-60 shadow" alt="Preview">
                            </div>

                            <div id="placeholder">
                                <div class="w-16 h-16 mx-auto bg-gray-100 flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16v-4m0 0l4 4m-4-4l4-4m12 0v4m0 0l-4-4m4 4l-4 4"/>
                                    </svg>
                                </div>
                                <p class="text-gray-600 font-medium">{{ __('dashboard.documentation_form_photo_hint') }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ __('dashboard.documentation_form_photo_note') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.documentation_form_desc') }}
                        </label>
                        <textarea name="deskripsi" rows="5"
                                  placeholder="{{ __('dashboard.documentation_form_desc_ph') }}"
                                  class="w-full px-5 py-4 border border-gray-200 resize-y"
                                  style="outline: none;"
                                  onfocus="this.style.borderColor='#85488F';"
                                  onblur="this.style.borderColor='#E5E7EB';"
                                  required>{{ old('deskripsi') }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('documentations.index') }}"
                       class="px-10 py-4 bg-red-500 hover:bg-red-600 text-white font-medium transition">
                        {{ __('dashboard.documentation_btn_cancel') }}
                    </a>
                    <button type="submit"
                            class="px-10 py-4 text-white font-medium transition hover:opacity-90 bg-blue-900 hover:bg-blue-950">
                        {{ __('dashboard.documentation_btn_save') }}
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
