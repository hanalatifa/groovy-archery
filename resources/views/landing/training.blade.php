<section class="max-w-7xl mx-auto px-6 py-28 space-y-28 transition-colors duration-300">

    @php
        $sections = [
            [
                'num' => '02',
                'type' => __('landing.training_section_1_type'),
                'tag' => __('landing.training_section_1_tag'),
                'title' => __('landing.training_section_1_title'),
                'desc' => __('landing.training_section_1_desc'),
                'img' => 'assets/training-1.jpeg',
                'reverse' => false,
            ],
            [
                'num' => '03',
                'type' => __('landing.training_section_2_type'),
                'tag' => __('landing.training_section_2_tag'),
                'title' => __('landing.training_section_2_title'),
                'desc' => __('landing.training_section_2_desc'),
                'img' => 'assets/champion.jpeg',
                'reverse' => true,
            ],
        ];
    @endphp

    @foreach($sections as $section)

    <div class="grid md:grid-cols-2 gap-16 items-center {{ $section['reverse'] ? 'md:[direction:rtl]' : '' }}">

        <div class="flex flex-col justify-center {{ $section['reverse'] ? '[direction:ltr]' : '' }}">

            <div class="flex items-center gap-3 mb-8">

                <span class="text-xs font-bold text-gray-300 dark:text-gray-600">
                    {{ $section['num'] }}
                </span>

                <div class="w-5 h-px bg-gray-200 dark:bg-slate-700"></div>

                <span class="text-[10px] font-bold uppercase tracking-[3px] text-gray-400 dark:text-gray-500">
                    {{ $section['type'] }}
                </span>
            </div>

            <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[4px] mb-3">
                {{ $section['tag'] }}
            </p>

            <h2 class="text-4xl md:text-5xl font-bold mb-5 text-gray-900 dark:text-white leading-tight transition-colors">
                {{ $section['title'] }}
            </h2>

            <div class="w-10 h-0.5 bg-[#2b459a] dark:bg-blue-500 mb-6 rounded-full"></div>

            <p class="text-gray-500 dark:text-gray-400 text-base leading-relaxed mb-10 max-w-md">
                {{ $section['desc'] }}
            </p>

            <div class="flex items-center gap-6">

                <div>

                    <p class="text-[10px] text-gray-400 dark:text-gray-500 mb-1.5 tracking-wide">
                        {{ __('landing.training_contact') }}
                    </p>

                    <button onclick="openDaftarModal()"
                            class="inline-flex items-center gap-2 bg-[#e24a43] text-white px-8 py-3
                                   font-bold text-sm uppercase tracking-wide hover:bg-red-700
                                   transition-all duration-200 shadow-md active:scale-95">

                        {{ __('landing.training_register') }}

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <a href="#"
                   class="flex items-center gap-2 font-bold text-sm text-gray-900 dark:text-gray-300 hover:text-[#2b459a] dark:hover:text-blue-400 transition-colors group">

                    {{ __('landing.training_details') }}

                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="img-frame {{ $section['reverse'] ? '[direction:ltr]' : '' }} group overflow-hidden rounded-sm">

            <img src="{{ asset($section['img']) }}"
                 alt="{{ $section['title'] }}"
                 class="w-full h-[420px] object-cover shadow-xl transition-transform duration-700 group-hover:scale-[1.03] dark:brightness-90">
        </div>
    </div>

    @if(!$section['reverse'])
        <div class="border-t border-gray-100 dark:border-slate-800"></div>
    @endif

    @endforeach

</section>
