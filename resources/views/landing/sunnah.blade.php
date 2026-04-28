{{-- ═══════════════════════ SUNNAH ═══════════════════════ --}}
<section class="max-w-7xl mx-auto px-6 py-24 transition-colors duration-300">
    <div class="flex justify-center mb-16">
        <div class="relative inline-block group">
            {{-- Frame Border - di Dark Mode kita buat sedikit lebih bersinar --}}
            <div class="absolute -inset-3 border-2 border-[#85488F]/25 dark:border-purple-500/20 rounded-sm transition-transform duration-500 group-hover:scale-105"></div>
            <div class="absolute -inset-1.5 border border-[#254292]/15 dark:border-blue-400/20 rounded-sm transition-transform duration-500 group-hover:scale-105 delay-75"></div>
            
            <img src="{{ asset('assets/sunnaharchery.jpeg') }}" alt="United Through Archery"
                 class="relative block w-full max-w-[860px] h-auto object-cover rounded-sm shadow-2xl dark:shadow-blue-900/20 transition-all duration-500 group-hover:brightness-110">
        </div>
    </div>

    <div class="text-center max-w-3xl mx-auto px-4">
        <div class="flex justify-center mb-6">
            {{-- Tambahkan filter brightness jika logo asli terlalu gelap untuk background gelap --}}
            <img src="{{ asset('assets/Logo.jpeg') }}" alt="Logo" class="w-14 h-14 object-cover dark:brightness-125 dark:contrast-125">
        </div>

        <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Nilai Kami</p>
        
        {{-- dark:text-white sangat krusial di sini --}}
        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900 dark:text-white leading-tight">
            Dibangun di atas sunnah dan keahlian
        </h2>

        <p class="text-base md:text-lg leading-relaxed text-gray-500 dark:text-gray-400 font-light max-w-2xl mx-auto italic">
            "Klub Panahan ini berlandaskan pada nilai sunnah dalam olahraga panahan, yang tidak hanya melatih keterampilan, tetapi juga membentuk karakter, fokus, dan kedisiplinan. Dengan menggabungkan nilai spiritual dan teknik yang tepat, kami berkomitmen untuk terus berkembang menuju prestasi terbaik."
        </p>
    </div>
</section>