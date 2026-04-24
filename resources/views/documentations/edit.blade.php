<x-layouts.admin-layout title="Edit Dokumentasi">
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Dokumentasi</h1>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 border border-red-100">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/documentations/' . $doc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $doc->judul) }}"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <select name="kategori" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition bg-white cursor-pointer">
                            <option value="" disabled>Pilih Kategori</option>
                            <option value="Latihan" {{ old('kategori', $doc->kategori) == 'Latihan' ? 'selected' : '' }}>Latihan</option>
                            <option value="Kompetisi" {{ old('kategori', $doc->kategori) == 'Kompetisi' ? 'selected' : '' }}>Kompetisi</option>
                            <option value="Event" {{ old('kategori', $doc->kategori) == 'Event' ? 'selected' : '' }}>Event</option>
                            <option value="Team" {{ old('kategori', $doc->kategori) == 'Team' ? 'selected' : '' }}>Team</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Dokumentasi</label>
                        <div id="preview-container" class="relative group">
                            <input type="file" name="foto" id="foto" accept="image/*" class="sr-only">
                            <label for="foto" class="flex flex-col items-center justify-center w-full h-72 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-gray-100 hover:border-purple-400 transition overflow-hidden relative">

                                <img id="img-preview" src="{{ $doc->foto ? asset('storage/docs/' . $doc->foto) : '' }}" 
                                     class="{{ $doc->foto ? '' : 'hidden' }} absolute inset-0 w-full h-full object-cover z-10">
                                
                                <div id="placeholder" class="{{ $doc->foto ? 'hidden' : '' }} flex flex-col items-center justify-center pt-5 pb-6 z-0">
                                    <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 20 16">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 font-medium">Klik untuk ganti foto</p>
                                    <p class="text-xs text-gray-400">PNG, JPG atau JPEG (Maks. 10MB)</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Kegiatan</label>
                        <textarea name="deskripsi" 
                                  class="w-full h-72 px-4 py-4 border-2 border-gray-300 border-dashed rounded-2xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition resize-none bg-gray-50 placeholder-gray-400"
                                  placeholder="Tuliskan deskripsi kegiatan di sini..." required>{{ old('deskripsi', $doc->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-10">
                    <a href="{{ url('/documentations') }}"
                       class="px-6 py-2.5 rounded-lg text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-lg text-sm font-semibold text-white bg-green-600 hover:bg-green-700 transition shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('foto');
            const imgPreview = document.getElementById('img-preview');
            const placeholder = document.getElementById('placeholder');

            if (!input || !imgPreview || !placeholder) return;

            input.addEventListener('change', function (event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imgPreview.src = e.target.result;
                        imgPreview.classList.remove('hidden');
                        placeholder.classList.add('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</x-layouts.admin-layout>