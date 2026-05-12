<section class="py-12 md:py-24 px-4 md:px-6 transition-colors duration-300 font-roboto" id="testimoni">
    <div class="text-center mb-10 md:mb-14">
        <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Testimoni</p>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">Testimoni Member</h2>
        <p class="text-gray-400 dark:text-gray-500 text-sm">Dari harapan menjadi kenyataan</p>
    </div>

    <div class="relative max-w-6xl mx-auto px-2 md:px-16">
        <div class="overflow-hidden">
            <div id="testiSlider" 
                 class="flex flex-nowrap overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar"
                 style="-ms-overflow-style: none; scrollbar-width: none;">
                
                @foreach($testimonis as $testi)
                <div class="testi-card w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 snap-center px-3 py-4">
                    <div class="bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-2xl p-6 md:p-8 shadow-sm h-full flex flex-col">
                        <div class="flex gap-1 mb-4 text-amber-400">
                            @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= $testi->rating ? 'fill-current' : 'text-gray-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base italic flex-grow mb-5 leading-relaxed">"{{ $testi->deskripsi }}"</p>
                        <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-50 dark:border-slate-700">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-xs font-bold" style="background: linear-gradient(135deg, #85488F, #254292);">
                                {{ strtoupper(substr($testi->nama, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-bold text-sm text-gray-800 dark:text-white">{{ $testi->nama }}</p>
                                <p class="text-[10px] uppercase text-gray-400 tracking-wider">Verified Member</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <button id="testiPrev" class="hidden md:flex absolute top-1/2 -left-4 -translate-y-1/2 w-11 h-11 bg-white dark:bg-slate-700 shadow-md border border-gray-100 dark:border-slate-600 rounded-full items-center justify-center z-20 text-gray-700 dark:text-white transition-all hover:bg-gray-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button id="testiNext" class="hidden md:flex absolute top-1/2 -right-4 -translate-y-1/2 w-11 h-11 bg-white dark:bg-slate-700 shadow-md border border-gray-100 dark:border-slate-600 rounded-full items-center justify-center z-20 text-gray-700 dark:text-white transition-all hover:bg-gray-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>

    <div class="flex justify-center gap-2 mt-8" id="testiDots"></div>

    <div class="text-center mt-10">
        <button id="openTestiModal"
                class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#2b459a] text-white text-xs font-bold uppercase tracking-widest hover:bg-[#1e3278] transition-all shadow-lg active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            Beri Testimoni
        </button>
    </div>
</section>

<div class="modal-backdrop fixed inset-0 bg-black/60 backdrop-blur-sm z-[100] hidden items-center justify-center p-4" id="testiModal">
    <div class="bg-white dark:bg-slate-900 border dark:border-slate-700 w-full max-w-md rounded-3xl p-6 md:p-8 shadow-2xl transition-all">
        <form action="{{ route('testimoni.store') }}" method="POST" id="formTestimoni">
            @csrf
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Beri Testimoni</h3>
                <button type="button" id="closeTestiModal" class="text-gray-400 hover:text-red-500 transition-colors">✕</button>
            </div>
            <div class="space-y-5">
                <div>
                    <label class="block text-[10px] font-bold mb-1 dark:text-gray-400 uppercase tracking-widest">NAMA LENGKAP</label>
                    <input type="text" name="nama" required class="w-full border-gray-200 dark:border-slate-700 dark:bg-slate-800 dark:text-white p-3 rounded-xl focus:ring-2 focus:ring-[#2b459a] outline-none" placeholder="Nama Anda">
                </div>
                <div>
                    <label class="block text-[10px] font-bold mb-2 dark:text-gray-400 uppercase tracking-widest">RATING</label>
                    <div class="flex flex-row-reverse justify-end gap-2">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" class="peer hidden" required>
                        <label for="star{{ $i }}" class="cursor-pointer text-3xl text-gray-300 peer-checked:text-amber-400 hover:text-amber-300 transition-colors">★</label>
                        @endfor
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold mb-1 dark:text-gray-400 uppercase tracking-widest">DESKRIPSI</label>
                    <textarea name="deskripsi" required rows="4" class="w-full border-gray-200 dark:border-slate-700 dark:bg-slate-800 dark:text-white p-3 rounded-xl focus:ring-2 focus:ring-[#2b459a] outline-none" placeholder="Ceritakan pengalaman Anda..."></textarea>
                </div>
            </div>
            <div class="mt-8 flex flex-col sm:flex-row gap-3">
                <button type="submit" class="flex-1 order-1 sm:order-2 py-3.5 bg-[#2b459a] hover:bg-[#1e3278] text-white font-bold rounded-xl transition-all shadow-md">Kirim Testimoni</button>
                <button type="button" id="cancelTesti" class="flex-1 order-2 sm:order-1 py-3.5 border border-gray-200 dark:border-slate-700 dark:text-white rounded-xl hover:bg-gray-50 dark:hover:bg-slate-800 transition-all text-sm font-medium">Batal</button>
            </div>
        </form>
    </div>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>