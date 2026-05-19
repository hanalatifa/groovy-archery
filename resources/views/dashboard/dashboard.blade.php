<style>
    :root {
        --header-bg: #F4F5F9;
        --header-border: rgba(0, 0, 0, 0.07);
        --header-input-bg: #ffffff;
        --header-input-border: #e5e7eb;
        --header-input-text: #374151;
        --header-input-placeholder: #d1d5db;
        --header-toggle-bg: #ffffff;
        --header-toggle-border: #e5e7eb;
        --header-toggle-text: #6b7280;
        --header-lang-bg: #ffffff;
        --header-lang-border: #e5e7eb;
        --header-lang-text: #9ca3af;
    }

    [data-theme="dark"] {
        --header-bg: #0a0f1e;
        --header-input-bg: #1e293b;
        --header-input-border: #334155;
        --header-input-text: #e2e8f0;
        --header-input-placeholder: #64748b;
        --header-toggle-bg: #1e293b;
        --header-toggle-border: #334155;
        --header-toggle-text: #facc15;
        --header-lang-bg: #1e293b;
        --header-lang-border: #334155;
        --header-lang-text: #94a3b8;
    }

    #admin-header {
        background: var(--header-bg);
        border-bottom: 1px solid var(--header-border);
        transition: background 0.3s ease, border-color 0.3s ease;
    }

    #admin-header input {
        background: var(--header-input-bg);
        border-color: var(--header-input-border);
        color: var(--header-input-text);
        transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease;
    }

    #admin-header input::placeholder {
        color: var(--header-input-placeholder);
    }

    #admin-header input:focus {
        border-color: #85488F;
        outline: none;
        box-shadow: none;
    }

    .admin-lang-wrap {
        background: var(--header-lang-bg);
        border-color: var(--header-lang-border);
        transition: background 0.3s ease, border-color 0.3s ease;
    }

    .admin-lang-link {
        color: var(--header-lang-text);
        transition: color 0.2s;
    }

    .admin-lang-link:hover { color: #374151; }

    [data-theme="dark"] .admin-lang-link:hover { color: #e2e8f0; }

    #admin-theme-toggle {
        background: var(--header-toggle-bg);
        border-color: var(--header-toggle-border);
        color: var(--header-toggle-text);
        transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease;
    }

    #admin-theme-toggle:hover {
        background: var(--header-lang-bg);
        filter: brightness(0.95);
    }

    #admin-theme-toggle .icon-sun  { display: none; }
    #admin-theme-toggle .icon-moon { display: block; }
    [data-theme="dark"] #admin-theme-toggle .icon-sun  { display: block; }
    [data-theme="dark"] #admin-theme-toggle .icon-moon { display: none; }
</style>

