<x-layouts.admin-layout title="{{ __('dashboard.testimoni_add_title') }}">
    <div class="p-6 max-w-5xl mx-auto">

        {{-- Tombol Kembali --}}
        <div class="mb-8">
            <a href="{{ route('testi.index') }}"
                class="flex items-center gap-2 font-medium hover:opacity-80"
                style="color: #85488F;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                {{ __('dashboard.documentation_back_list') }}
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">
            {{ __('dashboard.testimoni_add_title') }}
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

            <form action="{{ route('testi.store') }}" method="POST">
                @csrf

                {{-- Baris Nama & Peran --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('dashboard.testimoni_form_name') }}</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            placeholder="{{ __('dashboard.testimoni_name_ph') }}"
                            class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                            style="outline: none;"
                            onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                            required>
                    </div>

                    {{-- Peran --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('dashboard.testimoni_form_role') }}</label>
                        <input type="text" name="peran" value="{{ old('peran') }}"
                            placeholder="{{ __('dashboard.testimoni_role_ph') }}"
                            class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                            style="outline: none;"
                            onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                            required>
                    </div>

                    {{-- Rating Bintang --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('dashboard.testimoni_rating_label') }}</label>
                        <select name="rating" class="w-full px-5 py-4 border border-gray-200 bg-white"
                            style="outline: none;"
                            onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                            required>
                            <option value="" disabled selected>{{ __('dashboard.testimoni_rating_placeholder') }}</option>
                            @for ($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                {{ $i }} {{ __('dashboard.testimoni_rating_star') }} {{ str_repeat('★', $i) }}
                            </option>
                            @endfor
                        </select>
                    </div>

                    {{-- Deskripsi Kegiatan / Pesan Testimoni --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('dashboard.testimoni_message_label') }}</label>
                        <textarea name="deskripsi" rows="6"
                            placeholder="{{ __('dashboard.testimoni_message_ph') }}"
                            class="w-full px-5 py-4 border border-gray-200 resize-y"
                            style="outline: none;"
                            onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                            required>{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('testi.index') }}"
                        class="px-10 py-4 bg-red-500 hover:bg-red-600 text-white font-medium transition">
                        {{ __('dashboard.documentation_btn_cancel') }}
                    </a>
                    <button type="submit"
                        class="px-10 py-4 text-white font-medium transition hover:opacity-90 bg-blue-900 hover:bg-blue-950">
                        {{ __('dashboard.testimoni_btn_save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.admin-layout>
