{{-- ═══════════════════════ VISI MISI HEADER ═══════════════════════ --}}
<section class="text-center pb-10 px-6 transition-colors duration-300">
    {{-- Tambahkan dark:text-blue-400 agar label kecil tetap kontras --}}
    <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Visi dan Misi</p>
    
    {{-- PENTING: Tambahkan dark:text-white --}}
    <h2 class="text-4xl md:text-5xl font-bold mb-3 text-gray-900 dark:text-white">Mengapa Kami Ada?</h2>
    
    {{-- Tambahkan dark:text-gray-500 --}}
    <p class="text-gray-400 dark:text-gray-500 text-sm">Kami hadir dengan tujuan.</p>
</section>

{{-- ═══════════════════════ VISI MISI CARDS ═══════════════════════ --}}
<section class="max-w-7xl mx-auto px-6 pb-28 grid md:grid-cols-2 gap-6">
    {{-- Card Visi --}}
    <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg group">
        <img src="{{ asset('assets/image 1.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        
        {{-- Overlay Gradient - Gunakan dark:from-slate-900/95 agar lebih menyatu dengan tema gelap --}}
        <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 dark:from-slate-900/95 via-[#1e2a78]/30 dark:via-slate-900/30 to-transparent"></div>
        
        <div class="absolute inset-x-0 bottom-0 p-12 text-white">
            <p class="text-[10px] mb-3 opacity-50 uppercase tracking-[5px]">Groovy Archery</p>
            <h3 class="text-5xl font-bold mb-5">Visi</h3>
            <p class="text-base font-light leading-relaxed text-white/80 max-w-sm">
                Melalui olahraga panahan menciptakan atlet-atlet panahan yang berprestasi dan berakhlakul karimah.
            </p>
            <div class="vismis-underline mt-6 bg-white/30"></div>
        </div>
    </div>

    {{-- Card Misi --}}
    <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg group">
        <img src="{{ asset('assets/champion.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        
        {{-- Overlay Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 dark:from-slate-900/95 via-[#1e2a78]/30 dark:via-slate-900/30 to-transparent"></div>
        
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
            <div class="vismis-underline mt-6 bg-white/30"></div>
        </div>
    </div>
</section>