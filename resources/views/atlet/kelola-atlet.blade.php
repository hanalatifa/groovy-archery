<x-layouts.admin-layout title="Kelola Data Atlet">
    <div class="max-w-7xl mx-auto space-y-10">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-3xl shadow-sm border border-gray-50">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Atlet Aktif</h2>
                <p class="text-gray-500 mt-1">Daftar atlet yang sudah disetujui dan tampil di website.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('atlet.requests') }}" class="relative inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-2xl text-sm font-bold hover:bg-gray-200 transition">
                    Permintaan Atlet
                    @if($pendingCount > 0)
                        <span class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-[10px] text-white ring-4 ring-white shadow-lg">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('atlet.create') }}" class="px-6 py-3 bg-[#2b459a] text-white rounded-2xl text-sm font-bold hover:bg-[#1e3278] transition shadow-lg shadow-blue-900/20">
                    + Tambah Atlet Baru
                </a>
            </div>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="p-4 bg-emerald-50 text-emerald-700 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-wider border-b border-gray-100">
                            <th class="pb-5 font-bold">Foto & Nama</th>
                            <th class="pb-5 font-bold">Kategori</th>
                            <th class="pb-5 font-bold">Umur</th>
                            <th class="pb-5 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($atlets as $atlet)
                        <tr class="group hover:bg-gray-50/50 transition">
                            <td class="py-5">
                                <div class="flex items-center gap-4">
                                    @if($atlet->foto)
                                        <img src="{{ asset('storage/atlet/' . $atlet->foto) }}" 
                                             class="w-14 h-14 object-cover rounded-2xl shadow-sm border-2 border-white ring-1 ring-gray-100">
                                    @else
                                        <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-[10px] border border-dashed border-gray-300 uppercase">
                                            No Pic
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $atlet->nama }}</div>
                                        <div class="text-[11px] text-gray-400 italic">Terdaftar {{ $atlet->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            {{-- Kolom Kategori (Fixed Warna & Alignment) --}}
                            <td class="py-5">
                                @if($atlet->kategori == 'Junior')
                                    <span class="bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-tight">
                                        {{ $atlet->kategori }}
                                    </span>
                                @else
                                    <span class="bg-purple-50 text-purple-600 px-4 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-tight">
                                        {{ $atlet->kategori }}
                                    </span>
                                @endif
                            </td>

                            {{-- Kolom Umur (Fixed Alignment) --}}
                            <td class="py-5">
                                <span class="text-gray-600 text-[13px] font-semibold">
                                    {{ $atlet->umur }} Tahun
                                </span>
                            </td>

                            <td class="py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('atlet.edit', $atlet->id) }}" 
                                       class="px-4 py-2 border border-gray-200 text-gray-600 rounded-xl text-xs font-bold hover:bg-white hover:shadow-sm transition">
                                        Edit
                                    </a>
                                    <button type="button" 
                                            onclick="openDeleteModal({{ $atlet->id }})"
                                            class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-500 hover:text-white transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-24">
                                <p class="text-gray-400 italic text-sm font-medium">Belum ada data atlet yang terdaftar.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Delete tetap sama --}}
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-sm w-full overflow-hidden border border-gray-100">
            <div class="p-8 text-center">
                <div class="mx-auto w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center text-4xl mb-6 ring-8 ring-red-50/50">!</div>
                <h3 class="text-2xl font-black text-gray-900 mb-2">Hapus Atlet?</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-8 px-4">Data ini akan dihapus secara permanen dan tidak dapat dipulihkan kembali.</p>
                <div class="flex gap-3">
                    <button onclick="closeDeleteModal()" class="flex-1 py-4 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-2xl transition">Batal</button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-2xl transition shadow-lg shadow-red-200">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = "{{ url('/hapus/atlet') }}/" + id; 
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }
    </script>
</x-layouts.admin-layout>