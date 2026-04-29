<x-layouts.admin-layout title="Edit Data Pertandingan">

    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="/kelola-pertandingan" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                ← Kembali ke Kelola Pertandingan
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Edit Data Pertandingan</h1>

        <div class="bg-white rounded-3xl shadow-sm p-10">
            <form action="{{ route('pertandingan.update', $pertandingan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-8">
                    {{-- 1. Nama Pertandingan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Pertandingan</label>
                        <input type="text" name="nama_pertandingan" 
                               value="{{ old('nama_pertandingan', $pertandingan->nama_pertandingan) }}"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                    </div>

                    {{-- 2. Kategori --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="kategori" class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500 bg-white">
                            <option value="Nasional" {{ old('kategori', $pertandingan->kategori) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="Internasional" {{ old('kategori', $pertandingan->kategori) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>

                    {{-- 3. Tanggal Pertandingan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pertandingan</label>
                        <input type="date" name="tgl_pertandingan" 
                               {{-- Format Y-m-d wajib supaya muncul di input date --}}
                               value="{{ old('tgl_pertandingan', $pertandingan->tgl_pertandingan ? $pertandingan->tgl_pertandingan->format('Y-m-d') : '') }}"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                    </div>

                    {{-- 4. Dokumentasi (Foto) --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload dokumentasi pertandingan</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-3xl p-6 flex flex-col items-center justify-center min-h-[256px]">
                            
                            {{-- Karena pakai $casts array, langsung foreach saja --}}
                            @if($pertandingan->dokumentasi && count($pertandingan->dokumentasi) > 0)
                                <div class="flex flex-wrap justify-center gap-4 mb-4">
                                    @foreach($pertandingan->dokumentasi as $img)
                                        <img src="{{ asset('storage/' . $img) }}" class="h-32 rounded-2xl shadow-sm" alt="Dokumentasi">
                                    @endforeach
                                </div>
                            @endif
                            
                            <input type="file" name="dokumentasi[]" multiple class="text-sm text-gray-500">
                            <p class="text-xs text-gray-400 mt-2">Bisa upload banyak foto sekaligus (PNG, JPG, JPEG)</p>
                        </div>
                    </div>

                    {{-- 5. Deskripsi --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Pertandingan</label>
                        <textarea name="deskripsi_kegiatan" rows="5"
                                  class="w-full px-5 py-4 border border-gray-200 rounded-3xl focus:outline-none focus:border-purple-500">{{ old('deskripsi_kegiatan', $pertandingan->deskripsi_kegiatan) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="/kelola-pertandingan"
                       class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-medium rounded-2xl transition text-center">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-2xl transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.admin-layout>