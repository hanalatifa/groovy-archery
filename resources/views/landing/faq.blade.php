{{-- ═══════════════════════ FAQ ═══════════════════════ --}}
<section class="py-24 px-6 bg-white dark:bg-slate-900 transition-colors duration-300" id="faq">
    <div class="max-w-4xl mx-auto">

        {{-- Header --}}
        <div class="text-center mb-10 md:mb-14">
            <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">{{ __('landing.faq_label') }}</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">{{ __('landing.faq_title') }}
            </h2>
            <p class="text-gray-400 dark:text-slate-500 text-sm">{{ __('landing.faq_sub') }}</p>
        </div>

        {{-- FAQ Items --}}
        <div class="space-y-3" id="faqList">

            @php
                $faqs = [
                    [
                        'q' => __('landing.faq_q1'),
                        'a' => __('landing.faq_a1'),
                    ],
                    [
                        'q' => __('landing.faq_q2'),
                        'a' => __('landing.faq_a2'),
                    ],
                    [
                        'q' => __('landing.faq_q3'),
                        'a' => __('landing.faq_a3'),
                    ],
                    [
                        'q' => __('landing.faq_q4'),
                        'a' => __('landing.faq_a4'),
                    ],
                    [
                        'q' => __('landing.faq_q5'),
                        'a' => __('landing.faq_a5'),
                    ],
                    [
                        'q' => __('landing.faq_q6'),
                        'a' => __('landing.faq_a6'),
                    ],
                    [
                        'q' => __('landing.faq_q7'),
                        'a' => __('landing.faq_a7'),
                    ],
                ];
            @endphp

            @foreach ($faqs as $i => $faq)
                <div class="faq-item border border-gray-100 dark:border-slate-700 rounded-2xl overflow-hidden
                        hover:border-[#2b459a]/20 hover:shadow-sm transition-all duration-300
                        bg-white dark:bg-slate-800"
                    data-index="{{ $i }}">

                    {{-- Pertanyaan (trigger) --}}
                    <button
                        class="faq-trigger w-full flex items-center justify-between gap-4
                               px-7 py-5 text-left group"
                        onclick="toggleFaq({{ $i }})">
                        <span class="flex items-center gap-4">
                            <span
                                class="text-[10px] font-black text-[#2b459a] dark:text-blue-400 opacity-50 shrink-0 w-5">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <span
                                class="text-sm md:text-base font-bold text-gray-800 dark:text-slate-100
                                     group-hover:text-[#2b459a] dark:group-hover:text-blue-400
                                     transition-colors duration-200 leading-snug">
                                {{ $faq['q'] }}
                            </span>
                        </span>

                        {{-- Icon + / × --}}
                        <span
                            class="faq-icon shrink-0 w-8 h-8 rounded-full flex items-center justify-center
                                 border-2 border-gray-100 dark:border-slate-600 transition-all duration-300
                                 group-hover:border-[#2b459a]/30 dark:group-hover:border-blue-400/30">
                            <svg class="faq-plus w-4 h-4 text-gray-400 dark:text-slate-500 transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <svg class="faq-minus w-4 h-4 text-[#2b459a] dark:text-blue-400 hidden transition-all duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4" />
                            </svg>
                        </span>
                    </button>

                    {{-- Jawaban (collapsible) --}}
                    <div class="faq-answer overflow-hidden transition-all duration-400 ease-in-out"
                        style="max-height: 0;">
                        <div class="px-7 pb-6 pt-1 flex gap-4">
                            <div class="w-5 shrink-0"></div>
                            <p class="text-gray-500 dark:text-slate-400 text-sm leading-relaxed">
                                {{ $faq['a'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Smooth expand / collapse */
    .faq-answer {
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1),
            opacity 0.3s ease;
        opacity: 0;
    }

    .faq-item.open .faq-answer {
        opacity: 1;
    }

    /* Active state styling - Light */
    .faq-item.open {
        border-color: rgba(43, 69, 154, 0.2) !important;
        box-shadow: 0 4px 20px rgba(43, 69, 154, 0.06);
    }

    .faq-item.open .faq-trigger .text-gray-800 {
        color: #2b459a;
    }

    .faq-item.open .faq-icon {
        background: rgba(43, 69, 154, 0.06);
        border-color: rgba(43, 69, 154, 0.25) !important;
    }

    .faq-item.open .faq-plus {
        display: none;
    }

    .faq-item.open .faq-minus {
        display: block;
    }

    /* Active state styling - Dark */
    html.dark .faq-item.open {
        border-color: rgba(96, 165, 250, 0.25) !important;
        box-shadow: 0 4px 20px rgba(96, 165, 250, 0.08);
    }

    html.dark .faq-item.open .faq-trigger span.font-bold {
        color: #60a5fa;
    }

    html.dark .faq-item.open .faq-icon {
        background: rgba(96, 165, 250, 0.08);
        border-color: rgba(96, 165, 250, 0.3) !important;
    }
</style>

<script>
    (function() {
        function getAnswerHeight(item) {
            const ans = item.querySelector('.faq-answer');
            const inner = ans.querySelector('div');
            return inner ? inner.offsetHeight : 0;
        }

        function toggleFaq(index) {
            const items = document.querySelectorAll('.faq-item');
            const target = items[index];
            const isOpen = target.classList.contains('open');

            items.forEach(item => {
                item.classList.remove('open');
                item.querySelector('.faq-answer').style.maxHeight = '0';
            });

            if (!isOpen) {
                target.classList.add('open');
                const ans = target.querySelector('.faq-answer');
                ans.style.maxHeight = getAnswerHeight(target) + 'px';
            }
        }

        window.toggleFaq = toggleFaq;
    })();
</script>
