{{-- ═══════════════════════ MODAL TESTIMONI ═══════════════════════ --}}
<div class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[100]
            hidden opacity-0 transition-opacity duration-300 items-center justify-center p-4"
     id="testiModal">

    <div class="bg-white dark:bg-slate-900 border dark:border-slate-700
                w-full max-w-md rounded-3xl p-6 md:p-8 shadow-2xl relative z-[110]">

        <form action="{{ route('testi.store') }}" method="POST" id="formTestimoni">
            @csrf

            {{-- Header --}}
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                        {{ __('landing.testimonial_title') }}
                    </h3>
                    <p class="text-xs text-gray-400 mt-0.5">{{ __('landing.testimonial_subtitle') }}</p>
                </div>
                <button type="button" id="closeTestiModal"
                        class="w-8 h-8 rounded-full flex items-center justify-center
                               text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-700
                               hover:text-gray-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="space-y-5">

                {{-- Nama --}}
                <div>
                    <label class="block text-[10px] font-bold mb-1.5 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
                        {{ __('landing.full_name') }}
                    </label>
                    <input type="text" name="nama" required
                           class="w-full border border-gray-200 dark:border-slate-700
                                  dark:bg-slate-800 dark:text-white
                                  px-4 py-2.5 rounded-xl text-sm
                                  focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a]
                                  outline-none transition"
                           placeholder="{{ __('landing.full_name_placeholder') }}">
                    <p class="text-red-500 text-xs mt-1 hidden" id="errNama">
                        {{ __('landing.name_required') }}
                    </p>
                </div>

                {{-- Peran --}}
                <div>
                    <label class="block text-[10px] font-bold mb-1.5 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
                        {{ __('landing.role_position') }}
                    </label>
                    <input type="text" name="peran" required
                           class="w-full border border-gray-200 dark:border-slate-700
                                  dark:bg-slate-800 dark:text-white
                                  px-4 py-2.5 rounded-xl text-sm
                                  focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a]
                                  outline-none transition"
                           placeholder="{{ __('landing.role_placeholder') }}">
                </div>

                {{-- Rating --}}
                <div>
                    <label class="block text-[10px] font-bold mb-2 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
                        {{ __('landing.rating') }}
                    </label>
                    <div class="flex flex-row-reverse justify-end gap-1">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="star{{ $i }}"
                               value="{{ $i }}" class="peer hidden" required>
                        <label for="star{{ $i }}"
                               class="cursor-pointer text-3xl text-gray-300
                                      peer-checked:text-amber-400
                                      hover:text-amber-300 transition-colors">★</label>
                        @endfor
                    </div>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errRating">
                        {{ __('landing.rating_required') }}
                    </p>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-[10px] font-bold mb-1.5 text-gray-600 dark:text-gray-400 uppercase tracking-widest">
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
                        {{ __('landing.description_required') }}
                    </p>
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
</div>
   
<script>
(function () {

     const LANG = {
        success : @js(__('landing.testimonial_success')),
        error   : @js(__('landing.testimonial_error')),
    };
    // Fallback kalau key belum ada di file lang
    if (!LANG.success) LANG.success = 'Testimoni berhasil dikirim! Terima kasih 🎯';
    if (!LANG.error)   LANG.error   = 'Gagal mengirim. Silakan coba lagi.';

       function toast(msg, isError) {
        if (typeof window.showToast === 'function') {
            window.showToast(msg, isError);
            return;
        }
        // Fallback mandiri
        const el = document.createElement('div');
        el.style.cssText = `
            position:fixed;bottom:28px;right:28px;z-index:99999;
            background:#1a1a2e;color:#fff;
            padding:14px 20px;border-radius:10px;
            font-size:13px;font-weight:600;
            display:flex;align-items:center;gap:10px;
            box-shadow:0 8px 24px rgba(0,0,0,.22);
            font-family:'Montserrat',sans-serif;
        `;
        el.innerHTML = `
            <div style="width:22px;height:22px;background:${isError?'#ef4444':'#22c55e'};border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg width="12" height="12" fill="none" stroke="white" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                          d="${isError?'M6 18L18 6M6 6l12 12':'M5 13l4 4L19 7'}"/>
                </svg>
            </div>
            <span>${msg}</span>`;
        document.body.appendChild(el);
        setTimeout(() => { el.style.opacity='0'; setTimeout(()=>el.remove(),350); }, 3500);
    }

     const modal = document.getElementById('testiModal');
    const form  = document.getElementById('formTestimoni');

    function openModal() {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('flex');
            modal.classList.remove('opacity-0');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.add('opacity-0');
        modal.classList.remove('flex');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    }

    document.getElementById('openTestiModal') ?.addEventListener('click', openModal);
    document.getElementById('closeTestiModal')?.addEventListener('click', closeModal);
    document.getElementById('cancelTesti')    ?.addEventListener('click', closeModal);
    modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });

     form?.addEventListener('submit', e => e.preventDefault());

    document.getElementById('submitTesti')?.addEventListener('click', async () => {

        const nama      = form.querySelector('[name="nama"]')?.value.trim()    ?? '';
        const peran     = form.querySelector('[name="peran"]')?.value.trim()   ?? '';
        const deskripsi = form.querySelector('[name="deskripsi"]')?.value.trim() ?? '';
        const ratingEl  = form.querySelector('input[name="rating"]:checked');

        // Validasi
        document.getElementById('errNama')     ?.classList.toggle('hidden', !!nama);
        document.getElementById('errRating')   ?.classList.toggle('hidden', !!ratingEl);
        document.getElementById('errDeskripsi')?.classList.toggle('hidden', !!deskripsi);
        if (!nama || !ratingEl || !deskripsi) return;

        // Loading state
        const btn      = document.getElementById('submitTesti');
        const origText = btn.textContent;
        btn.disabled     = true;
        btn.textContent  = '...';

        try {
            const res = await fetch(form.action, {
                method : 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                    'Accept'      : 'application/json',
                },
                body: new FormData(form),
            });

            if (!res.ok) throw new Error('server_error');

             closeModal();
            form.reset();
            toast(LANG.success, false);   

        } catch {
             toast(LANG.error, true);      

        } finally {
            btn.disabled    = false;
            btn.textContent = origText;
        }
    });

})();
</script>