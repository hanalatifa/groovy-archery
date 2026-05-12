<section class="py-24 relative overflow-hidden bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-5xl font-extrabold mb-4 text-black tracking-tight">Testimoni Member</h2>
        <p class="text-gray-500 mb-20 italic">Dari harapan menjadi kenyataan</p>

        <div class="relative group">
            <div class="overflow-hidden">
                <div id="testiSlider" class="flex transition-transform duration-700 ease-in-out">
                    @foreach($approvedTestis as $testi)
                        <div class="testi-card flex-shrink-0 px-4 w-full md:w-1/3">
                            <div class="bg-gradient-to-br from-[#6d5dfc] to-[#4c4494] p-10 text-left text-white rounded-sm shadow-xl flex flex-col justify-between h-full min-h-[380px]">
                                <div>
                                    <div class="flex gap-1 mb-6">
                                        @for($i=0; $i < $testi->rating; $i++) 
                                            <span class="text-yellow-400 text-xl">★</span> 
                                        @endfor
                                    </div>
                                    <p class="text-lg leading-relaxed mb-8 opacity-90">"{{ $testi->deskripsi }}"</p>
                                </div>
                                <div class="flex items-center gap-4 mt-auto">
                                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                        {{ strtoupper(substr($testi->nama, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="font-bold">{{ $testi->nama }}</p>
                                        <p class="text-xs opacity-70 italic">Verified Member</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button id="testiPrev" class="absolute top-1/2 -left-4 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl text-black hover:scale-110 transition z-30 hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <button id="testiNext" class="absolute top-1/2 -right-4 -translate-y-1/2 bg-white p-3 rounded-full shadow-xl text-black hover:scale-110 transition z-30 hidden md:block">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
        </div>

        <div id="testiDots" class="flex justify-center gap-3 mt-12"></div>

        <button class="mt-20 bg-[#2b459a] text-white px-12 py-4 font-bold hover:bg-blue-900 transition shadow-lg tracking-widest uppercase text-sm">
            Beri Testimoni
        </button>
    </div>
</section>