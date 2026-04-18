{{-- ═══════════════════════ CONTACT + MAP ═══════════════════════ --}}
<section class="max-w-7xl mx-auto px-6 py-24" id="contact">
    <div class="mb-10">
        <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-3">Connect</p>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Kenali kami lebih jauh</h2>
        <p class="text-gray-400 text-sm max-w-md">
            Ada pertanyaan tentang bergabung atau jenis pelatihan? Kami siap membantu.
        </p>
    </div>

    <!-- FIX DI SINI -->
    <div class="grid md:grid-cols-2 gap-12 items-stretch">

        {{-- Kontak Info --}}
        <div class="space-y-8">

            <!-- EMAIL -->
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-sm bg-[#2b459a]/8 border border-[#2b459a]/12 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-gray-900 mb-1">Email</p>
                    <p class="text-xs text-gray-400 mb-1">Informasi Email</p>
                    <a href="mailto:groovyarchery@gmail.com"
                       class="text-sm text-[#2b459a] hover:underline font-medium">
                        groovyarchery@gmail.com
                    </a>
                </div>
            </div>

            <!-- PHONE -->
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-sm bg-[#2b459a]/8 border border-[#2b459a]/12 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-gray-900 mb-1">Phone</p>
                    <p class="text-xs text-gray-400 mb-1">Hubungi kami pada jam kerja</p>
                    <a href="https://wa.me/6281298005503"
                       class="text-sm text-gray-700 font-medium hover:text-[#2b459a] transition-colors">
                        +62 812 9800 5503
                    </a>
                    <span class="ml-2 text-xs text-gray-400">(Contact Kami)</span>
                </div>
            </div>

            <!-- OFFICE -->
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-sm bg-[#2b459a]/8 border border-[#2b459a]/12 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-gray-900 mb-1">Office</p>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Jalan Kebon Bawang XI No. 63, <br>
                        Kecamatan Tj.Priok, Jakarta Utara 14320
                    </p>
                    <a href="#"
                       class="inline-flex items-center gap-1 mt-2 text-xs text-[#2b459a] font-semibold hover:underline">
                        Tampilkan di peta
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        {{-- MAP (FIX DI SINI) --}}
        <div class="rounded-sm overflow-hidden shadow-lg border border-gray-100 h-72 md:h-80">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1234567890123!2d106.93!3d-6.09!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f9e1a1b1c1d%3A0x1234567890abcdef!2sKalibaru%2C%20Cilincing%2C%20Jakarta%20Utara%2C%20Kota%20Jakarta%20Utara%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid"
                    width="100%" height="100%"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
    </div>
</section>