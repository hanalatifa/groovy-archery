<x-layouts.admin-layout title="{{ __('dashboard.testimoni_request_title') }}">
    <div class="max-w-7xl mx-auto space-y-10">

        {{-- Header --}}
        <div class="mb-8 flex items-center gap-4 p-8 shadow-sm">
            <a href="{{ route('testi.index') }}"
                class="p-2 bg-gray-200 rounded-full shadow-sm hover:bg-gray-300 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h2 class="text-3xl font-semibold text-gray-800">{{ __('dashboard.testimoni_request_title') }}</h2>
                <p class="text-gray-500 mt-1">{{ __('dashboard.testimoni_request_subtitle') }}</p>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white p-8 shadow-sm border border-amber-50">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-xs uppercase tracking-wider border-b">
                        <th class="pb-4">{{ __('dashboard.testimoni_col_nama') }}</th>
                        <th class="pb-4">{{ __('dashboard.testimoni_col_rating') }}</th>
                        <th class="pb-4">{{ __('dashboard.testimoni_col_pesan') }}</th>
                        <th class="pb-4">{{ __('dashboard.testimoni_col_tanggal') }}</th>
                        <th class="pb-4 text-right">{{ __('dashboard.col_aksi') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($pendingTestis as $t)
                        <tr>
                            {{-- Nama --}}
                            <td class="py-5 font-bold text-gray-800 align-middle">
                                {{ $t->nama }}
                            </td>

                            {{-- Rating --}}
                            <td class="py-5 align-middle">
                                <span
                                    class="border bg-amber-50 text-amber-600 px-4 py-1.5 rounded-full text-[12px] font-semibold tracking-tight">
                                    ★ {{ $t->rating }}
                                </span>
                            </td>

                            {{-- Deskripsi --}}
                            <td class="py-5 align-middle">
                                <p class="text-gray-500 text-sm leading-relaxed max-w-xs line-clamp-2">
                                    {{ $t->deskripsi }}
                                </p>
                            </td>

                            {{-- Waktu --}}
                            <td class="py-5 align-middle">
                                <div class="text-sm text-gray-600 font-medium">{{ $t->created_at->format('d M Y') }}
                                </div>
                                <div class="text-[10px] text-gray-400 italic">{{ $t->created_at->format('H.i A') }}
                                </div>
                            </td>

                            {{-- Aksi --}}
                            <td class="py-5 text-right align-middle">
                                <div class="inline-flex items-center justify-end gap-2 vertical-align-middle">
                                    <form action="{{ route('testi.approve', $t->id) }}" method="POST" class="inline-flex items-center m-0 p-0">
                                        @csrf
                                        <button type="submit"
                                            class="px-5 py-2 border bg-green-100 text-green-500 rounded-none text-xs font-bold hover:bg-green-200 transition shadow-sm">
                                            {{ __('dashboard.testimoni_approve_btn') }}
                                        </button>
                                    </form>
                                    
                                    <button type="button" onclick="openRejectModal({{ $t->id }})"
                                        class="px-5 py-2 border bg-red-200 text-red-500 rounded-none text-xs font-bold hover:bg-red-300 transition shadow-sm inline-flex items-center">
                                        {{ __('dashboard.testimoni_reject_btn') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-20 text-gray-400 italic">
                                {{ __('dashboard.testimoni_queue_empty') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Centered Custom Reject Modal --}}
    <div id="rejectModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm items-center justify-center z-50 p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-sm w-full overflow-hidden border border-gray-100">
            <div class="p-8 text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center text-4xl mb-5">!</div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ __('dashboard.testimoni_reject_title') }}</h2>
                <p class="text-gray-500 mb-8">{{ __('dashboard.testimoni_reject_subtitle') }}</p>
                <div class="flex gap-3 w-full">
                    <button type="button" onclick="closeRejectModal()" class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl font-semibold transition">{{ __('dashboard.btn_batal') }}</button>
                    <form id="rejectForm" method="POST" class="flex-1 m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold transition">{{ __('dashboard.btn_konfirmasi_tolak') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openRejectModal(id) {
            const modal = document.getElementById('rejectModal');
            const form = document.getElementById('rejectForm');

            form.action = `/admin/testimoni/${id}`;
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeRejectModal() {
            const modal = document.getElementById('rejectModal');
            const form = document.getElementById('rejectForm');
            
            if (form) form.action = '';
            
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        document.getElementById('rejectModal')?.addEventListener('click', function(e) {
            if (e.target === this) closeRejectModal();
        });
    </script>
</x-layouts.admin-layout>