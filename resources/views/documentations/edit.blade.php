<x-layouts.admin-layout title="{{ __('dashboard.documentation_edit_title') }}">
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
            <a href="{{ route('documentations.index') }}" class="flex items-center gap-2 font-medium" style="color: #85488F;">
                {{ __('dashboard.documentation_back_list') }}
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-8">{{ __('dashboard.documentation_edit_title') }}</h1>

        <div class="bg-white shadow-xl p-10 border border-gray-100">

            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 mb-6 border border-red-100">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    {{-- Judul --}}
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">
                            {{ __('dashboard.documentation_form_title') }}
                        </label>
                        <input type="text" name="judul"
                               value="{{ old('judul', $doc->judul) }}"
                               placeholder="{{ __('dashboard.documentation_form_title_ph') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm"
                               required>
                    </div>

                    {{-- Kategori --}}
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">
                            {{ __('dashboard.documentation_form_category') }}
                        </label>
                        <select name="kategori" required
                                class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none bg-white transition shadow-sm">
                            <option value="" disabled>{{ __('dashboard.documentation_form_category_ph') }}</option>
                            <option value="Latihan"   {{ old('kategori', $doc->kategori) == 'Latihan'   ? 'selected' : '' }}>{{ __('dashboard.documentation_category_training') }}</option>
                            <option value="Kompetisi" {{ old('kategori', $doc->kategori) == 'Kompetisi' ? 'selected' : '' }}>{{ __('dashboard.documentation_category_competition') }}</option>
                            <option value="Event"     {{ old('kategori', $doc->kategori) == 'Event'     ? 'selected' : '' }}>{{ __('dashboard.documentation_category_event') }}</option>
                            <option value="Team"      {{ old('kategori', $doc->kategori) == 'Team'      ? 'selected' : '' }}>{{ __('dashboard.documentation_category_team') }}</option>
                        </select>
                    </div>

                    {{-- Foto --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-3 uppercase tracking-wider">
                            {{ __('dashboard.documentation_form_photo') }}
                        </label>

                        <div class="photo-preview-container shadow-inner" id="photo-area">
                            <input type="file" name="foto" id="foto-input" accept="image/*" class="hidden">

                            <img id="image-display"
                                 src="{{ $doc->foto ? asset('storage/docs/' . $doc->foto) : '' }}"
                                 class="w-full h-full object-cover {{ $doc->foto ? '' : 'hidden' }}"
                                 alt="{{ __('dashboard.documentation_form_photo') }}">

                            <div id="placeholder-text" class="{{ $doc->foto ? 'hidden' : '' }} absolute inset-0 flex flex-col items-center justify-center text-gray-400">
                                <svg class="w-12 h-12 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm">{{ __('dashboard.documentation_form_photo_hint') }}</span>
                                <span class="text-xs mt-1">{{ __('dashboard.documentation_form_photo_note') }}</span>
                            </div>

                            <div class="image-overlay">
                                <div class="text-center">
                                    <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-white">{{ __('dashboard.atlet_foto_ganti') }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2 italic">*{{ __('dashboard.atlet_foto_note') }}</p>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">
                            {{ __('dashboard.documentation_form_desc') }}
                        </label>
                        <textarea name="deskripsi" rows="5"
                                  placeholder="{{ __('dashboard.documentation_form_desc_ph') }}"
                                  class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm resize-none"
                                  required>{{ old('deskripsi', $doc->deskripsi) }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-12 pt-8 border-t border-gray-50">
                    <a href="{{ route('documentations.index') }}"
                       class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-bold transition">
                        {{ __('dashboard.documentation_btn_cancel') }}
                    </a>
                    <button type="submit"
                            class="bg-blue-900 hover:bg-blue-950 px-12 py-4 text-white font-bold transition shadow-lg active:scale-95">
                        {{ __('dashboard.documentation_btn_update') }}
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        const photoArea    = document.getElementById('photo-area');
        const fotoInput    = document.getElementById('foto-input');
        const imageDisplay = document.getElementById('image-display');
        const placeholder  = document.getElementById('placeholder-text');

        photoArea.addEventListener('click', () => fotoInput.click());

        fotoInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imageDisplay.src = e.target.result;
                    imageDisplay.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</x-layouts.admin-layout>
