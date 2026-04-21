{{-- ═══ GALLERY GRID ═══ --}}

@php
$photos = [
    [
        'src'      => 'assets/Kejurnas Junior.jpeg',
        'judul'    => 'Kejurnas Junior 2024',
        'desk'     => 'Tim junior Groovy Archery tampil membanggakan di kejuaraan nasional.',
        'kategori' => 'kompetisi',
        'ukuran'   => 'tall',
        'tag'      => 'Kompetisi',
    ],
    [
        'src'      => 'assets/Latihan Rutin - Lapangan Sunter.jpeg',
        'judul'    => 'Latihan Rutin Lapangan Sunter',
        'desk'     => 'Sesi latihan pagi hari di Lapangan GRTP Sunter Mall setiap Sabtu dan Minggu.',
        'kategori' => 'latihan',
        'ukuran'   => 'wide',
        'tag'      => 'Latihan',
    ],
    [
        'src'      => 'assets/champion.jpeg',
        'judul'    => 'Momen Juara',
        'desk'     => 'Kebanggaan membawa pulang trofi kejuaraan. Hasil dari kerja keras panjang.',
        'kategori' => 'kompetisi',
        'ukuran'   => 'normal',
        'tag'      => 'Kompetisi',
    ],
    [
        'src'      => 'assets/sunnaharchery.jpeg',
        'judul'    => 'Sunnah Archery Event',
        'desk'     => 'Event memanah berbasis sunnah yang mempertemukan komunitas pemanah muslim.',
        'kategori' => 'event',
        'ukuran'   => 'normal',
        'tag'      => 'Event',
    ],
    [
        'src'      => 'assets/athletesimage.png',
        'judul'    => 'Foto Tim Lengkap',
        'desk'     => 'Kebersamaan adalah kunci. Seluruh anggota Groovy Archery siap berprestasi.',
        'kategori' => 'team',
        'ukuran'   => 'normal',
        'tag'      => 'Team',
    ],
    [
        'src'      => 'assets/Kejurnas Junior 2.jpeg',
        'judul'    => 'Kejurnas Junior Seri 2',
        'desk'     => 'Atlet junior kembali bersaing di seri kedua kejuaraan nasional.',
        'kategori' => 'kompetisi',
        'ukuran'   => 'tall',
        'tag'      => 'Kompetisi',
    ],
    [
        'src'      => 'assets/latihanrutin1.jpeg',
        'judul'    => 'Latihan Rutin Mingguan',
        'desk'     => 'Konsistensi adalah kunci. Latihan rutin setiap minggu tanpa libur.',
        'kategori' => 'latihan',
        'ukuran'   => 'wide',
        'tag'      => 'Latihan',
    ],
    [
        'src'      => 'assets/training-1.jpeg',
        'judul'    => 'Training Session',
        'desk'     => 'Sesi pelatihan teknik bersama coach berpengalaman.',
        'kategori' => 'latihan',
        'ukuran'   => 'normal',
        'tag'      => 'Latihan',
    ],
    [
        'src'      => 'assets/pialapanglima.png',
        'judul'    => 'Piala Panglima',
        'desk'     => 'Partisipasi tim Groovy Archery di ajang bergengsi Piala Panglima.',
        'kategori' => 'kompetisi',
        'ukuran'   => 'normal',
        'tag'      => 'Kompetisi',
    ],
    [
        'src'      => 'assets/gambar-1.png',
        'judul'    => 'Dokumentasi Latihan',
        'desk'     => 'Momen sehari-hari dalam proses latihan yang penuh dedikasi.',
        'kategori' => 'latihan',
        'ukuran'   => 'normal',
        'tag'      => 'Latihan',
    ],
    [
        'src'      => 'assets/gambar-2.png',
        'judul'    => 'Team Building',
        'desk'     => 'Membangun kekompakan antar anggota tim untuk performa terbaik.',
        'kategori' => 'team',
        'ukuran'   => 'normal',
        'tag'      => 'Team',
    ],
    [
        'src'      => 'assets/gambar-3.png',
        'judul'    => 'Groovy Archery Squad',
        'desk'     => 'Generasi emas Groovy Archery siap mengharumkan nama Jakarta Utara.',
        'kategori' => 'team',
        'ukuran'   => 'wide',
        'tag'      => 'Team',
    ],
];
@endphp

