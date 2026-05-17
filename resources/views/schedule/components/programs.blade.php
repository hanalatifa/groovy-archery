{{-- ═══ PROGRAM ═══ --}}
<section class="py-20 sm:py-28 px-5 sm:px-6 dark:bg-slate-900 transition-colors duration-300" id="schedule">
    <div class="max-w-6xl mx-auto">

        {{-- Header --}}
        <div class="text-center mb-12 sm:mb-16">
            <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-3">
                {{ __('schedule.program_title') }}</p>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-gray-900 dark:text-white leading-tight mb-4">
                {{ __('schedule.program_description') }}
            </h2>
            <div class="flex items-center justify-center gap-2 mb-4">
                <div class="h-1 w-8 rounded-full bg-[#2b459a]"></div>
            </div>
            <p class="text-gray-400 dark:text-slate-500 text-sm max-w-sm mx-auto leading-relaxed">
                {{ __('schedule.program_description') }}
            </p>
        </div>
        <div class="overflow-hidden shadow-2xl rounded-2xl"
            style="background: linear-gradient(135deg, #1a1060 0%, #2b1d8a 45%, #4f3fd4 100%);">

            {{-- Baris atas --}}
            <div class="grid grid-cols-1 lg:grid-cols-3">

                {{-- Kiri: dua program card --}}
                <div class="lg:col-span-2 p-6 sm:p-8 md:p-10">

                    {{-- Label --}}
                    <div class="inline-flex items-center px-5 py-2.5 mb-6 sm:mb-8 bg-white/95 dark:bg-slate-800/95">
                        <span
                            class="text-gray-900 dark:text-slate-100 font-black text-sm">{{ __('schedule.program_label') }}</span>
                    </div>

                    {{-- Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">

                        {{-- Regular --}}
                        <div class="program-card group p-5 sm:p-7 border-2 border-white/20
                        cursor-pointer transition-all duration-300 hover:-translate-y-1"
                            style="background: rgba(255,255,255,0.95);" onclick="selectProgram(this, 'Regular')">
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                                <span class="text-[10px] font-black uppercase tracking-[3px] !text-[#3d2db5]">
                                    {{ __('schedule.regular_program') }}
                                </span>
                                <span class="text-[10px] font-black px-2.5 py-1 rounded-full !text-[#3d2db5]"
                                    style="background: rgba(61,45,181,0.1);">
                                    {{ __('schedule.regular_schedule') }}
                                </span>
                            </div>
                            <p class="text-gray-500 text-sm mb-3 font-medium !text-gray-500">{{ __('schedule.regular_subtitle') }}</p>
                            <p class="text-2xl font-black !text-[#1a1060]">Rp 300.000</p>
                            <p class="text-gray-400 text-xs mt-1.5 font-medium !text-gray-400">{{ __('schedule.per_month') }}</p>
                            <div
                                class="program-check mt-4 w-6 h-6 rounded-full border-2 border-gray-200
                                flex items-center justify-center transition-all duration-200">
                                <svg class="w-3.5 h-3.5 text-white hidden" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        {{-- Intensif --}}
                        <div class="program-card group p-5 sm:p-7 border-2 border-yellow-400
                    cursor-pointer transition-all duration-300 hover:-translate-y-1 relative"
                            style="background: rgba(255,255,255,0.95);" onclick="selectProgram(this, 'Intensif')">
                            <div
                                class="absolute -top-3 left-4 bg-yellow-400 text-gray-900 text-[9px]
                        font-black uppercase tracking-widest px-3 py-1 rounded-sm !text-gray-900">
                                {{ __('schedule.most_popular') }}
                            </div>
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-4 mt-2">
                                <span class="text-[10px] font-black uppercase tracking-[3px] !text-[#3d2db5]">
                                    {{ __('schedule.intensive_program') }}
                                </span>
                                <span class="text-[10px] font-black px-2.5 py-1 rounded-full !text-[#92400e]"
                                    style="background: rgba(251,191,36,0.15);">
                                    {{ __('schedule.intensive_schedule') }}
                                </span>
                            </div>
                            <p class="text-gray-500 text-sm mb-3 font-medium !text-gray-500">{{ __('schedule.intensive_subtitle') }}</p>
                            <p class="text-2xl font-black !text-[#1a1060]">Rp 550.000</p>
                            <p class="text-gray-400 text-xs mt-1.5 font-medium !text-gray-400">{{ __('schedule.per_month') }}</p>
                            <div
                                class="program-check mt-4 w-6 h-6 rounded-full border-2 border-yellow-400
                flex items-center justify-center transition-all duration-200">
                                <svg class="w-3.5 h-3.5 text-white hidden" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kanan: biaya daftar --}}
                <div
                    class="flex flex-col items-center justify-center p-6 sm:p-8 text-center
                            border-t lg:border-t-0 lg:border-l border-white/10 gap-5">
                    <p class="text-white/60 text-[11px] font-bold uppercase tracking-widest">{{ __('schedule.registration_fee') }}</p>
                    <div class="w-full max-w-xs px-6 py-5 bg-white/95 dark:bg-slate-800/90">
                        <p class="text-gray-500 dark:text-slate-400 text-sm font-medium mb-1">{{ __('schedule.only') }}</p>
                        <div class="flex items-baseline gap-1 justify-center">
                            <span class="text-lg font-bold text-gray-600 dark:text-slate-300">Rp</span>
                            <span class="font-black leading-none dark:text-slate-100"
                                style="font-size: clamp(2.5rem, 6vw, 3.5rem); color: #1a1060; dark: color: #ffffff;">200.000</span>
                        </div>
                        <p class="text-gray-400 dark:text-slate-500 text-xs mt-2 font-medium">{{ __('schedule.one_time_payment') }}</p>
                    </div>
                    <button onclick="openDaftarModal()"
                        class="w-full max-w-xs py-3.5 font-black text-sm text-white
                                   transition-all duration-200 hover:brightness-105 active:scale-[.98]"
                        style="background: #E0443D;">
                        {{ __('schedule.register_button') }}
                    </button>
                </div>

            </div>

            {{-- Fitur --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-0 border-t border-white/10">
                @foreach ([['🎯', __('schedule.feature_1_title'), __('schedule.feature_1_desc')], ['📍', __('schedule.feature_2_title'), __('schedule.feature_2_desc')], ['📅', __('schedule.feature_3_title'), __('schedule.feature_3_desc')]] as [$ic, $title, $desc])
                    <div
                        class="px-6 sm:px-8 py-5 sm:py-7 border-b sm:border-b-0 sm:border-r border-white/10 last:border-0">
                        <div class="text-xl sm:text-2xl mb-2 sm:mb-3">{{ $ic }}</div>
                        <h4 class="text-white font-bold text-sm mb-1">{{ $title }}</h4>
                        <p class="text-white/40 text-xs leading-relaxed font-light">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

<style>
    .program-card.selected {
        border-color: #fbbf24 !important;
        box-shadow: 0 0 0 4px rgba(251, 191, 36, 0.2);
        transform: translateY(-4px);
    }

    .program-card.selected .program-check {
        background: #fbbf24;
        border-color: #fbbf24;
    }

    .program-card.selected .program-check svg {
        display: block;
    }
</style>

<script>
    function selectProgram(el) {
        document.querySelectorAll('.program-card').forEach(c => c.classList.remove('selected'));
        el.classList.add('selected');
    }
</script>
