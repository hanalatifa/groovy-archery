<x-layouts.admin-layout title="Tambah Testimoni">

    <div class="p-6 max-w-5xl mx-auto">

        {{-- Tombol Kembali --}}
        <div class="mb-8">
            <a href="{{ route('testi.index') }}"
                class="flex items-center gap-2 font-medium hover:opacity-80"
                style="color: #85488F;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Testimoni
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">
            Tambah Testimoni Baru
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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            placeholder="Contoh: Budi Santoso"
                            class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                            style="outline: none;"
                            onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                            required>
                    </div>

                    {{-- Peran --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Peran / Jabatan</label>
                        <input type="text" name="peran" value="{{ old('peran') }}"
                            placeholder="Contoh: Wali Murid / Atlet / Alumni"
                            class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                            style="outline: none;"
                            onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                            required>
                    </div>

                    {{-- Rating Bintang --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating Bintang</label>
                        <select name="rating" class="w-full px-5 py-4 border border-gray-200 bg-white"
                            style="outline: none;"
                            onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                            onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                            required>
                            <option value="" disabled selected>Pilih Rating</option>
                            @for ($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                {{ $i }} Bintang {{ str_repeat('★', $i) }}
                            </option>
                            @endfor
                        </select>
                    </div>

                    {{-- Deskripsi Kegiatan / Pesan Testimoni --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pesan Testimoni</label>
                        <textarea name="deskripsi" rows="6"
                            placeholder="Tuliskan pengalaman atau pesan testimoni di sini..."
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
                        Batal
                    </a>
                    <button type="submit"
                        class="px-10 py-4 text-white font-medium transition hover:opacity-90 bg-blue-900 hover:bg-blue-950">
                        Simpan Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.admin-layout>