<x-layouts.admin-layout title="Tambah Atlet">

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Tambah Atlet</h1>

            <a href="{{ route('tambah.atlet') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3.5 rounded-2xl font-medium flex items-center gap-2 transition">
                <span>+</span> Tambah Atlet
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm p-8">
            <h2 class="text-xl font-semibold mb-6">Aktivitas Terbaru</h2>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-5 px-6 font-medium text-gray-600">Tanggal</th>
                            <th class="text-left py-5 px-6 font-medium text-gray-600">Nama Atlet</th>
                            <th class="text-left py-5 px-6 font-medium text-gray-600">Kategori Atlet</th>
                            <th class="text-left py-5 px-6 font-medium text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @for ($i = 0; $i < 8; $i++)
                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-6 text-gray-600">14.33 PM, 07 March 2026</td>
                            <td class="py-5 px-6 font-medium text-gray-800">Althaf Kharuni</td>
                            <td class="py-5 px-6 text-gray-600">Junior</td>
                            <td class="py-5 px-6">
                                <span class="bg-emerald-100 text-emerald-700 px-4 py-1.5 rounded-2xl text-sm font-medium">
                                    Berhasil
                                </span>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="flex justify-center mt-10">
                <button class="bg-purple-600 text-white px-8 py-3 rounded-2xl font-medium hover:bg-purple-700 transition">
                    Lihat Semua
                </button>
            </div>
        </div>
    </div>

</x-dashboard::admin-layout>
