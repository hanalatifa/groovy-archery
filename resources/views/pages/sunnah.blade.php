    <main>



        {{-- section sunnah --}}
<section class="max-w-7xl mx-auto px-6 py-24 font-sans bg-white overflow-hidden relative">
    <div class="relative flex justify-center items-center mb-16 mx-auto" style="max-width: fit-content;">

                <div class="absolute inset-[-4px] md:inset-[-8px] rounded-lg animate-spin-slow blur-[1px]"
                    style="background: conic-gradient(from 0deg, #85488F, #254292, #85488F); z-index: 1;">
                </div>
        <div class="absolute inset-[-20px] md:inset-[-40px] opacity-80" style="z-index: 1;">
            <canvas id="gradient-canvas" data-transition-in></canvas>
        </div>

        <div class="relative rounded-sm overflow-hidden shadow-2xl bg-white p-1" style="z-index: 2;">
            <img src="{{ asset('assets/sunnaharchery.jpeg') }}"
                 alt="United Through Archery"
                 class="w-full h-auto object-cover max-w-[900px] block relative"
                 style="z-index: 1;">
        </div>
    </div>

            <div class="text-center max-w-3xl mx-auto px-4">
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('assets/Logo.jpeg') }}" alt="Logo" class="w-14 h-14 object-contain">
                </div>

                <h2 class="text-3xl md:text-4xl font-bold mb-8 text-black tracking-tight leading-tight">
                    Dibangun di atas sunnah dan keahlian
                </h2>

                <p class="text-base md:text-lg leading-relaxed text-gray-600 font-light max-w-2xl mx-auto">
                    Klub Panahan ini berlandaskan pada nilai sunnah dalam olahraga panahan, yang tidak hanya melatih
                    keterampilan, tetapi juga membentuk karakter, fokus, dan kedisiplinan. Dengan menggabungkan nilai
                    spiritual dan teknik yang tepat, kami berkomitmen untuk terus berkembang menuju prestasi terbaik.
                </p>
            </div>
        </section>
    </section>

        <section class="relative py-24 overflow-hidden bg-gradient-to-br from-[#85488F] to-[#254292]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-start gap-12 mb-20">
                    <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight max-w-xl">
                        Angka-angka yang mencerminkan komitmen kami
                    </h2>
                    <p class="text-white/80 text-lg max-w-md">
                        Para atlet kami telah meraih pengakuan di berbagai kompetisi tingkat regional dan nasional.
                        Prestasi ini merupakan buah dari dedikasi bertahun-tahun.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="relative p-10 rounded-sm border border-white/50 bg-gradient-to-br from-[#85488F] to-[#254292] text-center">
                        <div class="text-5xl md:text-7xl font-bold text-white mb-4">
                            <span class="counter" data-target="100">0</span>+
                        </div>
                        <p class="text-white uppercase text-sm font-medium">Member aktif</p>
                    </div>

                    <div
                        class="relative p-10 rounded-sm border border-white/50 bg-gradient-to-br from-[#85488F] to-[#254292] text-center">
                        <div class="text-5xl md:text-7xl font-bold text-white mb-4">
                            <span class="counter" data-target="45">0</span>+
                        </div>
                        <p class="text-white uppercase text-sm font-medium">Perlombaan</p>
                    </div>

                    <div
                        class="relative p-10 rounded-sm border border-white/50 bg-gradient-to-br from-[#85488F] to-[#254292] text-center">
                        <div class="text-5xl md:text-7xl font-bold text-white mb-4">
                            <span class="counter" data-target="9">0</span>
                        </div>
                        <p class="text-white uppercase text-sm font-medium">Tahun berdiri</p>
                    </div>
                </div>
            </div>
        </section>

        <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Inisialisasi library Gradient.js
        const gradient = new Gradient();

        // Panggil initGradient dengan ID canvas
        // Library ini akan otomatis mencari variabel CSS --gradient-color-X
        gradient.initGradient('#gradient-canvas');

        // Tips: Untuk mengatur kecepatan secara manual di library ini,
        // kita bisa menggunakan interval kecil atau membiarkannya default (0.01)
        // karena library ini sudah di-optimize untuk fluid motion.
    });
</script>

        <style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Konfigurasi Warna untuk Gradient.js agar terbaca otomatis */
    #gradient-canvas {
        width: 100%;
        height: 100%;
        --gradient-color-1: #4c4494;
        --gradient-color-2: #6d5dfc;
        --gradient-color-3: #2b459a;
        --gradient-color-4: #a78bfa;
    }
</style>

        <script>
    const counters = document.querySelectorAll('.counter');
    const speed = 50;

    const startCounter = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');

                const updateCount = () => {
                    const count = +counter.innerText;
                    const inc = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCount();
                observer.unobserve(counter);
            }
        });
    };

    const options = {
        threshold: 0.5
    };

    const counterObserver = new IntersectionObserver(startCounter, options);

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
</script>
    </main>