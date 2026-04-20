<x-layouts.admin-layout>
    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Dokumentasi</h1>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">

            <form action="{{ url('/documentations/' . $doc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- WAJIB untuk update --}}

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul', $doc->judul) }}"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition"
                           required>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi"
                              class="w-full h-40 px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition resize-none"
                              required>{{ old('deskripsi', $doc->deskripsi) }}</textarea>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Foto Saat Ini</label>
                    <div class="flex gap-3 flex-wrap">
                        @if($doc->foto)
                            @foreach(json_decode($doc->foto) as $img)
                                <img src="{{ asset('storage/docs/' . $img) }}"
                                     class="w-20 h-20 rounded-xl object-cover border border-gray-200 shadow-sm">
                            @endforeach
                        @else
                            <p class="text-sm text-gray-400">Tidak ada foto.</p>
                        @endif
                    </div>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Foto Baru (Kosongkan jika tidak ingin ganti)
                    </label>
                    <input type="file" name="foto[]" multiple
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition">
                </div>

                <div class="flex justify-end gap-3 mt-10">
                    <a href="{{ url('/documentations') }}"
                       class="px-6 py-2.5 rounded-lg text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-lg text-sm font-semibold text-white bg-green-600 hover:bg-green-700 transition shadow-sm">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin-layout>
