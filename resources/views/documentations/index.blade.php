<x-layouts.admin-layout title="{{ __('dashboard.documentation_title') }}">
    <div class="max-w-7xl mx-auto space-y-10">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-8 shadow-sm">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">{{ __('dashboard.documentation_title') }}</h2>
                <p class="text-gray-500 mt-1">{{ __('dashboard.documentation_subtitle') }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ url('/documentations/create') }}"
                   class="px-6 py-3 bg-[#85488F] text-white text-medium hover:bg-[#7F4689] transition">
                    {{ __('dashboard.documentation_add_btn') }}
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
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.documentation_date') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.documentation_photo_title') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.documentation_category') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">{{ __('dashboard.documentation_description') }}</th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-right">{{ __('dashboard.documentation_action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($docs as $doc)
                        <tr class="hover:bg-gray-50 transition">

                            {{-- Waktu --}}
                            <td class="px-6 py-5">
                                <div class="text-sm text-gray-800 font-medium">{{ $doc->created_at->format('d M Y') }}</div>
                                <div class="text-[11px] text-gray-400 italic">{{ $doc->created_at->diffForHumans() }}</div>
                            </td>
                            {{-- Foto & Judul --}}
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    @if ($doc->foto)
                                        <img src="{{ asset('storage/docs/' . $doc->foto) }}"
                                             class="w-14 h-14 object-cover rounded-2xl border border-gray-100 shadow-sm">
                                    @else
                                        <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-[10px] border border-dashed border-gray-300">
                                            No Pic
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $doc->judul }}</div>
                                    </div>
                                </div>
                            </td>

                            {{-- Kategori --}}
                            <td class="px-6 py-5">
                                <span class="bg-purple-50 text-[#85488F] px-4 py-1.5 rounded-full text-[12px] font-semibold tracking-tight border border-purple-100">
                                    {{ $doc->kategori }}
                                </span>
                            </td>

                            {{-- Deskripsi --}}
                            <td class="px-6 py-5">
                                <p class="text-gray-500 text-sm leading-relaxed max-w-xs line-clamp-2">
                                    {{ $doc->deskripsi }}
                                </p>
                            </td>


                            {{-- Aksi --}}
                            <td class="px-6 py-5">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('documentations.edit', $doc->id) }}"
                                           class="px-4 py-2 border text-xs font-bold transition
                                                  [html:not([data-theme='dark'])_&]:bg-yellow-100 [html:not([data-theme='dark'])_&]:text-yellow-500 [html:not([data-theme='dark'])_&]:hover:bg-yellow-200
                                                  [[data-theme='dark']_&]:bg-transparent [[data-theme='dark']_&]:border-white/10 [[data-theme='dark']_&]:text-yellow-500 [[data-theme='dark']_&]:hover:bg-white/5">
                                            {{ __('dashboard.btn_edit') }}
                                        </a>
                                        <button type="button"
                                                onclick="openDeleteModal({{ $doc->id }})"
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
                            <td colspan="5" class="text-center py-24">
                                <p class="text-gray-400 italic text-sm font-medium">{{ __('dashboard.documentation_empty') }}</p>
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
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ __('dashboard.documentation_delete_title') }}</h2>
                <p class="text-gray-500 mb-8">{{ __('dashboard.documentation_delete_msg') }}</p>
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
            form.action = `/documentations/${id}`;
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
