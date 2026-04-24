<x-layouts.admin-sidebar title="Tambah Data Atlet">

    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('tambah.atlet') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                ← Kembali ke Daftar
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Data Atlet</h1>

        <div class="bg-white rounded-3xl shadow-sm p-10">
            <form action="{{ route('atlet.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-x-10 gap-y-8">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama atlet</label>
                        <input type="text" name="nama"
                            class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500 @error('nama') border-red-500 @enderror"
                            value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Umur</label>
                        <input type="number" name="umur"
                            class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500"
                            value="{{ old('umur') }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal bergabung</label>
                        <input type="date" name="tgl_bergabung"
                            class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500"
                            value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="kategori"
                            class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500 bg-white">
                            <option value="Junior" {{ old('kategori') == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Senior" {{ old('kategori') == 'Senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Atlet</label>
                        <input type="file" name="foto"
                            class="w-full px-5 py-4 border border-gray-200 rounded-2xl">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                            class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500">{{ old('deskripsi') }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('tambah.atlet') }}"
                        class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-medium rounded-2xl transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-2xl transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.admin-sidebar>