<section class="bg-gray-50 px-6 py-16">
    <div class="max-w-7xl mx-auto">

        {{-- Masonry Grid --}}
        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4" id="glryGrid">

            @foreach($photos as $i => $p)
            <div class="glry-item break-inside-avoid mb-4 group relative overflow-hidden
                        rounded-2xl cursor-pointer shadow-sm hover:shadow-xl
                        transition-shadow duration-300"
                 data-kategori="{{ $p['kategori'] }}"
                 data-index="{{ $i }}"
                 onclick="openLightbox({{ $i }})"
                 style="animation-delay:{{ $i * 50 }}ms">

                <div class="relative overflow-hidden rounded-2xl
                            {{ $p['ukuran'] === 'tall' ? 'aspect-[3/5]' : ($p['ukuran'] === 'wide' ? 'aspect-[16/9]' : 'aspect-[4/3]') }}">

                    {{-- Foto --}}
                    <img src="{{ asset($p['src']) }}"
                         alt="{{ $p['judul'] }}"
                         loading="lazy"
                         class="w-full h-full object-cover transition-all duration-700
                                group-hover:scale-110">

                    {{-- Overlay: muncul saat hover --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent
                                opacity-0 group-hover:opacity-100 transition-opacity duration-400"></div>

                    {{-- Tag kategori --}}
                    <div class="absolute top-3 left-3 z-10
                                opacity-0 group-hover:opacity-100 transition-all duration-300
                                translate-y-2 group-hover:translate-y-0">
                        <span class="bg-[#2b459a] text-white text-[9px] font-black uppercase
                                     tracking-[3px] px-3 py-1.5 rounded-full">
                            {{ $p['tag'] }}
                        </span>
                    </div>

                    {{-- Tombol expand --}}
                    <div class="absolute top-3 right-3 z-10
                                opacity-0 group-hover:opacity-100 transition-all duration-300
                                translate-y-2 group-hover:translate-y-0">
                        <div class="w-8 h-8 bg-white/20 backdrop-blur-sm border border-white/30
                                    rounded-full flex items-center justify-center hover:bg-white/40">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                            </svg>
                        </div>
                    </div>

                    {{-- Judul + Deskripsi: slide naik dari bawah saat hover --}}
                    <div class="absolute bottom-0 left-0 right-0 p-4 z-10
                                translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100
                                transition-all duration-400">
                        <h3 class="text-white font-black text-sm leading-tight mb-1
                                   [text-shadow:0_2px_8px_rgba(0,0,0,0.8)]">
                            {{ $p['judul'] }}
                        </h3>
                        <p class="text-white/70 text-[11px] leading-snug font-light line-clamp-2
                                  [text-shadow:0_1px_4px_rgba(0,0,0,0.8)]">
                            {{ $p['desk'] }}
                        </p>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        {{-- Empty state --}}
        <div id="glryEmpty" class="hidden text-center py-24">
            <p class="text-gray-300 text-5xl mb-4">🎯</p>
            <p class="text-gray-400 font-black uppercase tracking-widest text-sm">Tidak ada foto di kategori ini</p>
        </div>

        {{-- Load More --}}
        <div class="text-center mt-16">
            <button id="glryLoadMore"
                    class="group inline-flex items-center gap-3 px-8 py-4
                           border-2 border-gray-200 text-gray-400 font-black text-xs
                           uppercase tracking-widest rounded-full hover:border-[#2b459a]
                           hover:text-[#2b459a] transition-all duration-300">
                <svg class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Muat Lebih Banyak
            </button>
        </div>

    </div>
</section>

<style>
.glry-item {
    opacity: 0;
    transform: translateY(16px);
    animation: glryItemIn 0.6s cubic-bezier(.22,1,.36,1) forwards;
}
@keyframes glryItemIn {
    to { opacity:1; transform:translateY(0); }
}
.glry-item.hidden-item { display: none; }
</style>

<script>
window.glryData = @json($photos);

// Filter
document.querySelectorAll('.glry-filter').forEach(btn => {
    btn.addEventListener('click', () => {
        const filter = btn.dataset.glryFilter;

        document.querySelectorAll('.glry-filter').forEach(b => {
            b.classList.remove('bg-[#2b459a]', 'text-white', 'border-[#2b459a]');
            b.classList.add('bg-white', 'text-gray-400', 'border-gray-200');
        });
        btn.classList.add('bg-[#2b459a]', 'text-white', 'border-[#2b459a]');
        btn.classList.remove('bg-white', 'text-gray-400', 'border-gray-200');

        const items = document.querySelectorAll('.glry-item');
        let visible = 0;
        items.forEach(item => {
            const match = filter === 'all' || item.dataset.kategori === filter;
            if (match) {
                item.classList.remove('hidden-item');
                item.style.animation = 'none';
                item.offsetHeight;
                item.style.animation = 'glryItemIn 0.5s cubic-bezier(.22,1,.36,1) forwards';
                visible++;
            } else {
                item.classList.add('hidden-item');
            }
        });

        document.getElementById('glryCount').textContent = visible + ' Foto';
        document.getElementById('glryEmpty').classList.toggle('hidden', visible > 0);
    });
});

// Load More
document.getElementById('glryLoadMore')?.addEventListener('click', function () {
    this.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg> Memuat...`;
    setTimeout(() => {
        this.textContent = 'Semua foto sudah ditampilkan ✓';
        this.disabled = true;
        this.classList.add('opacity-30', 'cursor-default');
    }, 1500);
});
</script>