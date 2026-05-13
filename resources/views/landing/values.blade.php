<section class="mx-auto px-6 py-20">

    <div class="text-center mb-14 transition-colors duration-300">

        <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">
            {{ __('landing.values_label') }}
        </p>

        <h2 class="text-3xl md:text-4xl font-bold mb-3 text-gray-900 dark:text-white">
            {{ __('landing.values_title') }}
        </h2>

        <p class="text-gray-400 dark:text-gray-500 text-sm">
            {{ __('landing.values_sub') }}
        </p>
    </div>

    @php
        $values = [
            [
                'tag' => __('landing.value_1_tag'),
                'title' => __('landing.value_1_title'),
                'desc' => __('landing.value_1_desc'),
                'img' => 'assets/gambar-2.png',
            ],
            [
                'tag' => __('landing.value_2_tag'),
                'title' => __('landing.value_2_title'),
                'desc' => __('landing.value_2_desc'),
                'img' => 'assets/gambar-1.png',
            ],
            [
                'tag' => __('landing.value_3_tag'),
                'title' => __('landing.value_3_title'),
                'desc' => __('landing.value_3_desc'),
                'img' => 'assets/gambar-3.png',
            ],
        ];
    @endphp

    <div class="flex flex-col md:flex-row gap-5 w-full md:h-[520px] items-stretch justify-center">

        @foreach($values as $value)

        <div class="value-card group relative flex-1 md:flex-none md:w-[28%] hover:md:w-[44%] flex flex-col bg-[#4c4494] text-white overflow-hidden rounded-sm shadow-xl cursor-pointer">

            <div class="h-48 md:h-52 w-full overflow-hidden shrink-0">
                <img src="{{ asset($value['img']) }}"
                     alt="{{ $value['tag'] }}"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            </div>

            <div class="p-7 flex flex-col justify-between flex-grow">

                <div>
                    <p class="text-[9px] uppercase tracking-[4px] text-blue-200/60 mb-2">
                        {{ $value['tag'] }}
                    </p>

                    <h4 class="text-[30px] font-bold mb-3 leading-snug">
                        {{ $value['title'] }}
                    </h4>

                    <div class="value-desc">
                        <p class="text-l leading-relaxed text-blue-100/75">
                            {{ $value['desc'] }}
                        </p>
                    </div>
                </div>

                <a href="#"
                   class="inline-flex items-center gap-2 text-[10px] font-bold tracking-[3px] uppercase mt-5 opacity-50 group-hover:opacity-100 transition-opacity duration-300">

                    {{ __('landing.value_explore') }}

                    <svg class="w-3 h-3 transition-transform group-hover:translate-x-1.5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path d="M9 5l7 7-7 7"
                              stroke-width="2.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>

        @endforeach

    </div>
</section>
