<x-layouts.admin-layout title="Kelola Testimoni">
    <div class="max-w-7xl mx-auto space-y-10">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-3xl shadow-sm">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">Testimoni Aktif</h2>
                <p class="text-gray-500 mt-1">Daftar testimoni yang sedang tampil di Landing Page.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('testi.requests') }}" class="relative inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl text-sm font-bold hover:bg-gray-200 transition">
                    Permintaan Testimoni
                    @if($pendingCount > 0)
                        <span class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-[10px] text-white ring-4 ring-white">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>
                <button type="button" onclick="document.getElementById('testiModal').classList.remove('hidden')" class="px-5 py-2.5 bg-[#2b459a] text-white rounded-xl text-sm font-bold hover:bg-[#1e3278] transition shadow-lg shadow-blue-900/20">
                    + Tambah Testimoni
                </button>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-sm border border-purple-50">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-xs uppercase tracking-wider border-b">
                        <th class="pb-4">Tanggal</th>
                        <th class="pb-4">Nama</th>
                        <th class="pb-4">Rating</th>
                        <th class="pb-4">Pesan</th>
                        <th class="pb-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($approvedTestis as $t)
                    <tr>
                        <td class="py-5 text-gray-400 text-xs font-medium">
                            {{-- Format: Jam.Menit AM/PM, Tanggal Bulan(Nama) Tahun --}}
                            {{ $t->created_at->format('H.i A, d F Y') }}
                            <br>
                            <span class="text-[10px] text-gray-300 italic">{{ $t->created_at->diffForHumans() }}</span>
                        </td>
                        <td class="py-5 font-medium text-gray-800">{{ $t->nama }}</td>
                        <td class="py-5 text-amber-500">★ {{ $t->rating }}</td>
                        <td class="py-5 text-gray-500 text-sm leading-relaxed">{{ $t->deskripsi }}</td>
                        <td class="py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('testi.pending', $t->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-lg text-xs font-medium hover:bg-gray-50">Sembunyikan</button>
                                </form>
                                <form action="{{ route('testi.reject', $t->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-500 rounded-lg text-s font-medium hover:bg-red-100 text-s">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-10 text-gray-400 italic">Belum ada testimoni yang disetujui.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('components.modal-testimoni')
</x-layouts.admin-layout>
