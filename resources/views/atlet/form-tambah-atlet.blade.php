<x-layouts.admin-layout title="Tambah Data Atlet">

    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('tambah.atlet') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                ← Kembali ke Daftar
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Data Atlet</h1>

        <div class="bg-white rounded-3xl shadow-sm p-10">
            <!-- Form akan saya kasih lengkap seperti sebelumnya -->
            <form action="#" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-x-10 gap-y-8">
                    <!-- Isi form sama seperti yang saya berikan sebelumnya -->
                    <!-- Nama Atlet, Umur, Tanggal Bergabung, Kategori, Upload Foto, Deskripsi -->

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama atlet</label>
                        <input type="text" class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500" value="Zenia Karina">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Umur</label>
                        <input type="number" class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500" value="16">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal bergabung</label>
                        <input type="date" class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500" value="2025-09-26">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:border-purple-500 bg-white">
                            <option>Junior</option>
                            <option selected>Senior</option>
                        </select>
                    </div>

                    <!-- Upload Foto & Deskripsi (sama seperti sebelumnya) -->

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

</x-layouts.admin-layout>
