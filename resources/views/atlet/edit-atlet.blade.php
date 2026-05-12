<x-layouts.admin-layout title="Edit Data Atlet">

    <div class="max-w-4xl mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('atlet.index') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                ← Kembali ke Kelola Atlet
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Edit Data Atlet</h1>

        <div class="bg-white rounded-3xl shadow-sm p-10">
            <form action="{{ route('atlet.update', $atlet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama atlet</label>
                        <input type="text" name="nama" value="{{ old('nama', $atlet->nama) }}"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500 @error('nama') border-red-500 @enderror">
                        @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="kategori" class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500 bg-white">
                            <option value="Junior" {{ $atlet->kategori == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Senior" {{ $atlet->kategori == 'Senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal bergabung</label>
                        <input type="date" name="created_at" value="{{ $atlet->created_at->format('Y-m-d') }}"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto atlet (Kosongkan jika tidak diubah)</label>
                        <div class="flex flex-col md:flex-row gap-6 items-center">
                            @if($atlet->foto)
                                <div class="w-40 h-40 overflow-hidden rounded-2xl shadow">
                                    <img src="{{ asset('storage/atlet/' . $atlet->foto) }}" class="w-full h-full object-cover" alt="Foto Saat Ini">
                                </div>
                            @endif
                            <input type="file" name="foto"
                                   class="flex-1 w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Atlet</label>
                        <textarea name="deskripsi" rows="5"
                                  class="w-full px-5 py-4 border border-gray-200 rounded-3xl focus:outline-none focus:border-purple-500">{{ old('deskripsi', $atlet->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('atlet.index') }}"
                       class="px-8 py-4 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-2xl transition">
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
