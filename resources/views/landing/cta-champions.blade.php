{{-- ═══════════════════════ CTA CHAMPIONS ═══════════════════════ --}}
<section class="py-24 px-6 text-center border-gray-100 dark:border-slate-800 transition-colors duration-300">
    <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Connect</p>
    
    {{-- Tambahkan dark:text-white --}}
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Siap untuk menjadi champions?</h2>
    
    {{-- Perbaikan typo "dan dan" & tambahkan dark:text-gray-400 --}}
    <p class="text-gray-500 dark:text-gray-400 text-sm max-w-md mx-auto mb-10">
        Bergabunglah dengan komunitas yang terus berkembang. Kami berlatih dengan tekad dan bertanding dengan presisi.
    </p>

    <div class="flex flex-col items-center gap-2">
        <p class="text-[10px] text-gray-400 dark:text-gray-500 tracking-wide">Hubungi coach kami</p>
        
        <div class="flex flex-col sm:flex-row items-center gap-4">
            {{-- Tombol Utama --}}
            <button type="button" onclick="openDaftarModal()"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 bg-[#2b459a] dark:bg-blue-600
                           text-white font-bold text-sm hover:bg-[#1e3278] dark:hover:bg-blue-700
                           transition-all duration-200 shadow-lg shadow-blue-900/10 active:scale-95">
                Daftar Sekarang
            </button>
            
            {{-- Tombol WhatsApp --}}
            <a href="https://wa.me/6281214711219?text=Halo%20Coach%2C%20saya%20tertarik%20untuk%20bergabung%20di%20Groovy%20Archery" 
               target="_blank" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 border border-gray-300 dark:border-slate-700 
                      text-gray-700 dark:text-gray-300 font-bold text-sm hover:border-[#2b459a] dark:hover:border-blue-400 
                      hover:text-[#2b459a] dark:hover:text-blue-400 transition-all duration-200 active:scale-95">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>