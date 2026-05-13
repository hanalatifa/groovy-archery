<section class="relative py-28 overflow-hidden gradient-animated">

    <div class="absolute top-0 right-0 w-96 h-96 rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(255,255,255,0.07), transparent); transform: translate(25%,-25%);">
    </div>

    <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full pointer-events-none"
         style="background: radial-gradient(circle, rgba(255,255,255,0.06), transparent); transform: translate(-25%,25%);">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-20">

            <div class="max-w-xl">

                <p class="text-[10px] font-bold uppercase tracking-[5px] text-white/40 mb-4">
                    {{ __('landing.stats_label') }}
                </p>

                <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                    {{ __('landing.stats_title') }}
                </h2>
            </div>

            <p class="text-white/65 text-base max-w-sm leading-relaxed">
                {{ __('landing.stats_desc') }}
            </p>
        </div>

        @php
            $stats = [
                ['100', '+', __('landing.stats_members')],
                ['45', '+', __('landing.stats_competitions')],
                ['9', '', __('landing.stats_founded')],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            @foreach($stats as [$n, $s, $l])

            <div class="stat-card p-10 rounded-sm text-center cursor-default"
                 style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.18);">

                <div class="text-6xl md:text-7xl font-extrabold text-white mb-3 tracking-tight">
                    <span class="counter" data-target="{{ $n }}">0</span>{{ $s }}
                </div>

                <div class="w-8 h-px bg-white/30 mx-auto mb-3"></div>

                <p class="text-white/60 uppercase text-[10px] font-bold tracking-[4px]">
                    {{ $l }}
                </p>
            </div>

            @endforeach

        </div>
    </div>
</section>
