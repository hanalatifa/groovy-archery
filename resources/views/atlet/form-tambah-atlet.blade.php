<x-layouts.admin-sidebar title="{{ __('dashboard.atlet_tambah_title') }}">

    <div class="max-w-5xl mx-auto">

        {{-- ── Kembali ── --}}
        <div class="mb-8">
            <a href="{{ route('atlet.create') }}"
               class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                {{ __('dashboard.atlet_kembali_kelola') }}
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">
            {{ __('dashboard.atlet_tambah_title') }}
        </h1>

        <div class="bg-white rounded-3xl shadow-sm p-10">
            <form action="{{ route('atlet.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-x-10 gap-y-8">

                    {{-- Nama Atlet --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_nama') }}
                        </label>
                        <input type="text" name="nama"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500 @error('nama') border-red-500 @enderror"
                               value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Umur --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_umur') }}
                        </label>
                        <input type="number" name="umur"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500"
                               value="{{ old('umur') }}" required>
                    </div>

                    {{-- Tanggal Bergabung --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_tgl_bergabung') }}
                        </label>
                        <input type="date" name="tgl_bergabung"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500"
                               value="{{ date('Y-m-d') }}" required>
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_kategori') }}
                        </label>
                        <select name="kategori"
                                class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500 bg-white">
                            <option value="Junior" {{ old('kategori') == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Senior" {{ old('kategori') == 'Senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                    </div>

                    {{-- Foto Atlet --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_foto') }}
                        </label>
                        <input type="file" name="foto"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.atlet_deskripsi') }}
                        </label>
                        <textarea name="deskripsi" rows="4"
                                  class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500">{{ old('deskripsi') }}</textarea>
                    </div>

                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('atlet.index') }}"
                       class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-medium rounded-2xl transition">
                        {{ __('dashboard.btn_batal') }}
                    </a>
                    <button type="submit"
                            class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-2xl transition">
                        {{ __('dashboard.btn_simpan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.admin-sidebar>
