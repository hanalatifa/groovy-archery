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
                
                    @foreach($testimonis as $testi)
                    <div class="testi-card w-full md:w-1/3 px-3 flex-shrink-0">
                        <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300 h-full flex flex-col">

                            <div class="flex gap-1 mb-4">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testi->rating ? 'text-amber-400' : 'text-gray-200' }}"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>

                            <p class="text-gray-600 text-sm leading-relaxed italic flex-grow mb-5">
                                "{{ $testi->deskripsi }}"
                            </p>

                            <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-50">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0"
                                     style="background: linear-gradient(135deg, #85488F, #254292);">
                                    {{ strtoupper(substr($testi->nama, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">{{ $testi->nama }}</p>
                                    <p class="text-xs text-gray-400">Club Member</p>
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
        <form action="{{ route('testimoni.store') }}" method="POST" id="formTestimoni">
            @csrf
            
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-900">Beri Testimoni</h3>
                <button type="button" id="closeTestiModal">✕</button>
            </div>

            <div class="space-y-5">
                {{-- Input Nama --}}
                <div>
                    <label class="block text-xs font-bold mb-1">NAMA</label>
                    <input type="text" name="nama" required class="w-full border p-2 rounded-lg" placeholder="Nama Anda">
                </div>

                {{-- Input Rating --}}
                <div>
                    <label class="block text-xs font-bold mb-2">RATING</label>
                    <div class="flex flex-row-reverse justify-end gap-2">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" class="peer hidden" required>
                        <label for="star{{ $i }}" class="cursor-pointer text-2xl text-gray-300 peer-checked:text-amber-400">★</label>
                        @endfor
                    </div>
                </div>

                {{-- Input Deskripsi --}}
                <div>
                    <label class="block text-xs font-bold mb-1">DESKRIPSI</label>
                    <textarea name="deskripsi" required rows="4" class="w-full border p-2 rounded-lg" placeholder="Ceritakan pengalaman Anda..."></textarea>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="flex-1 py-3 bg-[#2b459a] text-white font-bold rounded-lg">
                    Kirim Testimoni
                </button>
                <button type="button" id="cancelTesti" class="px-5 py-3 border rounded-lg">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>