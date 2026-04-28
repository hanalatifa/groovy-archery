{{-- ═══════════════════════ CONTACT + MAP ═══════════════════════ --}}
<section class="max-w-7xl mx-auto px-6 py-24 transition-colors duration-300" id="contact">
    <div class="mb-10">
        <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Connect</p>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-3 transition-colors">Kenali kami lebih jauh</h2>
        <p class="text-gray-400 dark:text-gray-500 text-sm max-w-md">
            Ada pertanyaan tentang bergabung atau jenis pelatihan? Kami siap membantu.
        </p>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-stretch">

        {{-- Kontak Info --}}
        <div class="space-y-8">

            <div class="flex items-start gap-4 group">
                <div class="w-10 h-10 rounded-sm bg-[#2b459a]/10 dark:bg-blue-900/20 border border-[#2b459a]/20 dark:border-blue-800/30 flex items-center justify-center flex-shrink-0 mt-0.5 transition-colors group-hover:bg-[#2b459a]/20">
                    <svg class="w-4 h-4 text-[#2b459a] dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-gray-900 dark:text-gray-100 mb-1">Email</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mb-1">Kirimkan pertanyaan kapan saja</p>
                    <a href="mailto:groovyarchery@gmail.com" class="text-sm text-[#2b459a] dark:text-blue-400 hover:underline font-medium">
                        groovyarchery@gmail.com
                    </a>
                </div>
            </div>

            <div class="flex items-start gap-4 group">
                <div class="w-10 h-10 rounded-sm bg-[#2b459a]/10 dark:bg-blue-900/20 border border-[#2b459a]/20 dark:border-blue-800/30 flex items-center justify-center flex-shrink-0 mt-0.5 transition-colors group-hover:bg-[#2b459a]/20">
                    <svg class="w-4 h-4 text-[#2b459a] dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-gray-900 dark:text-gray-100 mb-1">WhatsApp</p>
                    <p class="text-xs text-gray-400 dark:text-gray-500 mb-1">Respons cepat (08.00 - 17.00)</p>
                    <a href="https://wa.me/6281214711219" class="text-sm text-gray-700 dark:text-gray-300 font-medium hover:text-[#2b459a] dark:hover:text-blue-400 transition-colors">
                        +62 812 1471 1219
                    </a>
                </div>
            </div>

            <div class="flex items-start gap-4 group">
                <div class="w-10 h-10 rounded-sm bg-[#2b459a]/10 dark:bg-blue-900/20 border border-[#2b459a]/20 dark:border-blue-800/30 flex items-center justify-center flex-shrink-0 mt-0.5 transition-colors group-hover:bg-[#2b459a]/20">
                    <svg class="w-4 h-4 text-[#2b459a] dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-gray-900 dark:text-gray-100 mb-1">Office</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        Jalan Kebon Bawang XI No. 63, <br>
                        Kecamatan Tj.Priok, Jakarta Utara 14320
                    </p>
                </div>
            </div>
        </div>

        {{-- MAP (PERBAIKAN URL) --}}
        <div class="rounded-sm overflow-hidden shadow-lg border border-gray-100 dark:border-slate-800 h-72 md:h-full min-h-[320px]">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.1123!2d106.8856!3d-6.1154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1fa415a77f97%3A0x6b4a3a60a0a5a5a5!2sJl.%20Kebon%20Bawang%20XI%20No.63!5e0!3m2!1sid!2sid!4v1700000000000"
                width="100%" height="100%"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                {{-- Tambahkan filter grayscale jika di dark mode (opsional) --}}
                class="dark:opacity-80 dark:contrast-125">
            </iframe>
        </div>
    </div>
</section>