<x-layouts.admin-layout title="Dashboard">
    <div class="mb-8 px-8 pt-5 flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">
                {{ __('dashboard.welcome') }},
                <span style="color: #85488F;">{{ auth()->user()->name }}</span>
                {{ __('dashboard.welcome_suffix') }}
            </h2>
            <p class="text-gray-400 text-sm mt-1">{{ __('dashboard.subtitle') }}</p>
        </div>

        <div class="flex items-center gap-4">

            <div class="admin-lang-wrap flex items-center p-1 border rounded-2xl shadow-[0_4px_14px_rgba(0,0,0,0.05)]">
                @foreach (['id', 'en'] as $lang)
                    @php $isActive = app()->getLocale() === $lang; @endphp
                    <a href="{{ route('lang.switch', $lang) }}"
                       class="px-4 py-2 rounded-xl text-[11px] font-bold tracking-[2px] uppercase transition-all duration-200
                              {{ $isActive ? 'bg-[#85488F] text-white shadow-sm' : 'admin-lang-link' }}">
                        {{ strtoupper($lang) }}
                    </a>
                @endforeach
            </div>

            <button id="admin-theme-toggle"
                    class="w-[44px] h-[44px] flex items-center justify-center border rounded-2xl shadow-[0_4px_14px_rgba(0,0,0,0.05)]">
                <svg class="icon-sun w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                </svg>
                <svg class="icon-moon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>

        </div>
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
            <p class="text-5xl font-bold" style="color: #274494;">
                {{ \App\Models\Atlet::where('status', 'approved')->count() }}
            </p>
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
            <p class="text-5xl font-bold" style="color: #274494;">
                {{ \App\Models\Documentation::count() }}
            </p>
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
            <p class="text-5xl font-bold" style="color: #274494;">
                {{ \App\Models\Pertandingan::count() ?? 0 }}
            </p>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-7">

        {{-- Testimoni --}}
        <div class="bg-white border border-gray-100 flex flex-col" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
            <div class="px-7 pt-7 pb-4">
                <h3 class="text-lg font-bold text-gray-900">{{ __('dashboard.testi_title') }}</h3>
            </div>
            <div class="px-7 pb-1 overflow-x-auto flex-1">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider" style="color: #274494;">{{ __('dashboard.col_waktu') }}</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider" style="color: #274494;">{{ __('dashboard.col_nama') }}</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider text-right" style="color: #274494;">{{ __('dashboard.col_status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse(($pendingTestis ?? collect())->take(3) as $t)
                            <tr>
                                <td class="py-3.5 text-sm text-gray-500 whitespace-nowrap pr-4 align-middle">{{ $t->created_at->format('H.i A, d M Y') }}</td>
                                <td class="py-3.5 text-sm font-semibold text-gray-800 pr-4 align-middle">{{ $t->nama }}</td>
                                <td class="py-3.5 text-right align-middle">
                                    <div class="inline-flex items-center justify-end gap-2 vertical-align-middle">
                                        <form action="{{ route('testi.approve', $t->id) }}" method="POST" class="inline-flex items-center m-0 p-0">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition-colors">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                {{ __('dashboard.btn_approve') }}
                                            </button>
                                        </form>
                                        <button type="button" onclick="openRejectModal({{ $t->id }}, 'testi')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-red-50 text-red-500 hover:bg-red-100 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                            {{ __('dashboard.btn_reject') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-10 text-center">
                                <div class="flex flex-col items-center gap-2 text-gray-300">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <p class="text-sm italic text-gray-400">{{ __('dashboard.testi_empty') }}</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-7 py-5 mt-auto">
                <a href="{{ route('testi.requests') }}" class="flex items-center justify-center w-full py-2.5 text-sm font-semibold text-white transition-all duration-200" style="background: #85488F;">
                    {{ __('dashboard.btn_view_all') }}
                </a>
            </div>
        </div>

        {{-- Atlet Request --}}
        <div class="bg-white border border-gray-100 flex flex-col" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
            <div class="px-7 pt-7 pb-4">
                <h3 class="text-lg font-bold text-gray-900">{{ __('dashboard.atlet_req_title') }}</h3>
            </div>
            <div class="px-7 pb-1 overflow-x-auto flex-1">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider" style="color: #274494;">{{ __('dashboard.col_waktu') }}</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider" style="color: #274494;">{{ __('dashboard.col_nama') }}</th>
                            <th class="pb-3 text-xs font-bold uppercase tracking-wider text-right" style="color: #274494;">{{ __('dashboard.col_status') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse(($pendingAtlets ?? collect())->take(3) as $req)
                            <tr>
                                <td class="py-3.5 text-sm text-gray-500 whitespace-nowrap pr-4 align-middle">{{ $req->created_at->format('H.i A, d M Y') }}</td>
                                <td class="py-3.5 text-sm font-semibold text-gray-800 pr-4 align-middle">{{ $req->nama }}</td>
                                {{-- FIX: Menambahkan align-middle dan memastikan bungkus tombol berstruktur flex lurus --}}
                                <td class="py-3.5 text-right align-middle">
                                    <div class="inline-flex items-center justify-end gap-2 vertical-align-middle">
                                        <form action="{{ route('atlet.approve', $req->id) }}" method="POST" class="inline-flex items-center m-0 p-0">
                                            @csrf
                                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 hover:bg-emerald-100 transition-colors">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                {{ __('dashboard.btn_approve') }}
                                            </button>
                                        </form>
                                        <button type="button" onclick="openRejectModal({{ $req->id }}, 'atlet')" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-red-50 text-red-500 hover:bg-red-100 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                            {{ __('dashboard.btn_reject') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-10 text-center">
                                    <div class="flex flex-col items-center gap-2 text-gray-300">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <p class="text-sm italic text-gray-400">{{ __('dashboard.atlet_empty') }}</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-7 py-5 mt-auto">
                <a href="{{ route('atlet.requests') }}" class="flex items-center justify-center w-full py-2.5 text-sm font-semibold text-white transition-all duration-200" style="background: #85488F;">
                    {{ __('dashboard.btn_view_all') }}
                </a>
            </div>
        </div>

    </div>

    {{-- Aktivitas Terkini --}}
    <div class="bg-white border border-gray-100 mb-8" style="box-shadow: 0 1px 10px rgba(0,0,0,0.05);">
        <div class="px-7 pt-7 pb-5 border-b border-gray-50">
            <h3 class="text-lg font-bold text-gray-900">{{ __('dashboard.activity_title') }}</h3>
        </div>
        <div class="px-7 py-2 overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="pb-3 pt-4 text-xs font-bold uppercase tracking-wider" style="color: #274494;">{{ __('dashboard.col_waktu') }}</th>
                        <th class="pb-3 pt-4 text-xs font-bold uppercase tracking-wider" style="color: #274494;">{{ __('dashboard.col_aktivitas') }}</th>
                        <th class="pb-3 pt-4 text-xs font-bold uppercase tracking-wider text-right" style="color: #274494;">{{ __('dashboard.col_status') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse(($aktivitas ?? collect()) as $item)
                        <tr>
                            <td class="py-4 text-sm text-gray-500 whitespace-nowrap pr-6">
                                {{ $item->created_at->format('H.i A, d M Y') }}
                            </td>

                            <td class="py-4 text-sm font-semibold text-gray-800 pr-6">
                                @php
                                    $parts    = explode('|', $item->description, 2);
                                    $key      = $parts[0] ?? '';
                                    $name     = $parts[1] ?? '';
                                    $transKey = 'dashboard.' . $key;
                                @endphp
                                {{ __($transKey) !== $transKey
                                    ? __($transKey, ['name' => $name])
                                    : $item->description }}
                            </td>

                            <td class="py-4 text-right">
                                @php
                                    $colorMap = [
                                        'success' => 'bg-emerald-50 text-emerald-600',
                                        'pending' => 'bg-amber-50 text-amber-600',
                                        'failed'  => 'bg-red-50 text-red-500',
                                        'deleted' => 'bg-gray-100 text-gray-600',
                                    ];
                                    $badgeStyle = $colorMap[$item->status] ?? 'bg-gray-50 text-gray-600';
                                @endphp
                                <span class="inline-flex px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-tight {{ $badgeStyle }}">
                                    {{ __('dashboard.status_' . $item->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-10 text-center">
                                <div class="flex flex-col items-center gap-2 text-gray-300">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm italic text-gray-400">{{ __('dashboard.activity_empty') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="h-6"></div>
    </div>


    <div id="rejectModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm items-center justify-center z-50 p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-sm w-full overflow-hidden border border-gray-100">
        <div class="p-8 text-center">
            <div class="w-20 h-20 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center text-4xl mb-5">!</div>
            
            <h2 id="modalTitle" class="text-2xl font-bold text-gray-800 mb-2"></h2>
            <p id="modalSubtitle" class="text-gray-500 mb-8"></p>

            <div class="flex gap-3 w-full">
                <button type="button" onclick="closeRejectModal()" 
                        class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl font-semibold transition">
                    {{ __('dashboard.btn_batal') }}
                </button>

                <form id="rejectForm" method="POST" class="flex-1 m-0 p-0">
                    @csrf
                    <button type="submit" 
                            class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold transition">
                        {{ __('dashboard.btn_konfirmasi_tolak') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-layouts.admin-layout>

<script>
    (function () {
        function applyTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('ga-theme', theme);
        }
        function toggleTheme() {
            const cur = document.documentElement.getAttribute('data-theme');
            applyTheme(cur === 'dark' ? 'light' : 'dark');
        }
        document.getElementById('admin-theme-toggle')?.addEventListener('click', toggleTheme);
    })();

    // JS Engine Modal Reject Dinamis
    function openRejectModal(id, type) {
        const modal = document.getElementById('rejectModal');
        const form  = document.getElementById('rejectForm');
        const title = document.getElementById('modalTitle');
        const sub   = document.getElementById('modalSubtitle');

        if (type === 'atlet') {
            form.action    = `/atlet/reject/${id}`;
            title.textContent = "{{ __('dashboard.atlet_reject_title') }}";
            sub.textContent   = "{{ __('dashboard.atlet_reject_subtitle') }}";
        } else if (type === 'testi') {
            form.action    = `/testi/reject/${id}`;
            title.textContent = "{{ __('dashboard.testimoni_reject_title') }}";
            sub.textContent   = "{{ __('dashboard.testimoni_reject_subtitle') }}";
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeRejectModal() {
        const modal = document.getElementById('rejectModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }

    document.getElementById('rejectModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeRejectModal();
    });
</script>