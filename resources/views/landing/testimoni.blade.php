{{-- ═══════════════════════ TESTIMONI ═══════════════════════ --}}
<section class="py-12 md:py-24 px-4 md:px-6 transition-colors duration-300 font-roboto overflow-hidden" id="testimoni">
    <div class="text-center mb-10 md:mb-14">
        <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Testimoni</p>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">Testimoni Member</h2>
        <p class="text-gray-400 dark:text-gray-500 text-sm">Dari harapan menjadi kenyataan</p>
    </div>

    {{-- Slider wrapper --}}
    <div class="relative max-w-6xl mx-auto px-2 md:px-16">
        <div class="overflow-hidden">
            <div id="testiSlider" 
                 class="flex flex-nowrap overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar gap-0"
                 style="ms-overflow-style: none; scrollbar-width: none;">
                
                @foreach($testimonis as $testi)
                <div class="testi-card w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 snap-center md:snap-start px-2 py-4">
                    <div class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-2xl p-6 md:p-8 shadow-sm h-full flex flex-col transition-all">
                        <div class="flex gap-1 mb-4 text-amber-400">
                            @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $testi->rating ? 'fill-current' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base italic flex-grow mb-5 leading-relaxed">"{{ $testi->deskripsi }}"</p>
                        <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-50 dark:border-slate-700">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-xs font-bold" style="background: linear-gradient(135deg, #85488F, #254292);">
                                {{ strtoupper(substr($testi->nama, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold text-sm text-gray-800 dark:text-white leading-none">{{ $testi->nama }}</p>
                                <p class="text-[10px] uppercase text-gray-400 tracking-wider mt-1">Verified Member</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Navigasi Desktop --}}
        <button id="testiPrev" class="hidden md:flex absolute top-1/2 -left-4 -translate-y-1/2 w-11 h-11 bg-white dark:bg-slate-700 shadow-md border border-gray-100 dark:border-slate-600 rounded-full items-center justify-center z-20 text-gray-700 dark:text-white hover:bg-gray-50 transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button id="testiNext" class="hidden md:flex absolute top-1/2 -right-4 -translate-y-1/2 w-11 h-11 bg-white dark:bg-slate-700 shadow-md border border-gray-100 dark:border-slate-600 rounded-full items-center justify-center z-20 text-gray-700 dark:text-white hover:bg-gray-50 transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>

    {{-- Dots Indikator --}}
    <div class="flex justify-center gap-2 mt-8" id="testiDots"></div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('testiSlider');
    const dotsContainer = document.getElementById('testiDots');
    
    function updateSliderLogic() {
        const cards = document.querySelectorAll('.testi-card');
        if (!slider || cards.length === 0) return;

        // 1. Reset dan Bangun Ulang Dots
        dotsContainer.innerHTML = '';
        cards.forEach((_, i) => {
            const dot = document.createElement('div');
            dot.className = `h-1.5 transition-all duration-300 rounded-full ${i === 0 ? 'bg-[#2b459a] w-6' : 'bg-gray-300 w-2'}`;
            dotsContainer.appendChild(dot);
        });

        const dots = dotsContainer.querySelectorAll('div');

        // 2. Fungsi Update Dots (Akurat untuk Scroll & Button)
        function syncDots() {
            const cardWidth = cards[0].offsetWidth;
            const index = Math.round(slider.scrollLeft / cardWidth);
            
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add('bg-[#2b459a]', 'w-6');
                    dot.classList.remove('bg-gray-300', 'w-2');
                } else {
                    dot.classList.remove('bg-[#2b459a]', 'w-6');
                    dot.classList.add('bg-gray-300', 'w-2');
                }
            });
        }

        // 3. Kontrol Navigasi Button (Menggunakan scrollTo agar lebih pasti)
        const btnNext = document.getElementById('testiNext');
        const btnPrev = document.getElementById('testiPrev');

        btnNext.onclick = () => {
            const cardWidth = cards[0].offsetWidth;
            // Scroll ke posisi kartu berikutnya
            slider.scrollBy({ left: cardWidth, behavior: 'smooth' });
        };

        btnPrev.onclick = () => {
            const cardWidth = cards[0].offsetWidth;
            // Scroll ke posisi kartu sebelumnya
            slider.scrollBy({ left: -cardWidth, behavior: 'smooth' });
        };

        // Listener Scroll untuk update dots
        slider.addEventListener('scroll', syncDots);
    }

    // Jalankan Logika
    updateSliderLogic();

    // Opsional: Jika kamu menambah testimoni via AJAX/Modal tanpa refresh halaman, 
    // panggil updateSliderLogic() lagi setelah data berhasil disimpan.
});
</script>