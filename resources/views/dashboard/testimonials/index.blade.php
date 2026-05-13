<x-layouts.admin-layout title="Kelola Testimoni">
    <div class="max-w-7xl mx-auto space-y-10">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-8 shadow-sm">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">Testimoni Aktif</h2>
                <p class="text-gray-500 mt-1">Daftar testimoni yang sedang tampil di Landing Page.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('testi.requests') }}" 
                   class="relative inline-flex items-center px-5 py-2.5 bg-gray-200 text-gray-700 text-sm font-bold hover:bg-gray-300 transition">
                    Permintaan Testimoni
                    @if($pendingCount > 0)
                        <span class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-[10px] text-white">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('testi.create')}}" 
                   class="px-6 py-3 bg-[#85488F] text-white text-medium hover:bg-[#7F4689] transition">
                    + Tambah Testimoni
                </a>
            </div>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="p-4 bg-emerald-50 text-emerald-700 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Table --}}
        <div class="bg-white shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Tanggal</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Nama & Peran</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Rating</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">Pesan</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($approvedTestis as $t)
                        <tr class="hover:bg-gray-50 transition">
                            {{-- Tanggal --}}
                            <td class="px-6 py-5">
                                <div class="text-sm text-gray-800 font-medium">{{ $t->created_at->format('d M Y') }}</div>
                                <div class="text-[11px] text-gray-400 italic">{{ $t->created_at->diffForHumans() }}</div>
                            </td>

                            {{-- Nama & Peran --}}
                            <td class="px-6 py-5">
                                <div class="font-bold text-gray-900">
                                    {{ $t->nama }}
                                </div>
                                <div class="text-[11px] text-gray-400 font-medium">
                                    {{ $t->peran ?? 'Umum' }}
                                </div>
                            </td>

                            {{-- Rating --}}
                            <td class="px-6 py-5">
                                <span class="border bg-amber-50 text-amber-600 px-3 py-1 rounded-full text-xs font-bold">
                                    ★ {{ $t->rating }}
                                </span>
                            </td>

                            {{-- Pesan --}}
                            <td class="px-6 py-5">
                                <p class="text-gray-500 text-sm leading-relaxed max-w-xs truncate">
                                    {{ $t->deskripsi }}
                                </p>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-5">
                                <div class="flex justify-end gap-2">
                                    <form action="{{ route('testi.pending', $t->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-yellow-400 text-white text-xs font-bold hover:bg-yellow-300 transition">
                                            Sembunyikan
                                        </button>
                                    </form>
                                    <button type="button" onclick="openDeleteModal({{ $t->id }})" 
                                            class="px-4 py-2 bg-red-500 text-white text-xs font-bold hover:bg-red-400 transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-24">
                                <p class="text-gray-400 italic text-sm font-medium">Belum ada testimoni yang disetujui.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm items-center justify-center z-50 p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-sm w-full overflow-hidden border border-gray-100">
            <div class="p-8 text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center text-4xl mb-5">!</div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Hapus Testimoni?</h2>
                <p class="text-gray-500 mb-8">Data testimoni ini akan dihapus secara permanen dari sistem.</p>
                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 rounded-2xl font-semibold transition">Batal</button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold transition">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('components.modal-testimoni')

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `/admin/testimoni/${id}/reject`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    </script>
</x-layouts.admin-layout>