<x-layouts.admin-layout title="Tambah Atlet">

    <div class="p-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">Tambah Atlet</h1>
                <p class="text-gray-500 mt-1">Daftar aktivitas penambahan atlet terbaru</p>
            </div>

            <a href="{{ route('atlet.create') }}"
                class="bg-purple-700 hover:bg-purple-800 text-white px-6 py-3 rounded-2xl font-medium flex items-center gap-2 transition">
                <span class="text-xl">+</span> Tambah Atlet Baru
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
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($atlets as $atlet)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-5 px-6 text-gray-600">{{ $atlet->created_at->format('H.i A, d M Y') }}
                                </td>
                                <td class="py-5 px-6 font-medium text-gray-800">{{ $atlet->nama }}</td>
                                <td class="py-5 px-6 text-gray-600">{{ $atlet->kategori ?? 'Junior' }}</td>
                                <td class="py-5 px-6">
                                    <span
                                        class="inline-flex items-center px-5 py-1.5 bg-emerald-100 text-emerald-700 rounded-2xl text-xs font-medium">
                                        Berhasil
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-12 text-center text-gray-500">Belum ada data atlet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-12">
                <a href="#"
                    class="bg-purple-600 text-white px-8 py-3 rounded-2xl font-medium hover:bg-purple-700 transition inline-block">
                    Lihat Semua Aktivitas
                </a>
            </div>
        </div>
    </div>

</x-layouts.admin-layout>
