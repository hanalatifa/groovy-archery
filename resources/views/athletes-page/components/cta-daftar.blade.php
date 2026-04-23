{{-- ═══════════════════════ CTA REQUEST ATLET ═══════════════════════ --}}
<section class="py-24 px-6 text-center bg-gray-50 border-t border-gray-100">
    <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Request</p>
    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Namamu belum tercantum?</h2>
    <p class="text-gray-500 text-sm max-w-md mx-auto mb-10">
        Sudah bergabung dalam club tapi namamu belum tercantum?<br>
        request kepada admin untuk ditambahkan!
    </p>

    <div class="flex flex-col items-center gap-2">
        <p class="text-[10px] text-gray-400 tracking-wide">Hubungi coach kami</p>
        <div class="flex items-center justify-center gap-4">

            {{-- Tombol Request — trigger modal --}}
            <button onclick="openRequestModal()"
                    class="inline-flex items-center gap-2 px-8 py-3 bg-[#2b459a] text-white
                           font-bold text-sm hover:bg-[#1e3278] transition-colors duration-200">
                Request Tambahkan
            </button>

            <a href="#contact"
               class="inline-flex items-center gap-2 px-8 py-3 border border-gray-300 text-gray-700
                      font-bold text-sm hover:border-[#2b459a] hover:text-[#2b459a] transition-colors duration-200">
                Hubungi Kami
            </a>

        </div>
    </div>
</section>