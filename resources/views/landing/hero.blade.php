        <section class="px-6 md:px-20 py-10">
            <div class="relative w-full max-w-7xl mx-auto h-[600px] overflow-hidden flex items-center justify-center text-center text-white">
                <img src="{{ asset('assets/hero-image.jpeg') }}" alt="Archery Field"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-[8000ms] ease-out hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-b from-black/15 via-black/50 to-black/75"></div>
                <div class="relative z-10 px-6">
                    <p class="fade-up delay-1 text-[10px] font-bold uppercase tracking-[5px] text-white/55 mb-5">
                        Groovy Archery — Jakarta Utara
                    </p>
                    <h1 class="fade-up delay-2 text-5xl md:text-7xl font-extrabold mb-6 leading-[1.1] tracking-tight">
                        Selamat datang,<br>Archers.
                    </h1>
                    <p class="fade-up delay-3 text-base md:text-lg font-light mb-10 max-w-2xl mx-auto leading-relaxed text-white/80">
                        Klub Panahan menyatukan para atlet yang berdedikasi dan berkomitmen untuk mencapai yang terbaik. Kami berlatih dengan tekad yang kuat, bertanding dengan ketepatan, dan membangun komunitas yang diikat oleh rasa hormat.
                    </p>
                    <button onclick="openDaftarModal()" class="fade-up delay-4 inline-flex items-center gap-3 bg-white text-black px-10 py-3.5 font-bold text-sm uppercase tracking-widest hover:bg-gray-100 transition">
                        Daftar Sebagai Member
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1.5">
                    <span class="text-[9px] uppercase tracking-[4px] text-white/40 mb-1">Scroll</span>
                    <div class="scroll-dot w-1 h-1 rounded-full bg-white"></div>
                    <div class="scroll-dot w-1 h-1 rounded-full bg-white"></div>
                    <div class="scroll-dot w-1 h-1 rounded-full bg-white"></div>
                </div>
            </div>
        </section>