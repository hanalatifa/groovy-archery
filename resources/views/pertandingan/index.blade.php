<x-layouts.admin-layout title="{{ __('dashboard.pertandingan_title') }}">
    <div class="max-w-7xl mx-auto space-y-10">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-8 shadow-sm">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">
                    {{ __('dashboard.pertandingan_title') }}
                </h2>
                <p class="text-gray-500 mt-1">{{ __('dashboard.pertandingan_sub') }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('pertandingan.create') }}"
                   class="px-6 py-3 bg-[#85488F] text-white text-medium hover:bg-[#7F4689] transition">
                    {{ __('dashboard.pertandingan_tambah_btn') }}
                </a>
            </div>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="p-4 shadow-sm flex items-center gap-3 transition-colors duration-200
                [html:not([data-theme='dark'])_&]:bg-emerald-50 [html:not([data-theme='dark'])_&]:text-emerald-600 [html:not([data-theme='dark'])_&]:border [html:not([data-theme='dark'])_&]:border-emerald-100
                [[data-theme='dark']_&]:bg-emerald-950/20 [[data-theme='dark']_&]:text-emerald-400 [[data-theme='dark']_&]:border [[data-theme='dark']_&]:border-emerald-500/20">
        
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>

                <span class="font-medium text-sm">
                    {{ session('success') }}
                </span>
        
            </div>
        @endif

        {{-- Table --}}
        <div class="bg-white shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.col_waktu') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.col_foto') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.pertandingan_col_nama') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.pertandingan_deskripsi') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-right">{{ __('dashboard.col_aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($pertandingan as $item)
                        <tr class="hover:bg-gray-50 transition">
                            {{-- Waktu --}}
                            <td class="px-6 py-5">
                                <div class="text-sm text-gray-800 font-medium">{{ $item->created_at->format('d M Y') }}</div>
                                <div class="text-[11px] text-gray-400 italic">{{ $item->created_at->diffForHumans() }}</div>
                            </td>

                            {{-- Foto --}}
                            <td class="px-6 py-5">
                                @if($item->dokumentasi)
                                    @if(is_array($item->dokumentasi))
                                        <img src="{{ asset('storage/' . ($item->dokumentasi[0] ?? '')) }}"
                                             alt="Pertandingan"
                                             class="w-14 h-14 object-cover rounded-2xl border border-gray-100 shadow-sm">
                                    @else
                                        <img src="{{ asset('storage/pertandingan/' . $item->dokumentasi) }}"
                                             alt="Pertandingan"
                                             class="w-14 h-14 object-cover rounded-2xl border border-gray-100 shadow-sm">
                                    @endif
                                @else
                                    <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-[10px] border border-dashed border-gray-300">
                                        No Pic
                                    </div>
                                @endif
                            </td>

                            {{-- Nama Pertandingan --}}
                            <td class="px-6 py-5">
                                <div class="font-semibold text-gray-700 text-medium">
                                    {{ $item->nama_pertandingan ?? 'N/A' }}
                                </div>
                            </td>

                            {{-- Deskripsi Pertandingan --}}
                            <td class="px-6 py-5">
                                <div class="text-gray-500 text-sm leading-relaxed max-w-xs line-clamp-2">
                                    {{ $item->deskripsi_kegiatan ?? 'N/A' }}
                                </div>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-5">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('pertandingan.edit', $item->id) }}"
                                           class="px-4 py-2 border text-xs font-bold transition
                                                  [html:not([data-theme='dark'])_&]:bg-yellow-100 [html:not([data-theme='dark'])_&]:text-yellow-500 [html:not([data-theme='dark'])_&]:hover:bg-yellow-200
                                                  [[data-theme='dark']_&]:bg-transparent [[data-theme='dark']_&]:border-white/10 [[data-theme='dark']_&]:text-yellow-500 [[data-theme='dark']_&]:hover:bg-white/5">
                                            {{ __('dashboard.btn_edit') }}
                                        </a>
                                        <button type="button"
                                                onclick="openDeleteModal({{ $item->id }})"
                                                class="px-4 py-2 border text-xs font-bold transition
                                                       [html:not([data-theme='dark'])_&]:bg-red-200 [html:not([data-theme='dark'])_&]:text-red-500 [html:not([data-theme='dark'])_&]:hover:bg-red-300
                                                       [[data-theme='dark']_&]:bg-transparent [[data-theme='dark']_&]:border-white/10 [[data-theme='dark']_&]:text-red-500 [[data-theme='dark']_&]:hover:bg-white/5">
                                            {{ __('dashboard.btn_hapus') }}
                                        </button>
                                    </div>
                                </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-24"> {{-- Colspan diubah ke 5 sesuai jumlah kolom head --}}
                                <p class="text-gray-400 italic text-sm font-medium">
                                    {{ __('dashboard.pertandingan_empty') }}
                                </p>
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
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ __('dashboard.pertandingan_delete_title') }}</h2>
                <p class="text-gray-500 mb-8">{{ __('dashboard.pertandingan_delete_message') }}</p>
                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 rounded-2xl font-semibold transition">{{ __('dashboard.documentation_cancel') }}</button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold transition">{{ __('dashboard.documentation_confirm') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');

            form.action = `/hapus/pertandingan/${id}`;

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

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    </script>
</x-layouts.admin-layout>