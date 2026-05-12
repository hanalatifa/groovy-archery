<x-layouts.admin-layout title="Kelola Data Atlet">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-3xl shadow-sm border border-gray-50">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Atlet Aktif</h2>
                <p class="text-gray-500 mt-1">Daftar atlet yang sudah disetujui dan tampil di website.</p>
            </div>
            <div class="flex gap-3">
                <button type="button"
                        onclick="closeDeleteModal()"
                        class="flex-1 bg-gray-200 py-3 rounded-xl">
                    Batal
                </button>

                <button type="submit"
                        class="flex-1 bg-red-500 text-white py-3 rounded-xl">
                    Hapus
                </button>
            </div>
        </form>
    <div class="max-w-7xl mx-auto p-6 space-y-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Kelola Data Atlet
                </h1>
                <p class="text-gray-500 mt-1">
                    Daftar atlet yang sudah terdaftar di website.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('atlet.requests') }}"
                   class="relative inline-flex items-center px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl font-semibold transition">

                    Permintaan Atlet

                    @if($pendingCount > 0)
                        <span class="absolute -top-2 -right-2 flex items-center justify-center w-6 h-6 rounded-full bg-red-500 text-white text-[10px]">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('atlet.create') }}"
                   class="px-6 py-3 bg-[#85488F] hover:bg-purple-700 text-white text-medium transition">
                    + Tambah Atlet
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 bg-emerald-50 text-emerald-700 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                No
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Foto
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Nama Atlet
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Kategori
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Umur
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($atlets as $index => $atlet)

                            <tr class="hover:bg-gray-50 transition">

                                {{-- No --}}
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $index + 1 }}
                                </td>

                                {{-- Foto --}}
                                <td class="px-6 py-4">

                                    @if($atlet->foto)
                                        <img
                                            src="{{ asset('storage/atlet/' . $atlet->foto) }}"
                                            alt="{{ $atlet->nama }}"
                                            class="w-14 h-14 object-cover rounded-2xl"
                                        >
                                    @else
                                        <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-xs">
                                            No Pic
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $atlet->nama }}</div>
                                        <div class="text-[11px] text-gray-400 italic">Terdaftar {{ $atlet->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </td>
                            
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
</div>

    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-sm w-full overflow-hidden border border-gray-100">
            <div class="p-8 text-center">

                <div class="w-20 h-20 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center text-4xl mb-5">
                    !
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Hapus Atlet?
                </h2>

                <p class="text-gray-500 mb-8">
                    Data atlet akan dihapus secara permanen.
                </p>

                <div class="flex gap-3">

                    <button
                        type="button"
                        onclick="closeDeleteModal()"
                        class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 rounded-2xl font-semibold transition">

                        Batal
                    </button>

                    <form id="deleteForm" method="POST" class="flex-1">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold transition">

                            Ya, Hapus
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    {{-- Script --}}
    <script>

        function openDeleteModal(id) {

            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');

            form.action = `/hapus/atlet/${id}`;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            modal.classList.add('hidden');

            document.body.style.overflow = '';
        }
    </script>

</x-layouts.admin-layout>
