<section class="max-w-5xl mx-auto px-6 py-24 text-center transition-colors duration-300">

    <p class="mb-2 text-[10px] font-bold uppercase tracking-[5px] text-[#2b459a] dark:text-blue-400">
        {{ __('landing.about_label') }}
    </p>

    <h2 class="mb-12 text-4xl font-bold leading-tight text-gray-900 dark:text-white md:text-5xl">
        {{ __('landing.about_title') }}
    </h2>

    @php
        $cards = [
            [
                'path' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z',
                'title' => __('landing.about_card_1_title'),
                'desc' => __('landing.about_card_1_desc'),
            ],
            [
                'path' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                'title' => __('landing.about_card_2_title'),
                'desc' => __('landing.about_card_2_desc'),
            ],
            [
                'path' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',
                'title' => __('landing.about_card_3_title'),
                'desc' => __('landing.about_card_3_desc'),
            ],
        ];
    @endphp

    <div class="grid gap-6 text-left md:grid-cols-3">
        @foreach ($cards as $card)
            <div
                class="group rounded-sm border border-gray-100 p-6 transition-all duration-300 hover:border-[#2b459a]/20 hover:shadow-lg dark:border-slate-700"
            >
                <div
                    class="mb-5 flex h-9 w-9 items-center justify-center rounded-sm border border-[#2b459a]/15 bg-[#2b459a]/5 transition-colors group-hover:bg-[#2b459a]/10 dark:border-blue-800/30 dark:bg-blue-900/20"
                >
                    <svg
                        class="h-4 w-4 text-[#2b459a] dark:text-blue-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="{{ $card['path'] }}"
                        />
                    </svg>
                </div>

                <h3 class="mb-2 text-sm font-bold text-gray-900 dark:text-gray-100">
                    {{ $card['title'] }}
                </h3>

                <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ $card['desc'] }}
                </p>
            </div>
        @endforeach
    </div>

</section>
