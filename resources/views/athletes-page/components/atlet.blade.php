<section id="athletes" class="py-24 bg-white">
    <section class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300">
    
        <div class="text-center max-w-2xl mx-auto mb-16 px-6">
            <p class="text-xs font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[4px] mb-2">
                Athlete
            </p>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
                Atlet Kami
            </h2>
            <p class="text-gray-400 dark:text-gray-500 text-sm">
                Setiap tembakan itu penting. Setiap momen itu berarti.
            </p>
        </div>
    
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 px-6"> 
            
            @forelse ($atlets as $atlet)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300 flex flex-col hover:scale-[1.02]">
                    
                    {{-- FOTO DARI STORAGE --}}
                    <img src="{{ $atlet->foto ? asset('storage/atlet/' . $atlet->foto) : asset('assets/image 1.jpeg') }}" 
                         class="w-full h-64 object-cover"
                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($atlet->nama) }}&background=EBF4FF&color=7F9CF5';">
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <p class="text-sm text-gray-500 mb-2">{{ $atlet->kategori }}</p>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-snug">
                            {{ $atlet->nama }}
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-grow">
                            {{ $atlet->deskripsi ?? 'Atlet berbakat yang telah bergabung dan meraih berbagai prestasi di kejuaraan panahan.' }}
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <button type="button" 
                                onclick="showAthleteDetail(
                                    '{{ $atlet->nama }}',
                                    '{{ $atlet->umur }}',
                                    '{{ $atlet->kategori }}',
                                    '{{ $atlet->deskripsi }}',
                                    '{{ $atlet->foto ? asset('storage/atlet/' . $atlet->foto) : asset('assets/image 1.jpeg') }}'
                                )" 
                                class="text-black font-medium text-sm flex items-center gap-2 hover:gap-3 transition-all cursor-pointer">
                                Lebih Lengkap <span>→</span>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-100">
                    <p class="text-gray-400 italic">Belum ada data atlet yang ditambahkan oleh admin.</p>
                </div>
            @endforelse
    
        </div>
    
        <!-- BUTTON -->
        <div class="text-center mt-16">
            <button type="button"
                    class="inline-flex items-center gap-2 px-8 py-3 bg-[#2b459a]
                           text-white font-bold text-sm hover:bg-[#1e3278]
                           transition-colors duration-200">
                Lihat Semua
            </button>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    function showAthleteDetail(nama, umur, kategori, deskripsi, foto) {
        Swal.fire({
            width: '800px',
            showConfirmButton: false,
            showCloseButton: true,
            padding: '0',
            background: '#fff',
            html: `
                <div style="display: flex; flex-direction: row; text-align: left; overflow: hidden; border-radius: 15px;">
                    <div style="width: 45%; min-height: 400px; background: url('${foto}') center/cover no-repeat;">
                    </div>
                    
                    <div style="width: 55%; padding: 40px; font-family: 'Plus Jakarta Sans', sans-serif;">
                        <h2 style="font-size: 28px; font-weight: 800; margin-bottom: 30px; color: #1a202c;">Profil Atlet</h2>
                        
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                            <div>
                                <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Nama</p>
                                <p style="font-size: 16px; font-weight: 600; color: #2d3748;">${nama}</p>
                            </div>
                            <div>
                                <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Umur</p>
                                <p style="font-size: 16px; font-weight: 600; color: #2d3748;">${umur} Tahun</p>
                            </div>
                            <div>
                                <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Kategori</p>
                                <p style="font-size: 16px; font-weight: 600; color: #2d3748;">${kategori}</p>
                            </div>
                            <div>
                                <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">Bergabung</p>
                                <p style="font-size: 16px; font-weight: 600; color: #2d3748;">12/07/2023</p>
                            </div>
                        </div>
    
                        <div>
                            <p style="font-size: 10px; font-weight: 700; color: #a0aec0; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Deskripsi Atlet</p>
                            <div style="background: #f7fafc; border: 1px solid #edf2f7; padding: 15px; border-radius: 10px; font-size: 14px; color: #4a5568; line-height: 1.6; max-height: 150px; overflow-y: auto;">
                                ${deskripsi || 'Belum ada deskripsi.'}
                            </div>
                        </div>
                    </div>
                </div>
            `
        });
    }
    </script>
    