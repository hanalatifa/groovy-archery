<x-dashboard::admin-layout title="Dashboard">

    <div class="max-w-7xl mx-auto">
        <div class="mb-10">
            <h2 class="text-3xl font-semibold text-gray-800">
                Selamat Datang Kembali,  <span class="text-purple-600">{{ auth()->user()->name }}</span> !
            </h2>
            <p class="text-gray-500 mt-1">Berikut adalah ringkasan aktivitas Groovy Archery hari ini.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-gray-500 text-sm">Total Atlet</p>
                <p class="text-4xl font-bold text-gray-800 mt-3">{{ \App\Models\Atlet::count() }}</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-gray-500 text-sm">Dokumentasi</p>
                <p class="text-4xl font-bold text-gray-800 mt-3">{{ \App\Models\Documentation::count() }}</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-gray-500 text-sm">Pertandingan</p>
                <p class="text-4xl font-bold text-gray-800 mt-3">0</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-semibold text-lg text-gray-800">Permintaan Testimoni</h3>
                    <a href="{{ route('testi.requests') }}" class="text-xs text-[#2b459a] font-bold hover:underline">Lihat Semua</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <tbody class="divide-y divide-gray-50">
                            @forelse(($pendingTestis ?? collect())->take(5) as $t) {{-- Kita batasi 5 saja agar tidak kepanjangan --}}
                            <tr>
                                <td class="py-4">
                                    <p class="font-bold text-sm text-gray-800">{{ $t->nama }}</p>
                                    <p class="text-[10px] text-gray-400">{{ $t->created_at->format('H.i A, d M') }}</p>
                                </td>
                                <td class="py-4 text-amber-500 text-xs">★ {{ $t->rating }}</td>
                                <td class="py-4">
                                    <div class="flex gap-2 justify-end">
                                        <form action="{{ route('testi.approve', $t->id) }}" method="POST">
                                            @csrf
                                            <button class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-100">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('testi.reject', $t->id) }}" method="POST">
                                            @csrf
                                            <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-400">Tidak ada data.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <h3 class="font-semibold text-lg mb-6 text-gray-800">Permintaan Tambah Atlet</h3>
                <div class="flex flex-col items-center justify-center py-10 text-gray-400">
                    <svg class="w-12 h-12 mb-3 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <p class="text-sm italic">Fitur verifikasi atlet segera hadir.</p>
                </div>
            </div>
        </div>
    </div>

</x-dashboard::admin-layout>