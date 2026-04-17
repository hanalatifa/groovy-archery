    {{-- ═══════════════════════ MODAL TESTIMONI ═══════════════════════ --}}
    <div class="modal-backdrop" id="testiModal">
        <div class="modal-box">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Beri Testimoni</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Bagikan pengalaman kamu bersama Groovy Archery</p>
                </div>
                <button id="closeTestiModal"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="space-y-5">
                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">Nama</label>
                    <input type="text" id="testiNama" placeholder="Masukkan nama kamu"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition">
                    <p class="text-red-500 text-xs mt-1 hidden" id="errNama">Nama wajib diisi</p>
                </div>

                {{-- Bintang --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Rating</label>
                    <div class="star-input" id="starInput">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}">
                        <label for="star{{ $i }}">★</label>
                        @endfor
                    </div>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errRating">Pilih rating terlebih dahulu</p>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">Deskripsi</label>
                    <textarea id="testiDeskripsi" rows="4" placeholder="Ceritakan pengalaman kamu..."
                              class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition resize-none"></textarea>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errDeskripsi">Deskripsi wajib diisi</p>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button id="submitTesti"
                        class="flex-1 py-3 bg-[#2b459a] text-white font-bold text-sm uppercase tracking-wide hover:bg-[#1e3278] transition-colors rounded-lg">
                    Kirim Testimoni
                </button>
                <button id="cancelTesti"
                        class="px-5 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════ SCRIPTS ═══════════════════════ --}}
    <script>
        // ── Counter ──
        const counterObs = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const target = +el.dataset.target;
                const inc = target / 60;
                const update = () => {
                    const cur = +el.innerText;
                    if (cur < target) { el.innerText = Math.ceil(cur + inc); setTimeout(update, 18); }
                    else el.innerText = target;
                };
                update();
                obs.unobserve(el);
            });
        }, { threshold: 0.5 });
        document.querySelectorAll('.counter').forEach(c => counterObs.observe(c));

        // ── Fade up ──
        const fadeObs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('visible'); fadeObs.unobserve(e.target); }
            });
        }, { threshold: 0.12 });
        document.querySelectorAll('.fade-up').forEach(el => fadeObs.observe(el));

        // ── Testimoni Slider ──
        const slider     = document.getElementById('testiSlider');
        const cards      = slider.querySelectorAll('.testi-card');
        const dotsWrap   = document.getElementById('testiDots');
        const perView    = window.innerWidth >= 768 ? 3 : 1;
        const totalSlides = Math.ceil(cards.length / perView);
        let current = 0;

        // Build dots
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 ' + (i === 0 ? 'bg-[#2b459a] w-5' : 'bg-gray-300');
            dot.addEventListener('click', () => goTo(i));
            dotsWrap.appendChild(dot);
        }

        function goTo(idx) {
            current = Math.max(0, Math.min(idx, totalSlides - 1));
            const pct = (100 / perView) * current * perView;
            slider.style.transform = `translateX(-${pct / cards.length * 100}%)`;
            dotsWrap.querySelectorAll('button').forEach((d, i) => {
                d.className = 'rounded-full transition-all duration-300 ' + (i === current ? 'bg-[#2b459a] w-5 h-2' : 'bg-gray-300 w-2 h-2');
            });
        }

        // Set card widths
        cards.forEach(c => c.style.width = `${100 / perView}%`);

        document.getElementById('testiPrev').addEventListener('click', () => goTo(current - 1));
        document.getElementById('testiNext').addEventListener('click', () => goTo(current + 1));

        // ── Modal ──
        const modal      = document.getElementById('testiModal');
        const openBtn    = document.getElementById('openTestiModal');
        const closeBtn   = document.getElementById('closeTestiModal');
        const cancelBtn  = document.getElementById('cancelTesti');
        const submitBtn  = document.getElementById('submitTesti');

        function openModal()  { modal.classList.add('open'); document.body.style.overflow = 'hidden'; }
        function closeModal() { modal.classList.remove('open'); document.body.style.overflow = ''; }

        openBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });

        // ── Validasi + Submit ──
        submitBtn.addEventListener('click', () => {
            const nama      = document.getElementById('testiNama').value.trim();
            const rating    = document.querySelector('input[name="rating"]:checked');
            const deskripsi = document.getElementById('testiDeskripsi').value.trim();
            let valid = true;

            const errNama     = document.getElementById('errNama');
            const errRating   = document.getElementById('errRating');
            const errDeskripsi = document.getElementById('errDeskripsi');

            errNama.classList.toggle('hidden', !!nama);
            errRating.classList.toggle('hidden', !!rating);
            errDeskripsi.classList.toggle('hidden', !!deskripsi);

            if (!nama || !rating || !deskripsi) return;

            closeModal();
            // Reset form
            document.getElementById('testiNama').value = '';
            document.getElementById('testiDeskripsi').value = '';
            document.querySelectorAll('input[name="rating"]').forEach(r => r.checked = false);

            showToast('Testimoni berhasil dikirim! Terima kasih 🎯');
        });

        // ── Toast ──
        function showToast(msg) {
            const toast = document.createElement('div');
            toast.className = 'toast';
            toast.innerHTML = `
                <div class="toast-icon">
                    <svg width="12" height="12" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span>${msg}</span>`;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('hide');
                setTimeout(() => toast.remove(), 400);
            }, 3500);
        }
    </script>