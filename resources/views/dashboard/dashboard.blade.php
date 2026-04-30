<x-layouts.admin-layout title="Dashboard">

    <div class="max-w-7xl mx-auto">
        <div class="mb-10">
            <h2 class="text-3xl font-semibold text-gray-800">
                Selamat Datang Kembali,  <span class="text-bold" style="color: #85488F;">{{ auth()->user()->name }}</span> !
            </h2>
            <p class="text-gray-500 mt-1">Berikut adalah ringkasan aktivitas Groovy Archery hari ini.</p>
        </div>

       <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 mt-6">
 
    {{-- Total Atlet --}}
    <div class="bg-white p-6 border border-gray-100"
         style="box-shadow: 0 1px 8px rgba(0,0,0,0.05);">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-7 h-7 rounded-md flex items-center justify-center flex-shrink-0"
                 style="background: rgba(39,68,148,0.08);">
                <svg class="w-4 h-4" style="color: #274494;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <span class="text-sm text-gray-500 font-medium">Total Atlet</span>
        </div>
        <p class="text-4xl font-bold" style="color: rgba(39,68,148,0.8);">
            {{ \App\Models\Atlet::count() }}
        </p>
    </div>
 
    {{-- Total Dokumentasi --}}
    <div class="bg-white p-6 border border-gray-100"
         style="box-shadow: 0 1px 8px rgba(0,0,0,0.05);">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-7 h-7 rounded-md flex items-center justify-center flex-shrink-0"
                 style="background: rgba(39,68,148,0.08);">
                <svg class="w-4 h-4" style="color: #274494;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <span class="text-sm text-gray-500 font-medium">Total Dokumentasi</span>
        </div>
        <p class="text-4xl font-bold" style="color: rgba(39,68,148,0.8);">
            {{ \App\Models\Documentation::count() }}
        </p>
    </div>
 
    {{-- Total Pertandingan --}}
    <div class="bg-white p-6 border border-gray-100"
         style="box-shadow: 0 1px 8px rgba(0,0,0,0.05);">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-7 h-7 rounded-md flex items-center justify-center flex-shrink-0"
                 style="background: rgba(133,72,143,0.08);">
                <svg class="w-4 h-4" style="color: #85488F;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
            </div>
            <span class="text-sm text-gray-500 font-medium">Total Pertandingan</span>
        </div>
        <p class="text-4xl font-bold" style="color: rgba(39,68,148,0.8);">
            {{ \App\Models\Pertandingan::count() ?? 0 }}
        </p>
    </div>
 
</div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white p-8 shadow-sm">
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

            <div class="bg-white p-8 shadow-sm">
                <h3 class="font-semibold text-lg mb-6 text-gray-800">Permintaan Tambah Atlet</h3>
                <div class="flex flex-col items-center justify-center py-10 text-gray-400">
                    <svg class="w-12 h-12 mb-3 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <p class="text-sm italic">Fitur verifikasi atlet segera hadir.</p>
                </div>
            </div>
        </div>
    </div>

</x-layouts.admin-layout>