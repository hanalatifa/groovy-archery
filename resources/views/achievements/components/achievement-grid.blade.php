{{-- Achievement Grid --}}
<section class="py-16 text-center transition-colors duration-300">
    <p class="text-[#2b459a] dark:text-blue-400 font-bold uppercase tracking-[5px] text-[10px]">Victories</p>
    <h2 class="text-4xl md:text-5xl font-bold mt-2 text-gray-900 dark:text-white">See our Achievement</h2>
    <p class="text-gray-500 dark:text-gray-400 mt-4 text-sm max-w-md mx-auto">Our athletes continue to earn recognition at every level</p>
</section>

<section class="max-w-7xl mx-auto px-6 pb-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        {{-- Kartu Achievement --}}
        @for ($i = 0; $i < 6; $i++)
        <div class="group bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-sm overflow-hidden hover:shadow-2xl dark:hover:shadow-blue-900/20 transition-all duration-500 flex flex-col hover:-translate-y-2">
            
            {{-- Image container dengan overlay --}}
            <div class="relative h-60 overflow-hidden">
                <img src="{{ asset('assets/placeholder-event.jpg') }}" alt="Event" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>

            <div class="p-8 flex flex-col flex-grow">
                <p class="text-[#2b459a] dark:text-blue-400 text-[10px] font-bold uppercase tracking-widest mb-2">National</p>
                
                <h3 class="text-xl font-bold mb-3 text-gray-900 dark:text-white leading-tight">
                    Piala Kapolda Jawa Barat 2019
                </h3>
                
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-6 leading-relaxed flex-grow">
                    Marcus Chen claimed first place in a competitive field with an outstanding score.
                </p>
                
                <div class="pt-4 border-t border-gray-50 dark:border-slate-700">
                    <a href="#" class="inline-flex items-center gap-2 text-[#2b459a] dark:text-blue-400 font-bold text-xs uppercase tracking-widest hover:gap-3 transition-all">
                        Lihat Detail <span>→</span>
                    </a>
                </div>
            </div>
        </div>
        @endfor

    </div>

    {{-- Button See All --}}
    <div class="text-center mt-16">
        <button class="inline-flex items-center gap-2 px-10 py-4 border-2 border-gray-200 dark:border-slate-700 text-gray-900 dark:text-white font-bold text-xs uppercase tracking-[2px] hover:bg-gray-900 hover:text-white dark:hover:bg-white dark:hover:text-black transition-all duration-300">
            See All Achievements
        </button>
    </div>
</section>