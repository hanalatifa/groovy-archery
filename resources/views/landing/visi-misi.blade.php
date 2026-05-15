<section class="text-center pb-10 px-6 transition-colors duration-300" id="visi-misi">
    <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">
        {{ __('landing.vision_label') }}
    </p>

    <h2 class="text-4xl md:text-5xl font-bold mb-3 text-gray-900 dark:text-white">
        {{ __('landing.vision_title') }}
    </h2>

    <p class="text-gray-400 dark:text-gray-500 text-sm">
        {{ __('landing.vision_sub') }}
    </p>
</section>

<section class="max-w-7xl mx-auto px-6 pb-28 grid md:grid-cols-2 gap-6">

    {{-- VISION --}}
    <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg group">

        <img src="{{ asset('assets/image 1.jpeg') }}"
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

        <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 dark:from-slate-900/95 via-[#1e2a78]/30 dark:via-slate-900/30 to-transparent"></div>

        <div class="absolute inset-x-0 bottom-0 p-12 text-white">

            <p class="text-[10px] mb-3 opacity-50 uppercase tracking-[5px]">
                {{ __('landing.vision_brand') }}
            </p>

            <h3 class="text-5xl font-bold mb-5">
                {{ __('landing.vision_heading') }}
            </h3>

            <p class="text-base font-light leading-relaxed text-white/80 max-w-sm">
                {{ __('landing.vision_text') }}
            </p>

            <div class="vismis-underline mt-6 bg-white/30"></div>
        </div>
    </div>

    {{-- MISSION --}}
    <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg group">

        <img src="{{ asset('assets/champion.jpeg') }}"
             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

        <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 dark:from-slate-900/95 via-[#1e2a78]/30 dark:via-slate-900/30 to-transparent"></div>

        <div class="absolute inset-x-0 bottom-0 p-12 text-white">

            <p class="text-[10px] mb-3 opacity-50 uppercase tracking-[5px]">
                {{ __('landing.mission_brand') }}
            </p>

            <h3 class="text-5xl font-bold mb-5">
                {{ __('landing.mission_heading') }}
            </h3>

            @php
                $missions = [
                    __('landing.mission_1'),
                    __('landing.mission_2'),
                    __('landing.mission_3'),
                    __('landing.mission_4'),
                ];
            @endphp

            <ul class="space-y-2.5 text-sm font-light text-white/80">
                @foreach($missions as $i => $misi)
                <li class="flex gap-3 leading-relaxed">
                    <span class="opacity-40 font-bold shrink-0">
                        0{{ $i + 1 }}
                    </span>

                    {{ $misi }}
                </li>
                @endforeach
            </ul>

            <div class="vismis-underline mt-6 bg-white/30"></div>
        </div>
    </div>

</section>
