<x-layouts.admin-layout title="Dashboard">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">
            {{ __('dashboard.welcome') }},
            <span style="color: #85488F;">{{ auth()->user()->name }}</span>
            {{ __('dashboard.welcome_suffix') }}
        </h2>
        <p class="text-gray-400 text-sm mt-1">{{ __('dashboard.subtitle') }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-7">
        <div class="bg-white border border-gray-100 p-6" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
            <div class="flex items-center gap-2.5 mb-5">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background: rgba(39,68,148,0.08);">
                    <svg class="w-4 h-4" style="color: #274494;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <span class="text-sm text-gray-500 font-semibold">{{ __('dashboard.total_atlet') }}</span>
            </div>
            <p class="text-5xl font-bold" style="color: #274494;">{{ \App\Models\Atlet::where('status', 'approved')->count() }}</p>
        </div>

        <div class="bg-white border border-gray-100 p-6" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
            <div class="flex items-center gap-2.5 mb-5">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background: rgba(39,68,148,0.08);">
                    <svg class="w-4 h-4" style="color: #274494;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="text-sm text-gray-500 font-semibold">{{ __('dashboard.total_dokumentasi') }}</span>
            </div>
            <p class="text-5xl font-bold" style="color: #274494;">{{ \App\Models\Documentation::count() }}</p>
        </div>

        <div class="bg-white border border-gray-100 p-6" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
            <div class="flex items-center gap-2.5 mb-5">
                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background: rgba(133,72,143,0.08);">
                    <svg class="w-4 h-4" style="color: #85488F;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <span class="text-sm text-gray-500 font-semibold">{{ __('dashboard.total_pertandingan') }}</span>
            </div>
            <p class="text-5xl font-bold" style="color: #274494;">{{ \App\Models\Pertandingan::count() ?? 0 }}</p>
        </div>
    </div>

    {{-- ══════════════════════════════════
         TABEL 2 KOLOM
         ══════════════════════════════════ --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-7">

        <div class="bg-white border border-gray-100 flex flex-col" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
            <div class="px-7 pt-7 pb-4">
                <h3 class="text-lg font-bold text-gray-900">{{ __('dashboard.testi_title') }}</h3>
            </div>
            <div class="px-7 pb-1 overflow-x-auto flex-1">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="pb-3 text-xs font-bold uppercase" style="color: #274494;">Waktu</th>
                            <th class="pb-3 text-xs font-bold uppercase" style="color: #274494;">Nama</th>
                            <th class="pb-3 text-xs font-bold uppercase text-right" style="color: #274494;">Aksi</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider"
                                style="color: #274494;">{{ __('dashboard.col_waktu') }}</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider"
                                style="color: #274494;">{{ __('dashboard.col_nama') }}</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider text-right"
                                style="color: #274494;">{{ __('dashboard.col_status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse(($pendingTestis ?? collect())->take(5) as $t)
                        <tr>
                            <td class="py-3.5 text-sm text-gray-500">{{ $t->created_at->format('H.i A') }}</td>
                            <td class="py-3.5 text-sm font-semibold text-gray-800">{{ $t->nama }}</td>
                            <td class="py-3.5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('testi.approve', $t->id) }}" method="POST">@csrf<button class="px-3 py-1.5 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold hover:bg-emerald-100">Terima</button></form>
                                    <form action="{{ route('testi.reject', $t->id) }}" method="POST">@csrf<button class="px-3 py-1.5 bg-red-50 text-red-500 rounded-full text-xs font-bold hover:bg-red-100">Tolak</button></form>
                                    <form action="{{ route('testi.approve', $t->id) }}" method="POST">
                                        @csrf
                                        <button title="{{ __('dashboard.btn_approve') }}"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full
                                                       text-xs font-semibold bg-emerald-50 text-emerald-600
                                                       hover:bg-emerald-100 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            {{ __('dashboard.btn_approve') }}
                                        </button>
                                    </form>
                                    <form action="{{ route('testi.reject', $t->id) }}" method="POST">
                                        @csrf
                                        <button title="{{ __('dashboard.btn_reject') }}"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full
                                                       text-xs font-semibold bg-red-50 text-red-500
                                                       hover:bg-red-100 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            {{ __('dashboard.btn_reject') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="py-10 text-center text-sm text-gray-400 italic">Antrean kosong.</td></tr>
                        <tr>
                            <td colspan="3" class="py-10 text-center text-sm text-gray-400 italic">
                                {{ __('dashboard.testi_empty') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-7 py-5"><a href="{{ route('testi.requests') }}" class="flex items-center justify-center w-full py-2.5 text-sm font-bold text-white rounded-lg" style="background: #85488F;">Lihat Semua</a></div>

            <div class="px-7 py-5 mt-auto">
                <a href="{{ route('testi.requests') }}"
                   class="flex items-center justify-center w-full py-2.5 text-sm font-semibold text-white transition-all duration-200"
                   style="background: #85488F;">
                    {{ __('dashboard.btn_view_all') }}
                </a>
            </div>
        </div>

        <div class="bg-white border border-gray-100 flex flex-col" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
            <div class="px-7 pt-7 pb-4">
                <h3 class="text-lg font-bold text-gray-900">{{ __('dashboard.atlet_req_title') }}</h3>
            </div>
            <div class="px-7 pb-1 overflow-x-auto flex-1">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="pb-3 text-xs font-bold uppercase" style="color: #274494;">Waktu</th>
                            <th class="pb-3 text-xs font-bold uppercase" style="color: #274494;">Nama</th>
                            <th class="pb-3 text-xs font-bold uppercase text-right" style="color: #274494;">Aksi</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider"
                                style="color: #274494;">{{ __('dashboard.col_waktu') }}</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider text-right"
                                style="color: #274494;">{{ __('dashboard.col_status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse(($pendingAtlets ?? collect())->take(5) as $req)
                        <tr>
                            <td class="py-3.5 text-sm text-gray-500">{{ $req->created_at->format('H.i A') }}</td>
                            <td class="py-3.5 text-sm font-semibold text-gray-800">{{ $req->nama }}</td>
                            <td class="py-3.5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <form action="{{ route('atlet.approve', $req->id) }}" method="POST">@csrf<button class="px-3 py-1.5 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold hover:bg-emerald-100">Terima</button></form>
                                    <form action="{{ route('atlet.reject', $req->id) }}" method="POST" onsubmit="return confirm('Tolak atlet ini?')">@csrf<button class="px-3 py-1.5 bg-red-50 text-red-500 rounded-full text-xs font-bold hover:bg-red-100">Tolak</button></form>
                                @php
                                    $statusMap = [
                                        'approved' => ['label' => __('dashboard.status_approved'), 'class' => 'bg-emerald-100 text-emerald-700'],
                                        'pending'  => ['label' => __('dashboard.status_pending'),  'class' => 'bg-amber-100 text-amber-700'],
                                        'rejected' => ['label' => __('dashboard.status_rejected'), 'class' => 'bg-red-100 text-red-600'],
                                    ];
                                    $s = $statusMap[$req->status] ?? ['label' => ucfirst($req->status), 'class' => 'bg-gray-100 text-gray-600'];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $s['class'] }}">
                                    {{ $s['label'] }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="py-10 text-center">
                                <div class="flex flex-col items-center gap-2 text-gray-300">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <p class="text-sm italic text-gray-400">{{ __('dashboard.atlet_req_coming') }}</p>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="py-10 text-center text-sm text-gray-400 italic">Antrean kosong.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-7 py-5"><a href="{{ route('atlet.requests') }}" class="flex items-center justify-center w-full py-2.5 text-sm font-bold text-white rounded-lg" style="background: #85488F;">Lihat Semua</a></div>

            <div class="px-7 py-5 mt-auto">
                <a href="{{ route('atlet.index') }}"
                   class="flex items-center justify-center w-full py-2.5 text-sm font-semibold text-white transition-all duration-200"
                   style="background: #85488F">
                    {{ __('dashboard.btn_view_all') }}
                </a>
            </div>
        </div>
    </div>

    {{-- ══════════════════════════════════
         AKTIVITAS TERKINI
         ══════════════════════════════════ --}}
    <div class="bg-white border border-gray-100 mb-8" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
        <div class="px-7 pt-7 pb-5 border-b border-gray-50">
            <h3 class="text-lg font-bold text-gray-900">{{ __('dashboard.activity_title') }}</h3>
        </div>
        <div class="px-7 py-2 overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-100 text-[#274494] text-xs font-bold uppercase">
                        <th class="pb-3 pt-4">Waktu</th>
                        <th class="pb-3 pt-4">Aktivitas</th>
                        <th class="pb-3 pt-4 text-right">Status</th>
                    <tr class="border-b border-gray-100">
                        <th class="pb-3 pt-4 text-xs font-bold uppercase tracking-wider"
                            style="color: #274494;">{{ __('dashboard.col_waktu') }}</th>
                        <th class="pb-3 pt-4 text-xs font-bold uppercase tracking-wider"
                            style="color: #274494;">{{ __('dashboard.col_aktivitas') }}</th>
                        <th class="pb-3 pt-4 text-xs font-bold uppercase tracking-wider text-right"
                            style="color: #274494;">{{ __('dashboard.col_status') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr>
                        <td class="py-4 text-sm text-gray-500"></td>
                        <td class="py-4 text-sm text-gray-700 font-medium"></td>
                        <td class="py-4 text-right">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold">

                            </span>
                        </td>
                    </tr>
                    {{-- @empty --}}
                    <tr><td colspan="3" class="py-10 text-center text-sm text-gray-400 italic">Belum ada aktivitas.</td></tr>
                    {{-- @endforelse --}}
                            @php
                                $st = $item['status'] ?? 'pending';
                                $stMap = [
                                    'success' => ['label' => __('dashboard.status_success'), 'class' => 'bg-emerald-100 text-emerald-700'],
                                    'pending' => ['label' => __('dashboard.status_pending'), 'class' => 'bg-amber-100 text-amber-700'],
                                    'failed'  => ['label' => __('dashboard.status_failed'),  'class' => 'bg-red-100 text-red-600'],
                                ];
                                $badge = $stMap[$st] ?? ['label' => ucfirst($st), 'class' => 'bg-gray-100 text-gray-600'];
                            @endphp
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold {{ $badge['class'] }}">
                                {{ $badge['label'] }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-10 text-center text-sm text-gray-400 italic">
                            {{ __('dashboard.activity_empty') }}
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin-layout>

</x-layouts.admin-layout>
