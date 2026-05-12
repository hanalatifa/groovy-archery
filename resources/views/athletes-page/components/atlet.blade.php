<section id="atlets" class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300">

    <div class="text-center max-w-2xl mx-auto mb-16 px-6">
        <p class="text-xs font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[4px] mb-2">Athlete</p>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">Atlet Kami</h2>
        <p class="text-gray-400 dark:text-gray-500 text-sm">Setiap tembakan itu penting. Setiap momen itu berarti.</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-6">
        @forelse ($atlets as $atlet)
            @if($atlet->status == 'approved')
                <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl overflow-hidden hover:shadow-lg transition duration-300 flex flex-col hover:scale-[1.02]">
                    
                    @php
                        $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($atlet->nama) . "&background=2b459a&color=fff&size=512";
                        
                        if ($atlet->foto && Storage::disk('public')->exists('atlet/' . $atlet->foto)) {
                            $finalImageUrl = asset('storage/atlet/' . $atlet->foto);
                        } else {
                            $finalImageUrl = $avatarUrl;
                        }
                    @endphp

                    <div class="w-full h-64 overflow-hidden bg-gray-100 dark:bg-slate-700">
                        <img src="{{ $finalImageUrl }}" class="w-full h-full object-cover" onerror="this.src='{{ $avatarUrl }}';">
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">{{ $atlet->kategori }}</p>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">{{ $atlet->nama }}</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-6 flex-grow">
                            {{ Str::limit($atlet->deskripsi, 80) ?? 'Atlet berbakat club kami.' }}
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100 dark:border-slate-700">
                            <button type="button" 
                                onclick="showAthleteDetail(
                                    '{{ $atlet->nama }}',
                                    '{{ $atlet->umur }}',
                                    '{{ $atlet->kategori }}',
                                    '{{ addslashes($atlet->deskripsi) }}',
                                    '{{ $finalImageUrl }}',
                                    '{{ $atlet->created_at->format('d/m/Y') }}'
                                )" 
                                class="text-black dark:text-white font-medium text-sm flex items-center gap-2 hover:gap-3 transition-all">
                                Lebih Lengkap <span>→</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-span-full text-center py-20 bg-gray-50 dark:bg-slate-800/50 rounded-3xl border-2 border-dashed border-gray-100 dark:border-slate-700">
                <p class="text-gray-400 dark:text-slate-500 italic">Belum ada data atlet yang disetujui.</p>
            </div>
        @endforelse
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function showAthleteDetail(nama, umur, kategori, deskripsi, foto, tgl) {
    const isDark = document.documentElement.classList.contains('dark');
    
    Swal.fire({
        width: '800px',
        showConfirmButton: false,
        showCloseButton: true,
        padding: '0',
        background: isDark ? '#1e293b' : '#fff',
        color: isDark ? '#f8fafc' : '#1a202c',
        html: `
            <div class="flex flex-col md:flex-row text-left overflow-hidden rounded-xl">
                <div class="w-full md:w-[45%] min-h-[300px] md:min-h-[450px]" style="background: url('${foto}') center/cover no-repeat;">
                </div>
                
                <div class="w-full md:w-[55%] p-8 md:p-10">
                    <h2 class="text-2xl font-extrabold mb-8 ${isDark ? 'text-white' : 'text-gray-900'}">Profil Atlet</h2>
                    
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Nama</p>
                            <p class="text-base font-semibold ${isDark ? 'text-blue-100' : 'text-gray-800'}">${nama}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Umur</p>
                            <p class="text-base font-semibold ${isDark ? 'text-blue-100' : 'text-gray-800'}">${umur} Tahun</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Kategori</p>
                            <p class="text-base font-semibold ${isDark ? 'text-blue-100' : 'text-gray-800'}">${kategori}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Bergabung</p>
                            <p class="text-base font-semibold ${isDark ? 'text-blue-100' : 'text-gray-800'}">${tgl}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Deskripsi Atlet</p>
                        <div class="p-4 rounded-xl border text-sm leading-relaxed overflow-y-auto max-h-[180px] 
                            ${isDark ? 'bg-slate-900 border-slate-700 text-slate-300' : 'bg-gray-50 border-gray-100 text-gray-600'}">
                            ${deskripsi || 'Belum ada deskripsi.'}
                        </div>
                    </div>
                </div>
            </div>
        `
    });
}
</script>