    {{-- ═══════════════════════ TESTIMONI ═══════════════════════ --}}
    <section class="py-24 px-6 bg-white" id="testimoni">
        <div class="text-center mb-14">
            <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Testimoni</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Testimoni Member</h2>
            <p class="text-gray-400 text-sm">Dari harapan menjadi kenyataan</p>
        </div>

        {{-- Slider wrapper --}}
        <div class="relative max-w-5xl mx-auto">
            <div class="overflow-hidden">
                <div class="testi-slider" id="testiSlider">

                    @php
                    $testimonis = [
                        ['Budi Arya', 'Club Member', 5, '"Coach kami memberikan perhatian dan input yang membangun pengalaman latihan yang baik namun tegas. Latihan yang disiplin, dan sesi latihan terbaik."'],
                        ['Naadia', 'Club Member', 5, '"Sekalinya aku ikut pertolongan, tapi akhirnya aku jadi lebih baik dan lebih merasa nyaman. Top iklim coaching kami memulai, dan latihan ini membantu, dan saat ini."'],
                        ['Naftaya', 'Club Member', 5, '"Setiap sesi coaching selalu ada ilmu baru yang bermanfaat bagi perkembangan saya sebagai atlet panahan. Sangat antusias untuk latihan hari ini."'],
                        ['Rizky Pratama', 'Club Member', 5, '"Program latihan di sini sangat terstruktur dan para pelatih sangat berpengalaman. Saya merasakan perkembangan yang signifikan sejak bergabung."'],
                        ['Siti Rahma', 'Club Member', 4, '"Lingkungan yang suportif dan komunitas yang hangat membuat saya semakin semangat berlatih. Sangat merekomendasikan Groovy Archery!"'],
                    ];
                    @endphp

                    @foreach($testimonis as $testi)
                    <div class="testi-card w-full md:w-1/3 px-3 flex-shrink-0">
                        <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300 h-full flex flex-col">
                            {{-- Bintang --}}
                            <div class="flex gap-1 mb-4">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testi[2] ? 'text-amber-400' : 'text-gray-200' }}"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>
                            {{-- Teks --}}
                            <p class="text-gray-600 text-sm leading-relaxed italic flex-grow mb-5">{{ $testi[3] }}</p>
                            {{-- Avatar + nama --}}
                            <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-50">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0"
                                     style="background: linear-gradient(135deg, #85488F, #254292);">
                                    {{ strtoupper(substr($testi[0], 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">{{ $testi[0] }}</p>
                                    <p class="text-xs text-gray-400">{{ $testi[1] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- Prev / Next --}}
            <button id="testiPrev"
                    class="absolute top-1/2 -translate-y-1/2 -left-5 w-9 h-9 rounded-full bg-white border border-gray-200 shadow flex items-center justify-center hover:border-[#2b459a] hover:text-[#2b459a] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="testiNext"
                    class="absolute top-1/2 -translate-y-1/2 -right-5 w-9 h-9 rounded-full bg-white border border-gray-200 shadow flex items-center justify-center hover:border-[#2b459a] hover:text-[#2b459a] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Dots --}}
        <div class="flex justify-center gap-2 mt-8" id="testiDots"></div>

        {{-- Tombol Beri Testimoni --}}
        <div class="text-center mt-10">
            <button id="openTestiModal"
                    class="inline-flex items-center gap-2 px-7 py-3 bg-[#2b459a] text-white text-sm font-bold uppercase tracking-wide hover:bg-[#1e3278] transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Beri Testimoni
            </button>
        </div>
    </section>

       {{-- ═══════════════════════ MODAL TESTIMONI ═══════════════════════ --}}
    <div class="modal-backdrop" id="testiModal">
        <div class="modal-box">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Beri Testimoni</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Bagikan pengalaman kamu bersama Groovy Archery</p>
                </div>
                <button id="closeTestiModal"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="space-y-5">
                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">Nama</label>
                    <input type="text" id="testiNama" placeholder="Masukkan nama kamu"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition">
                    <p class="text-red-500 text-xs mt-1 hidden" id="errNama">Nama wajib diisi</p>
                </div>

                {{-- Bintang --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Rating</label>
                    <div class="star-input" id="starInput">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}">
                        <label for="star{{ $i }}">★</label>
                        @endfor
                    </div>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errRating">Pilih rating terlebih dahulu</p>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">Deskripsi</label>
                    <textarea id="testiDeskripsi" rows="4" placeholder="Ceritakan pengalaman kamu..."
                              class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition resize-none"></textarea>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errDeskripsi">Deskripsi wajib diisi</p>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button id="submitTesti"
                        class="flex-1 py-3 bg-[#2b459a] text-white font-bold text-sm uppercase tracking-wide hover:bg-[#1e3278] transition-colors rounded-lg">
                    Kirim Testimoni
                </button>
                <button id="cancelTesti"
                        class="px-5 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </div>