{{-- ═══════════════════════ TESTIMONI ═══════════════════════ --}}
<section class="py-16 md:py-24 px-4 md:px-6 transition-colors duration-300" id="testimoni">
    <div class="text-center mb-14">
        <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Testimoni</p>
        {{-- Perbaikan: Tambahkan dark:text-white --}}
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">Testimoni Member</h2>
        <p class="text-gray-400 dark:text-gray-500 text-sm">Dari harapan menjadi kenyataan</p>
    </div>

{{-- Slider wrapper --}}
<div class="relative max-w-6xl mx-auto px-4 md:px-16">
    {{-- Wrapper Slider --}}
    <div class="overflow-hidden"> {{-- Ini HARUS overflow-hidden --}}
        <div id="testiSlider" 
             class="flex flex-nowrap overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar"
             style="-ms-overflow-style: none; scrollbar-width: none;">
            
            @foreach($testimonis as $testi)
            {{-- Perbaikan Lebar: md:w-1/3 dengan padding agar ada celah --}}
            <div class="testi-card w-full sm:w-1/2 md:w-1/3 flex-shrink-0 snap-center px-3 py-4">
                <div class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-xl p-6 shadow-sm h-full flex flex-col">
                    {{-- Bintang --}}
                    <div class="flex gap-1 mb-4 text-amber-400">
                        @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $testi->rating ? '' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 text-sm italic flex-grow mb-5">"{{ $testi->deskripsi }}"</p>
                    <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-50 dark:border-slate-700">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-bold" style="background: linear-gradient(135deg, #85488F, #254292);">
                            {{ strtoupper(substr($testi->nama, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-bold text-sm text-gray-800 dark:text-white">{{ $testi->nama }}</p>
                            <p class="text-xs text-gray-400">Member</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Navigasi --}}
    <button id="testiPrev" class="absolute top-1/2 -left-4 -translate-y-1/2 w-10 h-10 bg-slate-800/50 hover:bg-slate-800 border border-white/10 rounded-full flex items-center justify-center z-20 text-white transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button id="testiNext" class="absolute top-1/2 -right-4 -translate-y-1/2 w-10 h-10 bg-slate-800/50 hover:bg-slate-800 border border-white/10 rounded-full flex items-center justify-center z-20 text-white transition-all">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>
</div>

    {{-- Dots --}}
    <div class="flex justify-center gap-2 mt-8" id="testiDots"></div>

    {{-- Tombol Beri Testimoni --}}
    <div class="text-center mt-10">
        <button id="openTestiModal"
                class="inline-flex items-center gap-2 px-7 py-3 bg-[#2b459a] text-white text-sm font-bold uppercase tracking-wide hover:bg-[#1e3278] transition-colors duration-200 rounded-sm shadow-lg">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Beri Testimoni
        </button>
    </div>
</section>

{{-- ═══════════════════════ MODAL TESTIMONI ═══════════════════════ --}}
<div class="modal-backdrop fixed inset-0 bg-black/60 z-[100] hidden items-center justify-center p-4" id="testiModal">
    {{-- Perbaikan: Tambahkan dark:bg-slate-900 dark:border-slate-700 --}}
    <div class="bg-white dark:bg-slate-900 border dark:border-slate-700 w-full max-w-md rounded-2xl p-8 shadow-2xl">
        <form action="{{ route('testimoni.store') }}" method="POST" id="formTestimoni">
            @csrf
            
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Beri Testimoni</h3>
                <button type="button" id="closeTestiModal" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">✕</button>
            </div>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-bold mb-1 dark:text-gray-300 uppercase">NAMA</label>
                    <input type="text" name="nama" required 
                           class="w-full border dark:border-slate-700 dark:bg-slate-800 dark:text-white p-3 rounded-lg focus:ring-2 focus:ring-[#2b459a] outline-none" 
                           placeholder="Nama Anda">
                </div>

                <div>
                    <label class="block text-xs font-bold mb-2 dark:text-gray-300 uppercase">RATING</label>
                    <div class="flex flex-row-reverse justify-end gap-2">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" class="peer hidden" required>
                        <label for="star{{ $i }}" class="cursor-pointer text-3xl text-gray-300 peer-checked:text-amber-400 hover:text-amber-300 transition-colors">★</label>
                        @endfor
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold mb-1 dark:text-gray-300 uppercase">DESKRIPSI</label>
                    <textarea name="deskripsi" required rows="4" 
                              class="w-full border dark:border-slate-700 dark:bg-slate-800 dark:text-white p-3 rounded-lg focus:ring-2 focus:ring-[#2b459a] outline-none" 
                              placeholder="Ceritakan pengalaman Anda..."></textarea>
                </div>
            </div>

            <div class="mt-8 flex gap-3">
                <button type="submit" class="flex-1 py-3 bg-[#2b459a] hover:bg-[#1e3278] text-white font-bold rounded-xl transition-all shadow-lg">
                    Kirim Testimoni
                </button>
                <button type="button" id="cancelTesti" class="px-5 py-3 border dark:border-slate-700 dark:text-white rounded-xl hover:bg-gray-50 dark:hover:bg-slate-800 transition-all">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>