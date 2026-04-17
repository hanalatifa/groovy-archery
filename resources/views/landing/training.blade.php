    {{-- ═══════════════════════ TRAINING & COACHING ═══════════════════════ --}}
    <section class="max-w-7xl mx-auto px-6 py-28 space-y-28">
        @foreach([
            ['02','Training','Program','Pelatihan Bertahap','Program pelatihan kami dirancang untuk semua tingkatan, mulai dari pemula yang mempelajari dasar-dasar hingga atlet tingkat lanjut yang mengasah teknik bertanding. Setiap sesi dirancang untuk menghasilkan peningkatan yang terukur.','assets/champion.jpeg',false],
            ['03','Coaching','Pelatihan','Pelatihan Expert','Para pelatih kami memiliki pengalaman bertahun-tahun di bidang kompetisi serta pengetahuan teknis yang mendalam. Mereka akan mendampingi Anda secara pribadi untuk mengidentifikasi kelemahan, menyempurnakan teknik, dan mempersiapkan diri untuk kompetisi.','assets/champion.jpeg',true],
        ] as [$num,$type,$tag,$title,$desc,$img,$reverse])
        <div class="grid md:grid-cols-2 gap-16 items-center {{ $reverse ? 'md:[direction:rtl]' : '' }}">
            <div class="flex flex-col justify-center {{ $reverse ? '[direction:ltr]' : '' }}">
                <div class="flex items-center gap-3 mb-8">
                    <span class="text-xs font-bold text-gray-300">{{ $num }}</span>
                    <div class="w-5 h-px bg-gray-200"></div>
                    <span class="text-[10px] font-bold uppercase tracking-[3px] text-gray-400">{{ $type }}</span>
                </div>
                <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[4px] mb-3">{{ $tag }}</p>
                <h2 class="text-4xl md:text-5xl font-bold mb-5 text-black leading-tight">{{ $title }}</h2>
                <div class="w-10 h-0.5 bg-[#2b459a] mb-6 rounded-full"></div>
                <p class="text-gray-500 text-base leading-relaxed mb-10 max-w-md">{{ $desc }}</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="inline-flex items-center gap-2 bg-[#e24a43] text-white px-8 py-3 font-bold text-sm uppercase tracking-wide hover:bg-red-700 transition-colors duration-200 shadow-sm">
                        Daftar
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="#" class="flex items-center gap-2 font-bold text-sm text-black hover:text-[#2b459a] transition-colors group">
                        Details
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="img-frame {{ $reverse ? '[direction:ltr]' : '' }} group overflow-hidden">
                <img src="{{ asset($img) }}" alt="{{ $title }}"
                     class="w-full h-[420px] object-cover shadow-xl transition-transform duration-700 group-hover:scale-[1.03]">
            </div>
        </div>
        @if(!$reverse)<div class="border-t border-gray-100"></div>@endif
        @endforeach
    </section>