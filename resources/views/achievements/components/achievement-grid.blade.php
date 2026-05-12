@props(['pertandingans'])
<section class="py-16 text-center transition-colors duration-300">
    <p class="text-[#2b459a] dark:text-blue-400 font-bold uppercase tracking-[5px] text-[10px]">Victories</p>
    <h2 class="text-4xl md:text-5xl font-bold mt-2 text-gray-900 dark:text-white">See our Achievement</h2>
    <p class="text-gray-500 dark:text-gray-400 mt-4 text-sm max-w-md mx-auto">Our athletes continue to earn recognition at every level</p>
</section>

<section class="max-w-7xl mx-auto px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($pertandingans as $index => $pertandingan)
            @php
                $fotoUrl = (isset($pertandingan->dokumentasi) && is_array($pertandingan->dokumentasi) && count($pertandingan->dokumentasi) > 0) 
                           ? asset('storage/' . $pertandingan->dokumentasi[0]) 
                           : asset('assets/placeholder-event.jpg');
            @endphp

            <div class="achievement-card group bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-sm overflow-hidden hover:shadow-2xl dark:hover:shadow-blue-900/20 transition-all duration-500 flex flex-col hover:-translate-y-2 {{ $index >= 6 ? 'hidden' : '' }}">
                
                <div class="relative h-60 overflow-hidden">
                    <img src="{{ $fotoUrl }}" alt="{{ $pertandingan->nama_pertandingan }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>

                <div class="p-8 flex flex-col flex-grow">
                    <p class="text-[#2b459a] dark:text-blue-400 text-[10px] font-bold uppercase tracking-widest mb-2">
                        {{ $pertandingan->kategori }}
                    </p>
                    
                    <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white leading-tight">
                        {{ $pertandingan->nama_pertandingan }}
                    </h3>
                    
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-6 leading-relaxed flex-grow line-clamp-3">
                        {{ $pertandingan->deskripsi_kegiatan ?? 'Detail prestasi yang diraih oleh atlet dalam kejuaraan ini.' }}
                    </p>
                    
                    <div class="pt-4 border-t border-gray-50 dark:border-slate-700">
                        <button type="button" 
                                onclick="showAchievementDetail(
                                    '{{ addslashes($pertandingan->nama_pertandingan) }}',
                                    '{{ addslashes($pertandingan->kategori) }}',
                                    '{{ $pertandingan->tgl_pertandingan ? $pertandingan->tgl_pertandingan->format('d/m/Y') : '-' }}',
                                    '{{ addslashes($pertandingan->deskripsi_kegiatan ?? '') }}',
                                    '{{ $fotoUrl }}'
                                )"
                                class="inline-flex items-center gap-2 text-[#2b459a] dark:text-blue-400 font-bold text-xs uppercase tracking-widest hover:gap-3 transition-all cursor-pointer">
                            Lihat Detail <span>→</span>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-gray-50 dark:bg-slate-800/50 rounded-3xl border-2 border-dashed border-gray-100 dark:border-slate-700">
                <p class="text-gray-400 dark:text-slate-500 italic">Belum ada data prestasi yang ditambahkan.</p>
            </div>
        @endforelse
    </div>

    <div class="text-center mt-16" id="see-all-wrapper">
        <button onclick="showAllAchievements()" 
                class="inline-flex items-center gap-2 px-10 py-4 border-2 border-gray-200 dark:border-slate-700 text-gray-900 dark:text-white font-bold text-xs uppercase tracking-[2px] hover:bg-gray-900 hover:text-white dark:hover:bg-white dark:hover:text-black transition-all duration-300">
            See All Achievements
        </button>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function showAllAchievements() {
    document.querySelectorAll('.achievement-card.hidden').forEach(card => {
        card.classList.remove('hidden');
    });

    document.getElementById('see-all-wrapper').classList.add('hidden');
}

function showAchievementDetail(nama, kategori, tanggal, deskripsi, foto) {
    const isDark = document.documentElement.classList.contains('dark');

    Swal.fire({
        width: '800px',
        showConfirmButton: false,
        showCloseButton: true,
        padding: '0',
        background: isDark ? '#1e293b' : '#fff',
        color: isDark ? '#f8fafc' : '#1a202c',
        html: `
            <div style="display: flex; flex-direction: row; text-align: left; overflow: hidden; border-radius: 15px; padding: 24px; gap: 24px;">
                <div style="width: 45%; min-height: 400px; background: url('${foto}') center/cover no-repeat; border-radius: 12px; flex-shrink: 0;">
                </div>
                
                <div style="width: 55%; padding: 16px 16px 16px 0; font-family: 'Plus Jakarta Sans', sans-serif;">
                    <h2 style="font-size: 28px; font-weight: 800; margin-bottom: 30px; color: ${isDark ? '#fff' : '#1a202c'};">Detail Prestasi</h2>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                        <div style="grid-column: span 2;">
                            <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Nama Pertandingan</p>
                            <p style="font-size: 16px; font-weight: 600; color: ${isDark ? '#e2e8f0' : '#2d3748'};">${nama}</p>
                        </div>
                        <div>
                            <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Kategori</p>
                            <p style="font-size: 16px; font-weight: 600; color: ${isDark ? '#e2e8f0' : '#2d3748'};">${kategori}</p>
                        </div>
                        <div>
                            <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Tanggal</p>
                            <p style="font-size: 16px; font-weight: 600; color: ${isDark ? '#e2e8f0' : '#2d3748'};">${tanggal}</p>
                        </div>
                    </div>

                    <div>
                        <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Deskripsi Kegiatan</p>
                        <div style="background: ${isDark ? '#0f172a' : '#f7fafc'}; border: 1px solid ${isDark ? '#334155' : '#edf2f7'}; padding: 15px; border-radius: 10px; font-size: 14px; color: ${isDark ? '#cbd5e1' : '#4a5568'}; line-height: 1.6; max-height: 150px; overflow-y: auto;">
                            ${deskripsi || 'Belum ada deskripsi kegiatan.'}
                        </div>
                    </div>
                </div>
            </div>
        `
    });
}
</script>