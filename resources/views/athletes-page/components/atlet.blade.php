<section class="py-24 bg-white dark:bg-slate-900 transition-colors duration-300">

    <div class="text-center max-w-2xl mx-auto mb-16 px-6">
        <p class="text-xs font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[4px] mb-2">
            Athlete
        </p>
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
            Atlet Kami
        </h2>
        <p class="text-gray-400 dark:text-gray-500 text-sm">
            Setiap tembakan itu penting. Setiap momen itu berarti.
        </p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 px-6">
        
        @php
            $athletes = [
                ['name' => 'Fiorenza', 'category' => 'Senior', 'desc' => 'Atlet senior yang bergabung sejak 2020, telah meraih 10+ medali emas.'],
                ['name' => 'Fiorenza', 'category' => 'Senior', 'desc' => 'Atlet senior yang bergabung sejak 2020, telah meraih 10+ medali emas.'],
                ['name' => 'Fiorenza', 'category' => 'Senior', 'desc' => 'Atlet senior yang bergabung sejak 2020, telah meraih 10+ medali emas.'],
                ['name' => 'Fiorenze', 'category' => 'Senior', 'desc' => 'Atlet senior yang bergabung sejak 2020, telah meraih 10+ medali emas.'],
            ];
        @endphp

        @foreach($athletes as $athlete)
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-xl overflow-hidden hover:shadow-2xl dark:hover:shadow-blue-900/20 transition-all duration-300 flex flex-col hover:scale-[1.03] group">
            <div class="relative overflow-hidden h-64">
                <img src="{{ asset('assets/image 1.jpeg') }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
            
            <div class="p-6 flex flex-col flex-grow">
                <p class="text-xs font-bold text-gray-400 dark:text-gray-500 mb-2 uppercase tracking-wider">{{ $athlete['category'] }}</p>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-snug">
                    {{ $athlete['name'] }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-6 leading-relaxed flex-grow">
                    {{ $athlete['desc'] }}
                </p>
                
                <div class="mt-auto pt-4 border-t border-gray-100 dark:border-slate-700">
                    <a href="#" class="text-[#2b459a] dark:text-blue-400 font-bold text-xs uppercase tracking-widest flex items-center gap-2 group/link">
                        Jelajah 
                        <span class="transition-transform group-hover/link:translate-x-2">→</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="text-center mt-16">
        <button type="button" 
                class="inline-flex items-center gap-2 px-10 py-4 bg-[#2b459a] dark:bg-blue-600
                       text-white font-bold text-sm uppercase tracking-[2px] hover:bg-[#1e3278] dark:hover:bg-blue-700
                       transition-all duration-300 shadow-lg shadow-blue-900/20 active:scale-95">
            Lihat Semua Atlet
        </button>
    </div>
</section>