{{-- ═══════════════════════ FAQ ═══════════════════════ --}}
<section class="py-24 px-6 bg-white" id="faq">
    <div class="max-w-4xl mx-auto">

        {{-- Header --}}
        <div class="text-center mb-10 md:mb-14">
        <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">FAQ</p>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">Pertanyaan yang Sering Diajukan</h2>
        <p class="text-gray-400 dark:text-gray-500 text-sm">Temukan jawaban atas pertanyaan umum tentang program, jadwal, dan cara bergabung di Groovy Archery.</p>
    </div>

        {{-- FAQ Items --}}
        <div class="space-y-3" id="faqList">

            @php
            $faqs = [
                [
                    'q' => 'Apakah saya perlu pengalaman memanah sebelumnya untuk bergabung?',
                    'a' => 'Tidak sama sekali! Program kami dirancang untuk semua tingkatan, mulai dari pemula yang belum pernah memegang busur hingga atlet yang ingin meningkatkan teknik. Coach kami akan membimbing kamu dari awal dengan sabar dan terstruktur.',
                ],
                [
                    'q' => 'Berapa biaya pendaftaran dan iuran bulanannya?',
                    'a' => 'Biaya pendaftaran awal adalah Rp 200.000 (satu kali). Untuk iuran bulanan, tersedia dua program: Program Regular (2× seminggu) Rp 300.000/bulan, dan Program Intensif (4× seminggu) Rp 550.000/bulan. Peralatan dasar disediakan oleh club.',
                ],
                [
                    'q' => 'Di mana saja lokasi latihannya?',
                    'a' => 'Kami memiliki 3 lokasi latihan di Jakarta Utara: Lapangan GRTP Sunter Mall (Sabtu–Minggu), Lapangan BMW JIS (Selasa, Rabu, Kamis + Sabtu–Minggu), dan Lapangan Tembak Yon Arhanud (Senin & Jumat). Kamu bisa memilih lokasi yang paling dekat dan nyaman.',
                ],
                [
                    'q' => 'Apakah ada batasan usia untuk bergabung?',
                    'a' => 'Groovy Archery terbuka untuk semua usia! Kami memiliki program untuk anak-anak (mulai usia 7 tahun), remaja, dan dewasa. Terdapat kategori Junior (di bawah 18 tahun) dan Senior, dengan pendekatan pelatihan yang disesuaikan untuk masing-masing kelompok.',
                ],
                [
                    'q' => 'Apakah saya harus membeli peralatan sendiri?',
                    'a' => 'Untuk awal, tidak perlu! Club menyediakan peralatan dasar (busur dan anak panah) untuk digunakan selama latihan. Setelah beberapa bulan berlatih dan yakin ingin serius, barulah kami rekomendasikan untuk memiliki peralatan pribadi agar lebih optimal.',
                ],
                [
                    'q' => 'Bagaimana cara mendaftar?',
                    'a' => 'Caranya mudah! Klik tombol "Daftar" di halaman ini, isi formulir dengan nama, umur, program yang dipilih, dan lokasi latihan yang diinginkan. Setelah submit, kamu akan langsung diarahkan ke WhatsApp kami untuk konfirmasi jadwal dan pembayaran.',
                ],
                [
                    'q' => 'Apakah ada kompetisi yang bisa diikuti?',
                    'a' => 'Ya! Groovy Archery aktif berpartisipasi di berbagai kompetisi tingkat regional dan nasional. Atlet yang sudah siap akan dibimbing untuk mengikuti turnamen resmi. Kami bangga telah mencetak atlet-atlet berprestasi yang mengharumkan nama Jakarta Utara.',
                ],
            ];
            @endphp

            @foreach($faqs as $i => $faq)
            <div class="faq-item border border-gray-100 rounded-2xl overflow-hidden
                        hover:border-[#2b459a]/20 hover:shadow-sm transition-all duration-300"
                 data-index="{{ $i }}">

                {{-- Pertanyaan (trigger) --}}
                <button class="faq-trigger w-full flex items-center justify-between gap-4
                               px-7 py-5 text-left group"
                        onclick="toggleFaq({{ $i }})">
                    <span class="flex items-center gap-4">
                        <span class="text-[10px] font-black text-[#2b459a] opacity-50 shrink-0 w-5">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <span class="text-sm md:text-base font-bold text-gray-800 group-hover:text-[#2b459a]
                                     transition-colors duration-200 leading-snug">
                            {{ $faq['q'] }}
                        </span>
                    </span>

                    {{-- Icon + / × --}}
                    <span class="faq-icon shrink-0 w-8 h-8 rounded-full flex items-center justify-center
                                 border-2 border-gray-100 transition-all duration-300
                                 group-hover:border-[#2b459a]/30">
                        <svg class="faq-plus w-4 h-4 text-gray-400 transition-all duration-300"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        <svg class="faq-minus w-4 h-4 text-[#2b459a] hidden transition-all duration-300"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4"/>
                        </svg>
                    </span>
                </button>

                {{-- Jawaban (collapsible) --}}
                <div class="faq-answer overflow-hidden transition-all duration-400 ease-in-out"
                     style="max-height: 0;">
                    <div class="px-7 pb-6 pt-1 flex gap-4">
                        <div class="w-5 shrink-0"></div>{{-- spacer align dengan teks pertanyaan --}}
                        <p class="text-gray-500 text-sm leading-relaxed">
                            {{ $faq['a'] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

<style>
/* Smooth expand / collapse */
.faq-answer {
    transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                opacity    0.3s ease;
    opacity: 0;
}
.faq-item.open .faq-answer {
    opacity: 1;
}

/* Active state styling */
.faq-item.open {
    border-color: rgba(43, 69, 154, 0.2) !important;
    box-shadow: 0 4px 20px rgba(43, 69, 154, 0.06);
}
.faq-item.open .faq-trigger .text-gray-800 {
    color: #2b459a;
}
.faq-item.open .faq-icon {
    background: rgba(43, 69, 154, 0.06);
    border-color: rgba(43, 69, 154, 0.25) !important;
}
.faq-item.open .faq-plus  { display: none; }
.faq-item.open .faq-minus { display: block; }
</style>

<script>
(function () {
    // Hitung tinggi konten tiap jawaban saat halaman load
    function getAnswerHeight(item) {
        const ans = item.querySelector('.faq-answer');
        const inner = ans.querySelector('div');
        return inner ? inner.offsetHeight : 0;
    }

    function toggleFaq(index) {
        const items = document.querySelectorAll('.faq-item');
        const target = items[index];
        const isOpen = target.classList.contains('open');

        // Tutup semua (accordion behaviour)
        items.forEach(item => {
            item.classList.remove('open');
            item.querySelector('.faq-answer').style.maxHeight = '0';
        });

        // Buka target kalau sebelumnya tertutup
        if (!isOpen) {
            target.classList.add('open');
            const ans = target.querySelector('.faq-answer');
            ans.style.maxHeight = getAnswerHeight(target) + 'px';
        }
    }

    // Pasang ke window supaya bisa dipanggil dari onclick="" di Blade
    window.toggleFaq = toggleFaq;
})();
</script>