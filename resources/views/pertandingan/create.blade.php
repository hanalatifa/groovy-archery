<x-layouts.admin-layout title="Tambah Data Pertandingan">

    <div class="p-6 max-w-4xl mx-auto">
        <h2 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Data Pertandingan</h2>

        <div class="bg-white rounded-3xl shadow-sm p-8">

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-2xl mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pertandingan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Pertandingan -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pertandingan</label>
                        <input type="text" name="nama_pertandingan" value="{{ old('nama_pertandingan') }}"
                            class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:border-purple-500"
                            required>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                        <select name="kategori"
                            class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:border-purple-500"
                            required>
                            <option value="">Pilih Kategori</option>
                            <option value="Nasional" {{ old('kategori') == 'Nasional' ? 'selected' : '' }}>Nasional
                            </option>
                            <option value="Internasional" {{ old('kategori') == 'Internasional' ? 'selected' : '' }}>
                                Internasional</option>
                        </select>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Pertandingan</label>
                        <input type="date" name="tgl_pertandingan" value="{{ old('tgl_pertandingan') }}"
                            class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:border-purple-500"
                            required>
                    </div>

                    <!-- Upload Foto -->
                    <!-- Upload Dokumentasi -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Dokumentasi</label>
                        <input type="file" name="dokumentasi[]" multiple accept="image/*"
                            class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:border-purple-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                        <p class="text-xs text-gray-500 mt-1">Bisa upload banyak foto sekaligus (PNG, JPG, JPEG)</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Pertandingan</label>
                        <textarea name="deskripsi_kegiatan" rows="5"
                            class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:border-purple-500 resize-y">{{ old('deskripsi_kegiatan') }}</textarea>
                    </div>

                    <div class="flex justify-end gap-4 mt-10">
                        <a href="{{ route('pertandingan.index') }}"
                            class="px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-2xl transition">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-2xl transition">
                            Simpan
                        </button>
                    </div>
            </form>
        </div>
    </div>

</x-layouts.admin-layout>
