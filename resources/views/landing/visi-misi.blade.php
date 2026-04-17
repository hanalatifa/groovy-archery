        {{-- ═══════════════════════ VISI MISI HEADER ═══════════════════════ --}}
        <section class="text-center pb-10 px-6">
            <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Visi dan Misi</p>
            <h2 class="text-4xl md:text-5xl font-bold mb-3 text-gray-900">Mengapa Kami Ada?</h2>
            <p class="text-gray-400 text-sm">Kami hadir dengan tujuan.</p>
        </section>

                {{-- ═══════════════════════ VISI MISI CARDS ═══════════════════════ --}}
        <section class="max-w-7xl mx-auto px-6 pb-28 grid md:grid-cols-2 gap-6">
            <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg">
                <img src="{{ asset('assets/image 1.jpeg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 via-[#1e2a78]/30 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-12 text-white">
                    <p class="text-[10px] mb-3 opacity-50 uppercase tracking-[5px]">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-5">Visi</h3>
                    <p class="text-base font-light leading-relaxed text-white/80 max-w-sm">
                        Melalui olahraga panahan menciptakan atlet-atlet panahan yang berprestasi dan berakhlakul karimah.
                    </p>
                    <div class="vismis-underline mt-6"></div>
                </div>
            </div>
            <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg">
                <img src="{{ asset('assets/champion.jpeg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 via-[#1e2a78]/30 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-12 text-white">
                    <p class="text-[10px] mb-3 opacity-50 uppercase tracking-[5px]">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-5">Misi</h3>
                    <ul class="space-y-2.5 text-sm font-light text-white/80">
                        @foreach(['Memasalkan olahraga panahan di Sekolah-Sekolah dan lingkungan sekitar','Menjadikan olahraga panahan wadah untuk pengembangan karakter','Membantu atlet mengembangkan bakat dan kemampuan memanah hingga mencapai jalur prestasi','Mencetak pemanah berprestasi yang mampu mengharumkan nama bangsa di kancah Nasional dan Internasional'] as $i => $misi)
                        <li class="flex gap-3 leading-relaxed">
                            <span class="opacity-40 font-bold shrink-0">0{{ $i+1 }}</span>{{ $misi }}
                        </li>
                        @endforeach
                    </ul>
                    <div class="vismis-underline mt-6"></div>
                </div>
            </div>
        </section>