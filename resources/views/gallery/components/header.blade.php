{{-- ═══════════════════════ HERO ═══════════════════════ --}}
<section class="relative min-h-screen overflow-hidden">

    {{-- Background image dengan overlay --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/athletesimage.png') }}" alt="Komunitas Pemanah"
             class="w-full h-full object-cover object-center hero-img">
        {{-- Overlay gradient: gelap di kiri, transparan di kanan --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-black/10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
    </div>

    {{-- Garis dekorasi vertikal --}}
    <div class="absolute top-0 left-[10%] w-px h-full bg-white/5 z-10"></div>
    <div class="absolute top-0 left-[33%] w-px h-full bg-white/5 z-10"></div>

    {{-- Konten utama --}}
    <div class="relative z-20 max-w-7xl mx-auto px-6 min-h-screen flex items-center">
        <div class="max-w-2xl py-32">

            {{-- Badge --}}
            <div class="hero-fade flex items-center gap-3 mb-10">
                <div class="flex -space-x-1">
                    <div class="w-2 h-2 rounded-full bg-[#DA4139]"></div>
                    <div class="w-2 h-2 rounded-full bg-[#DA4139]/60"></div>
                    <div class="w-2 h-2 rounded-full bg-[#DA4139]/30"></div>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-[5px] text-gray-300">
                    Dokumentasi Kegiatan Groovy Archery
                </span>
            </div>

            {{-- Heading --}}
            <h1 class="hero-fade hero-delay-1 font-extrabold leading-[1.05] text-white mb-8"
                style="font-size: clamp(2.5rem, 6vw, 5rem);">
                Gallery<br>
                <span class="relative inline-block">
                    Groovy 
                    <svg class="absolute -bottom-2 left-0 w-full" height="6" viewBox="0 0 200 2">
                        <line x1="0" y1="4" x2="200" y2="4" stroke="#DA4139" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </span><br>
                Archery
            </h1>

            {{-- Deskripsi --}}
            <p class="hero-fade hero-delay-2 text-gray-300 text-base md:text-lg leading-relaxed font-light max-w-xl mb-12">
                Jelajahi momen-momen berharga dari latihan, kompetisi, dan kegiatan komunitas kami. Setiap foto adalah cerita tentang semangat, persahabatan, dan kecintaan pada panahan.
            </p>

            {{-- CTA Buttons --}}
            <div class="hero-fade hero-delay-3 flex flex-wrap items-center gap-4">
                <button onclick="openDaftarModal()"
                        class="group relative inline-flex items-center gap-3 px-8 py-4
                               bg-[#DA4139] text-white font-bold text-sm
                               hover:bg-[#c13530] transition-all duration-300 overflow-hidden">
                    <span class="relative z-10">Daftar Sekarang</span>
                    <svg class="relative z-10 w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                    <div class="absolute inset-0 bg-white/10 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-300"></div>
                </button>

                <a href="#gallery"
                   class="group inline-flex items-center gap-3 px-8 py-4 border border-white/30
                          text-white font-bold text-sm hover:border-white hover:bg-white/10
                          transition-all duration-300">
                    <span>Lihat Dokumentasi</span>
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            {{-- Stats kecil di bawah --}}
            <div class="hero-fade hero-delay-4 flex flex-wrap gap-10 mt-16 pt-10 border-t border-white/10">
                @foreach([['3', 'Lokasi Latihan'], ['9', 'Tahun Berdiri'], ['100+', 'Atlet Aktif']] as [$num, $label])
                <div>
                    <p class="text-2xl font-extrabold text-white">{{ $num }}</p>
                    <p class="text-xs text-gray-400 font-medium mt-0.5 uppercase tracking-wider">{{ $label }}</p>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center gap-2 hero-fade hero-delay-4">
        <span class="text-[10px] text-gray-400 uppercase tracking-widest">Scroll</span>
        <div class="w-px h-12 bg-gradient-to-b from-gray-400 to-transparent scroll-line"></div>
    </div>

</section>

<style>
.hero-img {
    transform: scale(1.05);
    transition: transform 8s ease;
}
.hero-img.loaded {
    transform: scale(1);
}

.hero-fade {
    opacity: 0;
    transform: translateY(24px);
    animation: heroIn 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}
.hero-delay-1 { animation-delay: 0.15s; }
.hero-delay-2 { animation-delay: 0.3s; }
.hero-delay-3 { animation-delay: 0.45s; }
.hero-delay-4 { animation-delay: 0.6s; }

@keyframes heroIn {
    to { opacity: 1; transform: translateY(0); }
}

.scroll-line {
    animation: scrollPulse 2s ease-in-out infinite;
}
@keyframes scrollPulse {
    0%, 100% { opacity: 0.3; transform: scaleY(0.8); transform-origin: top; }
    50% { opacity: 1; transform: scaleY(1); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const img = document.querySelector('.hero-img');
    if (img) {
        img.onload = () => img.classList.add('loaded');
        if (img.complete) img.classList.add('loaded');
    }
});
</script>