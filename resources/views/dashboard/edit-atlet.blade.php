<x-dashboard::admin-layout title="Edit Data Atlet">

    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('kelola.atlet') }}" class="text-purple-600 hover:text-purple-700 flex items-center gap-2">
                ← Kembali ke Kelola Atlet
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Edit Data Atlet</h1>

        <div class="bg-white rounded-3xl shadow-sm p-10">
            <form action="#" method="POST">
                @csrf

                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama atlet</label>
                        <input type="text" value="Zenia Karina"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500 bg-white">
                            <option value="Junior">Junior</option>
                            <option value="Senior" selected>Senior</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal bergabung</label>
                        <input type="date" value="2025-09-26"
                               class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-purple-500">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload foto atlet</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-3xl h-64 flex flex-col items-center justify-center">
                            <img src="{{ asset('assets/archer.jpg') }}" class="h-52 rounded-2xl shadow" alt="Foto Atlet">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Atlet</label>
                        <textarea rows="5"
                                  class="w-full px-5 py-4 border border-gray-200 rounded-3xl focus:outline-none focus:border-purple-500">Halo! Aku Zenia dari Jakarta Utara. Aku bergabung dengan Groovy semenjak tahun 2020.</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-12">
                    <a href="{{ route('kelola.atlet') }}"
                       class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-medium rounded-2xl transition">
                        Cancel
                    </a>
                    <button type="submit"
                            onclick="event.preventDefault(); alert('Data berhasil disimpan!'); window.location.href = '{{ route('kelola.atlet') }}';"
                            class="px-10 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-2xl transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-dashboard::admin-layout>
