{{-- ═══════════════════════ MODAL TESTIMONI ═══════════════════════ --}}
<div class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100]
            hidden opacity-0 transition-opacity duration-300 items-center justify-center p-4"
    id="testiModal">

    <div
        class="bg-white dark:bg-slate-900 border dark:border-slate-700
                w-full max-w-md rounded-3xl p-6 md:p-8 shadow-2xl relative z-[110]">

        <form action="{{ route('testi.store') }}" method="POST" id="formTestimoni">

            @csrf

            {{-- Header --}}
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('landing.testimonial_title') }}
                    </h3>
                    <p class="text-xs text-gray-400 mt-0.5">{{ __('landing.testimonial_subtitle') }}</p>
                </div>
                <button type="button" id="closeTestiModal"
                    class="w-8 h-8 rounded-full flex items-center justify-center
                               text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-700
                               hover:text-gray-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="space-y-5">
                {{-- Nama --}}
                <div>
                    <label
                        class="block text-[10px] font-bold mb-1.5 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
                        {{ __('landing.full_name') }}
                    </label>
                    <input type="text" name="nama" required
                        class="w-full border border-gray-200 dark:border-slate-700
                                  dark:bg-slate-800 dark:text-white
                                  px-4 py-2.5 rounded-xl text-sm
                                  focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a]
                                  outline-none transition"
                        placeholder="{{ __('landing.full_name_placeholder') }}">
                </div>

                {{-- Peran --}}
                <div>
                    <label
                        class="block text-[10px] font-bold mb-1.5 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
                        {{ __('landing.role_position') }}
                    </label>
                    <input type="text" name="peran" required
                        class="w-full border border-gray-200 dark:border-slate-700
                                  dark:bg-slate-800 dark:text-white
                                  px-4 py-2.5 rounded-xl text-sm
                                  focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a]
                                  outline-none transition"
                        placeholder="{{ __('landing.role_placeholder') }}">
                    <p class="text-red-500 text-xs mt-1 hidden" id="errNama">{{ __('landing.name_required') }}</p>
                </div>

                {{-- Rating --}}
                <div>
                    <label
                        class="block text-[10px] font-bold mb-2 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
                        {{ __('landing.rating') }}
                    </label>
                    <div class="flex flex-row-reverse justify-end gap-1">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" id="star{{ $i }}"
                                value="{{ $i }}" class="peer hidden" required>
                            <label for="star{{ $i }}"
                                class="cursor-pointer text-3xl text-gray-300
                                      peer-checked:text-amber-400
                                      hover:text-amber-300 transition-colors">★</label>
                        @endfor
                    </div>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errRating">{{ __('landing.rating_required') }}</p>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label
                        class="block text-[10px] font-bold mb-1.5 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
                        {{ __('landing.description') }}
                    </label>
                    <textarea name="deskripsi" required rows="4"
                        class="w-full border border-gray-200 dark:border-slate-700
                                     dark:bg-slate-800 dark:text-white
                                     px-4 py-2.5 rounded-xl text-sm
                                     focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a]
                                     outline-none transition resize-none"
                        placeholder="{{ __('landing.description_placeholder') }}"></textarea>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errDeskripsi">
                        {{ __('landing.description_required') }}</p>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex">
                <button type="submit" id="submitTesti"
                    class="flex-1 py-3 bg-[#2b459a] text-white font-bold text-sm
                               uppercase tracking-wide rounded-xl
                               hover:bg-[#1e3278] transition-colors">
                    {{ __('landing.submit_testimonial') }}
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('testiModal');
            const openBtn = document.getElementById('openTestiModal');
            const closeBtn = document.getElementById('closeTestiModal');
            const cancelBtn = document.getElementById('cancelTesti');

            function openModal() {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                }, 10);
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                modal.classList.add('opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.style.overflow = '';
                }, 300);
            }

            if (openBtn) openBtn.addEventListener('click', openModal);
            if (closeBtn) closeBtn.addEventListener('click', closeModal);
            if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
        });
    </script>
</div>
