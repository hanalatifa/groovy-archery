{{-- ═══════════════════════ CTA REQUEST ATLET ═══════════════════════ --}}
<section class="py-24 px-6 text-center border-t border-gray-100 dark:border-slate-800 transition-colors duration-300">
    <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Request</p>
    
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Namamu belum tercantum?</h2>
    
    <p class="text-gray-500 dark:text-gray-400 text-sm max-w-md mx-auto mb-10 leading-relaxed">
        Sudah bergabung dalam club tapi namamu belum tercantum?<br class="hidden md:block">
        Request kepada admin untuk segera ditambahkan!
    </p>

    <div class="flex flex-col items-center gap-2">
        <p class="text-[10px] text-gray-400 dark:text-gray-500 tracking-wide">Hubungi coach kami</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">

            {{-- Tombol Request — trigger modal --}}
            <button onclick="openRequestModal()"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 bg-[#2b459a] dark:bg-blue-600 
                           text-white font-bold text-sm hover:bg-[#1e3278] dark:hover:bg-blue-700 
                           transition-all duration-200 shadow-lg shadow-blue-900/10 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Request Tambahkan
            </button>

            {{-- Tombol Hubungi Kami --}}
            <a href="#contact"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 border border-gray-300 dark:border-slate-700 
                      text-gray-700 dark:text-gray-300 font-bold text-sm hover:border-[#2b459a] dark:hover:border-blue-400 
                      hover:text-[#2b459a] dark:hover:text-blue-400 transition-all duration-200 active:scale-95">
                Hubungi Kami
            </a>

        </div>
    </div>
</section>