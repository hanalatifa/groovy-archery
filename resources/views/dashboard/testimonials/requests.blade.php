<x-layouts.admin-layout title="Permintaan Testimoni">
    <div class="max-w-7xl mx-auto space-y-10">
        
        {{-- Header --}}
        <div class="mb-8 flex items-center gap-4 p-8 shadow-sm">
            <a href="{{ route('testi.index') }}" class="p-2 bg-gray-200 rounded-full shadow-sm hover:bg-gray-300 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">Permintaan Testimoni</h2>
                <p class="text-gray-500 mt-1">Tinjau testimoni dari pengguna sebelum ditampilkan di website.</p>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white p-8 shadow-sm border border-amber-50">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-xs uppercase tracking-wider border-b">
                        <th class="pb-4">Nama Pengirim</th>
                        <th class="pb-4">Rating</th>
                        <th class="pb-4">Pesan Testimoni</th>
                        <th class="pb-4">Tanggal Masuk</th>
                        <th class="pb-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($pendingTestis as $t)
                    <tr>
                        {{-- Nama --}}
                        <td class="py-5 font-bold text-gray-800">
                            {{ $t->nama }}
                        </td>

                        {{-- Rating --}}
                        <td class="py-5">
                            <span class="border bg-amber-50 text-amber-600 px-4 py-1.5 rounded-full text-[12px] font-semibold tracking-tight">
                                ★ {{ $t->rating }}
                            </span>
                        </td>

                        {{-- Deskripsi --}}
                        <td class="py-5">
                            <p class="text-gray-500 text-sm leading-relaxed max-w-xs line-clamp-2">
                                {{ $t->deskripsi }}
                            </p>
                        </td>

                        {{-- Waktu --}}
                        <td class="py-5">
                            <div class="text-sm text-gray-600 font-medium">{{ $t->created_at->format('d M Y') }}</div>
                            <div class="text-[10px] text-gray-400 italic">{{ $t->created_at->format('H.i A') }}</div>
                        </td>

                        {{-- Aksi --}}
                        <td class="py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('testi.approve', $t->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-5 py-2 border bg-green-100 text-green-500 rounded-none text-xs font-bold hover:bg-green-200 transition shadow-sm">
                                        Terima
                                    </button>
                                </form>
                                <form action="{{ route('testi.reject', $t->id) }}" method="POST" onsubmit="return confirm('Tolak testimoni ini?')">
                                    @csrf
                                    <button type="submit" class="px-5 py-2 border bg-red-200 text-red-500 rounded-none text-xs font-bold hover:bg-red-300 transition shadow-sm">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-20 text-gray-400 italic">Antrean bersih! Semua testimoni sudah diproses.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin-layout>