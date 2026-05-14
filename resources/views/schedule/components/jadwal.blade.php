{{-- ═══ JADWAL INTERAKTIF ═══ --}}
<section id="jadwal" class="py-24 px-6 dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-6xl mx-auto">

        <div class="py-16 text-center transition-colors duration-300">
            <p class="text-[#2b459a] dark:text-blue-400 font-bold uppercase tracking-[5px] text-[10px]">Jadwal</p>
            <h2 class="text-4xl md:text-5xl font-bold mt-2 text-gray-900 dark:text-white">Jadwal Latihan</h2>
            <p class="text-gray-500 dark:text-slate-400 mt-4 text-sm max-w-md mx-auto">Pilih jadwal latihan yang paling sesuai dengan kebutuhan dan tujuanmu</p>
        </div>

        {{-- Filter Pills --}}
        <div class="flex flex-wrap justify-center gap-2.5 mb-10">
            <button data-filter="all"
                    class="sched-pill active flex items-center gap-2 px-5 py-2.5 text-xs font-black
                           uppercase tracking-widest border-2 transition-all duration-200
                           text-white border-transparent"
                    style="background: linear-gradient(135deg, #3d2db5, #4f3fd4);">
                <span class="w-2 h-2 rounded-full bg-white/60"></span> Semua Lokasi
            </button>
            <button data-filter="grtp"
                    class="sched-pill flex items-center gap-2 px-5 py-2.5 text-xs font-black
                           uppercase tracking-widest border-2 transition-all duration-200
                           border-gray-100 dark:border-slate-700
                           bg-white dark:bg-slate-800
                           text-gray-500 dark:text-slate-400
                           hover:border-indigo-300 hover:text-indigo-600
                           dark:hover:border-indigo-500 dark:hover:text-indigo-400">
                <span class="w-2 h-2 rounded-full bg-indigo-500"></span> GRTP Sunter
            </button>
            <button data-filter="bmw"
                    class="sched-pill flex items-center gap-2 px-5 py-2.5 text-xs font-black
                           uppercase tracking-widest border-2 transition-all duration-200
                           border-gray-100 dark:border-slate-700
                           bg-white dark:bg-slate-800
                           text-gray-500 dark:text-slate-400
                           hover:border-emerald-300 hover:text-emerald-600
                           dark:hover:border-emerald-500 dark:hover:text-emerald-400">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span> BMW JIS
            </button>
            <button data-filter="yon"
                    class="sched-pill flex items-center gap-2 px-5 py-2.5 text-xs font-black
                           uppercase tracking-widest border-2 transition-all duration-200
                           border-gray-100 dark:border-slate-700
                           bg-white dark:bg-slate-800
                           text-gray-500 dark:text-slate-400
                           hover:border-amber-300 hover:text-amber-600
                           dark:hover:border-amber-500 dark:hover:text-amber-400">
                <span class="w-2 h-2 rounded-full bg-amber-500"></span> Yon Arhanud
            </button>
        </div>

        {{-- Tabel Jadwal --}}
        <div class="overflow-x-auto border border-gray-100 dark:border-slate-700 shadow-sm">
            <div class="min-w-[640px]">

                {{-- Header hari --}}
                <div class="grid border-b border-gray-100 dark:border-slate-700"
                     style="grid-template-columns: 130px repeat(7,1fr);">
                    <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800 text-[10px] font-black text-gray-300 dark:text-slate-500 uppercase tracking-widest">
                        Lokasi
                    </div>
                    @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $i => $day)
                    <div class="px-2 py-4 text-center bg-gray-50 dark:bg-slate-800 border-l border-gray-100 dark:border-slate-700">
                        <span class="text-[10px] font-black uppercase tracking-wider text-gray-500 dark:text-slate-400">{{ $day }}</span>
                        @if(in_array($day, ['Sab','Min']))
                        <div class="w-1 h-1 rounded-full bg-indigo-300 dark:bg-indigo-500 mx-auto mt-1"></div>
                        @endif
                    </div>
                    @endforeach
                </div>

                {{-- GRTP --}}
                <div class="sched-row grid items-stretch border-b border-gray-100 dark:border-slate-700 transition-all duration-300 bg-white dark:bg-slate-900"
                     data-lokasi="grtp" style="grid-template-columns: 130px repeat(7,1fr);">
                    <div class="px-5 py-5 border-r border-gray-100 dark:border-slate-700 flex flex-col justify-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                        <span class="text-[10px] font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-wider leading-tight">GRTP<br>Sunter</span>
                    </div>
                    @foreach(['Sen','Sel','Rab','Kam','Jum'] as $d)
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-5 flex items-center justify-center">
                        <span class="text-gray-200 dark:text-slate-700 text-xs font-bold">—</span>
                    </div>
                    @endforeach
                    {{-- Sabtu --}}
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-4 flex flex-col gap-1.5 justify-center"
                         style="background: rgba(99,102,241,0.03);">
                        <div class="px-2 py-2 text-center" style="background: rgba(99,102,241,0.1);">
                            <p class="text-[10px] font-black text-indigo-700 dark:text-indigo-300 !text-indigo-700 dark:!text-indigo-300">08.00–10.00</p>
                            <p class="text-[9px] text-indigo-400 mt-0.5 !text-indigo-400">Sesi 1</p>
                        </div>
                        <div class="px-2 py-2 text-center" style="background: rgba(99,102,241,0.07);">
                            <p class="text-[10px] font-black text-indigo-600 dark:text-indigo-400 !text-indigo-600 dark:!text-indigo-400">10.00–12.00</p>
                            <p class="text-[9px] text-indigo-300 mt-0.5 !text-indigo-300">Sesi 2</p>
                        </div>
                    </div>
                    {{-- Minggu --}}
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-4 flex flex-col gap-1.5 justify-center"
                         style="background: rgba(99,102,241,0.03);">
                        <div class="px-2 py-2 text-center" style="background: rgba(99,102,241,0.1);">
                            <p class="text-[10px] font-black text-indigo-700 dark:text-indigo-300 !text-indigo-700 dark:!text-indigo-300">08.00–10.00</p>
                            <p class="text-[9px] text-indigo-400 mt-0.5 !text-indigo-400">Sesi 1</p>
                        </div>
                        <div class="px-2 py-2 text-center" style="background: rgba(99,102,241,0.07);">
                            <p class="text-[10px] font-black text-indigo-600 dark:text-indigo-400 !text-indigo-600 dark:!text-indigo-400">10.00–12.00</p>
                            <p class="text-[9px] text-indigo-300 mt-0.5 !text-indigo-300">Sesi 2</p>
                        </div>
                    </div>
                </div>

                {{-- BMW JIS --}}
                <div class="sched-row grid items-stretch border-b border-gray-100 dark:border-slate-700 transition-all duration-300 bg-white dark:bg-slate-900"
                     data-lokasi="bmw" style="grid-template-columns: 130px repeat(7,1fr);">
                    <div class="px-5 py-5 border-r border-gray-100 dark:border-slate-700 flex flex-col justify-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-[10px] font-black text-emerald-600 dark:text-emerald-400 uppercase tracking-wider leading-tight">BMW<br>JIS</span>
                    </div>
                    {{-- Senin --}}
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-5 flex items-center justify-center">
                        <span class="text-gray-200 dark:text-slate-700 text-xs font-bold">—</span>
                    </div>
                    {{-- Sel Rab Kam --}}
                    @foreach(['Sel','Rab','Kam'] as $d)
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-4 flex items-center justify-center"
                         style="background: rgba(16,185,129,0.02);">
                        <div class="px-2 py-2 text-center w-full" style="background: rgba(16,185,129,0.1);">
                            <p class="text-[10px] font-black text-emerald-700 dark:text-emerald-300 !text-emerald-700 dark:!text-emerald-300">15.30–18.00</p>
                            <p class="text-[9px] text-emerald-400 mt-0.5 !text-emerald-400">Sore</p>
                        </div>
                    </div>
                    @endforeach
                    {{-- Jumat --}}
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-5 flex items-center justify-center">
                        <span class="text-gray-200 dark:text-slate-700 text-xs font-bold">—</span>
                    </div>
                    {{-- Sab Min --}}
                    @foreach(['Sab','Min'] as $d)
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-4 flex items-center justify-center"
                         style="background: rgba(16,185,129,0.02);">
                        <div class="px-2 py-2 text-center w-full" style="background: rgba(16,185,129,0.1);">
                            <p class="text-[10px] font-black text-emerald-700 dark:text-emerald-300 !text-emerald-700 dark:!text-emerald-300">07.00–10.00</p>
                            <p class="text-[9px] text-emerald-400 mt-0.5 !text-emerald-400">Pagi</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Yon Arhanud --}}
                <div class="sched-row grid items-stretch transition-all duration-300 bg-white dark:bg-slate-900"
                     data-lokasi="yon" style="grid-template-columns: 130px repeat(7,1fr);">
                    <div class="px-5 py-5 border-r border-gray-100 dark:border-slate-700 flex flex-col justify-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span class="text-[10px] font-black text-amber-600 dark:text-amber-400 uppercase tracking-wider leading-tight">Yon<br>Arhanud</span>
                    </div>
                    {{-- Senin --}}
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-4 flex items-center justify-center"
                         style="background: rgba(245,158,11,0.02);">
                        <div class="px-2 py-2 text-center w-full" style="background: rgba(245,158,11,0.1);">
                            <p class="text-[10px] font-black text-amber-700 dark:text-amber-300 !text-amber-700 dark:!text-amber-300">16.00–17.30</p>
                            <p class="text-[9px] text-amber-400 mt-0.5 !text-amber-400">Sore</p>
                        </div>
                    </div>
                    {{-- Sel Rab Kam --}}
                    @foreach(['Sel','Rab','Kam'] as $d)
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-5 flex items-center justify-center">
                        <span class="text-gray-200 dark:text-slate-700 text-xs font-bold">—</span>
                    </div>
                    @endforeach
                    {{-- Jumat --}}
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-4 flex items-center justify-center"
                         style="background: rgba(245,158,11,0.02);">
                        <div class="px-2 py-2 text-center w-full" style="background: rgba(245,158,11,0.1);">
                            <p class="text-[10px] font-black text-amber-700 dark:text-amber-300 !text-amber-700 dark:!text-amber-300">16.00–17.30</p>
                            <p class="text-[9px] text-amber-400 mt-0.5 !text-amber-400">Sore</p>
                        </div>
                    </div>
                    {{-- Sab Min --}}
                    @foreach(['Sab','Min'] as $d)
                    <div class="border-l border-gray-100 dark:border-slate-700 px-2 py-5 flex items-center justify-center">
                        <span class="text-gray-200 dark:text-slate-700 text-xs font-bold">—</span>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

        {{-- Legend --}}
        <div class="flex flex-wrap items-center justify-between gap-4 mt-8">
            <div class="flex flex-wrap gap-6">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-indigo-500"></div>
                    <span class="text-xs text-gray-400 dark:text-slate-500 font-semibold !text-gray-400 dark:!text-slate-500">GRTP Sunter Mall</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                    <span class="text-xs text-gray-400 dark:text-slate-500 font-semibold !text-gray-400 dark:!text-slate-500">BMW JIS</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                    <span class="text-xs text-gray-400 dark:text-slate-500 font-semibold !text-gray-400 dark:!text-slate-500">Yon Arhanud</span>
                </div>
            </div>
            <div class="flex items-center gap-1.5 px-4 py-2 dark:bg-indigo-900/20"
                 style="background: rgba(61,45,181,0.06);">
                <div class="w-1.5 h-1.5 rounded-full bg-indigo-300 dark:bg-indigo-500"></div>
                <span class="text-[10px] text-indigo-400 dark:text-indigo-400 font-bold !text-indigo-400">Kolom titik = weekend</span>
            </div>
        </div>

    </div>
</section>

<script>
document.querySelectorAll('.sched-pill').forEach(btn => {
    btn.addEventListener('click', () => {
        const isDark = document.documentElement.classList.contains('dark');

        document.querySelectorAll('.sched-pill').forEach(b => {
            b.classList.remove('active', 'text-white', 'border-transparent');
            b.style.background = '';
            b.classList.add(
                isDark ? 'border-slate-700' : 'border-gray-100',
                isDark ? 'bg-slate-800'    : 'bg-white',
                isDark ? 'text-slate-400'  : 'text-gray-500'
            );
            b.classList.remove('border-gray-100', 'bg-white', 'text-gray-500');
        });

        btn.classList.add('active', 'text-white', 'border-transparent');
        btn.classList.remove('border-gray-100', 'bg-white', 'text-gray-500', 'border-slate-700', 'bg-slate-800', 'text-slate-400');
        btn.style.background = 'linear-gradient(135deg, #3d2db5, #4f3fd4)';

        const f = btn.dataset.filter;
        document.querySelectorAll('.sched-row').forEach(row => {
            const match = f === 'all' || row.dataset.lokasi === f;
            row.style.opacity = match ? '1' : '0.12';
            row.style.transition = 'opacity .3s ease';
        });
    });
});
</script>