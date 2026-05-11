<x-layouts.admin-layout title="Permintaan Atlet Baru">
    <div class="max-w-7xl mx-auto space-y-10">
        
        <!-- Header Section -->
        <div class="mb-8 flex items-center gap-4 bg-white p-8 rounded-3xl shadow-sm">
            <a href="{{ route('atlet.kelola') }}" class="p-2 bg-gray-100 rounded-full shadow-sm hover:bg-gray-200 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">Permintaan Pending</h2>
                <p class="text-gray-500 mt-1">Tinjau detail profil atlet sebelum memberikan persetujuan.</p>
            </div>
        </div>

        <!-- Tabel Requests -->
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-amber-50">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-xs uppercase tracking-wider border-b">
                        <th class="pb-4">Profil Atlet</th>
                        <th class="pb-4">Kategori</th>
                        <th class="pb-4">Umur</th>
                        <th class="pb-4">Deskripsi</th>
                        <th class="pb-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($pendingAtlets as $atlet)
                    <tr>
                        <!-- Foto & Nama -->
                        <td class="py-5">
                            <div class="flex items-center gap-4">
                                @if($atlet->foto)
                                    <img src="{{ asset('storage/atlet/' . $atlet->foto) }}" 
                                         class="w-16 h-16 object-cover rounded-2xl shadow-sm border border-gray-100">
                                @else
                                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-[10px] border border-dashed border-gray-300">
                                        No Photo
                                    </div>
                                @endif
                                <div>
                                    <div class="font-bold text-gray-800">{{ $atlet->nama }}</div>
                                    <div class="text-[10px] text-gray-400 italic">Request: {{ $atlet->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- Kategori -->
                        <td class="py-5">
                            <div class="space-y-1">
                                <span class="block w-fit bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $atlet->kategori }}
                                </span>
                            </div>
                        </td>
                        
                         <!-- Umur -->
                        <td class="py-5">
                            <div class="space-y-1">
                                <span class="text-sm text-gray-600 font-medium">{{ $atlet->umur }} Tahun</span>
                            </div>
                        </td>

                        <!-- Deskripsi (Limit karakter biar gak kepanjangan) -->
                        <td class="py-5">
                            <p class="text-gray-500 text-sm leading-relaxed max-w-xs line-clamp-2">
                                {{ $atlet->deskripsi ?? 'Tidak ada deskripsi.' }}
                            </p>
                        </td>

                        <!-- Aksi -->
                        <td class="py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('atlet.approve', $atlet->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-5 py-2 bg-green-600 text-white rounded-xl text-xs font-bold hover:bg-green-700 transition shadow-sm">
                                        Terima
                                    </button>
                                </form>
                                <form action="{{ route('atlet.reject', $atlet->id) }}" method="POST" onsubmit="return confirm('Tolak permintaan ini?')">
                                    @csrf
                                    <button type="submit" class="px-5 py-2 bg-white border border-red-200 text-red-600 rounded-xl text-xs font-bold hover:bg-red-50 transition">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-20 text-gray-400 italic">Antrean bersih! Semua permintaan sudah diproses.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin-layout>