    {{-- testimoni section --}}
<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-5xl font-extrabold mb-4 text-black tracking-tight">Testimoni Member</h2>
        <p class="text-gray-500 mb-20 italic">Dari harapan menjadi kenyataan</p>

        <div class="swiper mySwiper overflow-visible">
            <div class="swiper-wrapper flex items-stretch">

                <div class="swiper-slide h-auto">
                    <div class="bg-gradient-to-br from-[#6d5dfc] to-[#4c4494] p-10 text-left text-white rounded-sm shadow-xl flex flex-col justify-between h-full">
                        <div>
                            <div class="flex gap-1 mb-6">
                                @for($i=0; $i<5; $i++) <span class="text-yellow-400 text-xl">★</span> @endfor
                            </div>
                            <p class="text-lg leading-relaxed mb-8 opacity-90">"Coach nya berpengalaman dan dapat memberikan pengalaman latihan yang baik namun tegas. Latihan selalu terstruktur"</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-xs">IMG</div>
                            <div>
                                <p class="font-bold">Bunda Aqsa</p>
                                <p class="text-xs opacity-70">Club Member</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide h-auto">
                    <div class="bg-gradient-to-br from-[#6d5dfc] to-[#4c4494] p-10 text-left text-white rounded-sm shadow-xl flex flex-col justify-between h-full">
                        <div>
                            <div class="flex gap-1 mb-6">
                                @for($i=0; $i<5; $i++) <span class="text-yellow-400 text-xl">★</span> @endfor
                            </div>
                            <p class="text-lg leading-relaxed mb-8 opacity-90">"Sebelumnya aku ga tertarik ke panahan. tapi disini coachnya baik dan seru banget."</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-xs">IMG</div>
                            <div>
                                <p class="font-bold">Noorina</p>
                                <p class="text-xs opacity-70">Club member</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide h-auto">
                    <div class="bg-gradient-to-br from-[#6d5dfc] to-[#4c4494] p-10 text-left text-white rounded-sm shadow-xl flex flex-col justify-between h-full">
                        <div>
                            <div class="flex gap-1 mb-6">
                                @for($i=0; $i<5; $i++) <span class="text-yellow-400 text-xl">★</span> @endfor
                            </div>
                            <p class="text-lg leading-relaxed mb-8 opacity-90">"Setiap sesi coachnya selalu ontime, jarang bahkan hampir ga pernah terlambat."</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-xs">IMG</div>
                            <div>
                                <p class="font-bold">Raffasya</p>
                                <p class="text-xs opacity-70">Club Member</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next text-black hover:scale-110 transition after:content-[''] after:text-4xl">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="swiper-button-prev text-black hover:scale-110 transition after:content-[''] after:text-4xl">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>

            <div class="swiper-pagination !-bottom-12"></div>
        </div>

        <button class="mt-28 bg-[#2b459a] text-white px-10 py-3 font-medium hover:bg-blue-900 transition rounded-sm shadow-md">
            Beri Testimoni
        </button>
    </div>
</section>

<section class="py-24 bg-white text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-5xl font-bold mb-6 text-black tracking-tight">Siap untuk menjadi champions?</h2>
        <p class="text-gray-600 text-xl mb-12">Bergabunglah dengan komunitas yang berlatih dengan tekad kuat dan bertindak dengan presisi.</p>

        <div class="flex justify-center gap-4">
            <a href="#" class="bg-[#2b459a] text-white px-10 py-4 font-medium rounded-sm hover:bg-blue-900 transition shadow-lg">
                Daftar
            </a>
            <a href="#" class="bg-[#e24a43] text-white px-10 py-4 font-medium rounded-sm hover:bg-red-700 transition shadow-lg">
                Hubungi Admin
            </a>
        </div>
    </div>
</section>

{{-- SWIPE.JS --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1, // Berapa slide yang muncul di mobile
            spaceBetween: 30, // Jarak antar slide
            loop: true, // Kembali ke awal setelah slide terakhir

            // Pengaturan untuk tombol panah
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            // Pengaturan untuk titik-titik indikator
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
        });
    });
</script>