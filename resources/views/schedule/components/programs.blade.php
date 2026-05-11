{{-- ═══ PROGRAM ═══ --}}
<section class="py-26 px-6 mb-35" style="background: #fff;">
    <div class="max-w-6xl mx-auto">

        {{-- Label header --}}
       <div class="py-16 text-center transition-colors duration-300">
            <p class="text-[#2b459a] dark:text-blue-400 font-bold uppercase tracking-[5px] text-[10px]">Program</p>
            <h2 class="text-4xl md:text-5xl font-bold mt-2 text-gray-900 dark:text-white">Program Latihan</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-4 text-sm max-w-md mx-auto">Pilih program latihan yang paling sesuai dengan kebutuhan dan tujuanmu</p>
        </div>

        {{-- Card utama bergaya flyer --}}
        <div class="overflow-hidden shadow-2xl"
             style="background: linear-gradient(135deg, #1a1060 0%, #2b1d8a 40%, #4f3fd4 100%);">

            {{-- Baris atas: program + biaya daftar --}}
            <div class="grid lg:grid-cols-3 gap-0">

                {{-- Kiri: Program Regular & Intensif --}}
                <div class="lg:col-span-2 p-8 md:p-10">

                    {{-- Label kuning seperti flyer --}}
                    <div class="inline-flex items-center gap-2 px-5 py-2.5 mb-8"
                         style="background: #ffff;">
                        <span class="text-gray-900 font-black text-sm md:text-base">
                            Pilih Program Sesuai Kebutuhanmu
                        </span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">

                        {{-- Regular --}}
                        <div class="program-card group p-7 border-2 border-white/15
                                    cursor-pointer transition-all duration-300 hover:-translate-y-1"
                             style="background: rgba(255,255,255,0.95);"
                             onclick="selectProgram(this, 'Regular')">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-[10px] font-black uppercase tracking-[3px]"
                                      style="color: #3d2db5;">Program Regular</span>
                                <span class="text-[10px] font-black uppercase tracking-[2px] px-2.5 py-1 rounded-full"
                                      style="background: rgba(61,45,181,0.1); color: #3d2db5;">2× / minggu</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-3 font-medium">Regular (2× Seminggu)</p>
                            <p class="text-2xl font-black" style="color: #1a1060;">Rp 300.000</p>
                            <p class="text-gray-400 text-xs mt-2 font-medium">per bulan</p>

                            {{-- Check indicator --}}
                            <div class="program-check mt-4 w-6 h-6 rounded-full border-2 border-gray-200
                                        flex items-center justify-center transition-all duration-200">
                                <svg class="w-3.5 h-3.5 text-white hidden" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Intensif --}}
                        <div class="program-card group p-7 border-2 border-yellow-400
                                    cursor-pointer transition-all duration-300 hover:-translate-y-1 relative"
                             style="background: rgba(255,255,255,0.95);"
                             onclick="selectProgram(this, 'Intensif')">
                            <div class="absolute -top-3 left-5 bg-yellow-400 text-gray-900 text-[9px]
                                        font-black uppercase tracking-widest px-4 py-1">
                                Paling Populer
                            </div>
                            <div class="flex items-center justify-between mb-4 mt-2">
                                <span class="text-[10px] font-black uppercase tracking-[3px]"
                                      style="color: #3d2db5;">Program Intensif</span>
                                <span class="text-[10px] font-black uppercase tracking-[2px] px-2.5 py-1 rounded-full"
                                      style="background: rgba(251,191,36,0.15); color: #92400e;">4× / minggu</span>
                            </div>
                            <p class="text-gray-700 text-sm mb-3 font-medium">Intensif (4× Seminggu)</p>
                            <p class="text-2xl font-black" style="color: #1a1060;">Rp 550.000</p>
                            <p class="text-gray-400 text-xs mt-2 font-medium">per bulan</p>

                            <div class="program-check mt-4 w-6 h-6 rounded-full border-2 border-yellow-400
                                        flex items-center justify-center transition-all duration-200">
                                <svg class="w-3.5 h-3.5 text-white hidden" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Kanan: Biaya pendaftaran --}}
                <div class="relative flex flex-col items-center justify-center p-8 text-center
                            border-t lg:border-t-0 lg:border-l border-white/10">

                    {{-- Kartu putih biaya --}}
                    <div class="px-8 py-6 w-full max-w-xs mt-6" style="background: rgba(255,255,255,0.95);">
                        <p class="text-gray-500 text-sm font-medium mb-1">Hanya</p>
                        <div class="flex items-baseline gap-1 justify-center">
                            <span class="text-xl font-bold text-gray-700">Rp</span>
                            <span class="font-black leading-none" style="font-size: 3.5rem; color: #1a1060;">200.000</span>
                        </div>
                        <p class="text-gray-400 text-xs mt-2 font-medium">biaya pendaftaran</p>
                    </div>

                    <button onclick="openDaftarModal()"
                            class="mt-6 w-full max-w-xs py-3.5 font-black text-sm text-gray-900
                                   transition-all duration-200 hover:brightness-110 active:scale-[.98]"
                            style="background: #fff;">
                        Daftar Sekarang 
                    </button>
                </div>

            </div>

            {{-- Baris bawah: fitur program --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0 border-t border-white/10">
                @foreach([
                    ['🎯', 'Instruktur Berpengalaman', 'Dibimbing coach dengan track record kompetisi nasional'],
                    ['📍', '3 Lokasi Tersedia', 'Pilih lokasi yang paling mudah dijangkau dari rumahmu'],
                    ['📅', 'Jadwal Fleksibel', 'Tersedia pagi dan sore hari, weekday maupun weekend'],
                ] as [$ic, $title, $desc])
                <div class="px-8 py-7 border-b md:border-b-0 md:border-r border-white/10 last:border-0">
                    <div class="text-2xl mb-3">{{ $ic }}</div>
                    <h4 class="text-white font-bold text-sm mb-1.5">{{ $title }}</h4>
                    <p class="text-white/40 text-xs leading-relaxed font-light">{{ $desc }}</p>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

<style>
.program-card.selected {
    border-color: #fbbf24 !important;
    box-shadow: 0 0 0 4px rgba(251,191,36,0.2);
    transform: translateY(-4px);
}
.program-card.selected .program-check {
    background: #fbbf24;
    border-color: #fbbf24;
}
.program-card.selected .program-check svg { display: block; }
</style>

<script>
function selectProgram(el, name) {
    document.querySelectorAll('.program-card').forEach(c => c.classList.remove('selected'));
    el.classList.add('selected');
}
</script>