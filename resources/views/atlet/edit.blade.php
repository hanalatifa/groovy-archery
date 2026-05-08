<x-layouts.admin-layout title="Edit Data Atlet">

    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            {{-- Sesuaikan route kembali ke index/kelola atlet kamu --}}
            <a href="{{ route('atlet.index') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                ← Kembali ke Kelola Atlet
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Edit Data Atlet</h1>

        <div class="bg-white rounded-3xl shadow-sm p-10">
            {{-- Form action diarahkan ke update dengan ID atlet --}}
            <form action="{{ route('atlet.update', $atlets->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-8">
                    {{-- Nama Atlet --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama atlet</label>
                        <input type="text" name="nama" value="{{ old('nama', $atlets->nama) }}" required
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="kategori" class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500 bg-white">
                            <option value="Junior" {{ old('kategori', $atlets->kategori) == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Senior" {{ old('kategori', $atlets->kategori) == 'Senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                    </div>

                    {{-- Tanggal Bergabung --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal bergabung</label>
                        <input type="date" name="tgl_bergabung" 
                               value="{{ old('tgl_bergabung', $atlets->tgl_bergabung ? \Carbon\Carbon::parse($atlets->tgl_bergabung)->format('Y-m-d') : '') }}"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                    </div>

                    {{-- Foto Atlet --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ganti foto atlet (Opsional)</label>
                        <input type="file" name="foto" class="mb-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" />
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-3xl h-64 flex flex-col items-center justify-center">
                            @if($atlets->foto)
                                <img src="{{ asset('storage/' . $atlets->foto) }}" class="h-52 rounded-2xl shadow" alt="Foto Atlet">
                            @else
                                <img src="{{ asset('assets/archer.jpg') }}" class="h-52 rounded-2xl shadow" alt="Foto Default">
                            @endif
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Atlet</label>
                        <textarea name="deskripsi" rows="5"
                                  class="w-full px-5 py-4 border border-gray-200 rounded-3xl focus:outline-none focus:border-purple-500">{{ old('deskripsi', $atlets->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('atlet.index') }}"
                       class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-medium rounded-2xl transition">
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