{{-- ═══════════════════════ MODAL TESTIMONI ═══════════════════════ --}}
<div class="modal-backdrop" id="testiModal">
    <div class="modal-box">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Beri Testimoni</h3>
                <p class="text-xs text-gray-400 mt-0.5">Bagikan pengalaman kamu bersama Groovy Archery</p>
            </div>
            <button id="closeTestiModal"
                    class="w-8 h-8 rounded-full flex items-center justify-center text-gray-400
                           hover:bg-gray-100 hover:text-gray-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Form --}}
        <div class="space-y-5">

            {{-- Nama --}}
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">Nama</label>
                <input type="text" id="testiNama" placeholder="Masukkan nama kamu"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400
                              focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition">
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
                          class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400
                                 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition resize-none">
                </textarea>
                <p class="text-red-500 text-xs mt-1 hidden" id="errDeskripsi">Deskripsi wajib diisi</p>
            </div>

        </div>

        {{-- Tombol --}}
        <div class="mt-6 flex gap-3">
            <button id="submitTesti"
                    class="flex-1 py-3 bg-[#2b459a] text-white font-bold text-sm uppercase tracking-wide
                           hover:bg-[#1e3278] transition-colors rounded-lg">
                Kirim Testimoni
            </button>
            <button id="cancelTesti"
                    class="px-5 py-3 border border-gray-200 text-gray-600 font-semibold text-sm
                           rounded-lg hover:bg-gray-50 transition-colors">
                Batal
            </button>
        </div>

    </div>
</div>