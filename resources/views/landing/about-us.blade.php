{{-- ═══════════════════════ ABOUT ═══════════════════════ --}}
<section class="max-w-5xl mx-auto px-6 py-24 text-center transition-colors duration-300">
    <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Tentang Kami</p>
    
    {{-- TAMBAHKAN: dark:text-white --}}
    <h2 class="text-4xl md:text-5xl font-bold mb-12 text-gray-900 dark:text-white leading-tight">Groovy Archery</h2>
    
    <div class="grid md:grid-cols-3 gap-6 text-left">
        @foreach([
            ['M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z','Lokasi Strategis','Berlokasi di Tanjung Priok, Jakarta Utara — mudah dijangkau dari berbagai penjuru kota.'],
            ['M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z','Ramah Anak','Dirancang untuk semua usia dengan fokus pada pembentukan karakter, disiplin, dan lingkungan yang positif.'],
            ['M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z','Identitas Kuat','Visual ungu yang modern menciptakan suasana unik, berkarakter, dan mudah dikenali.'],
        ] as [$path,$title,$desc])
        
        {{-- TAMBAHKAN: dark:border-slate-700 dark:hover:bg-slate-800/50 --}}
        <div class="p-6 border border-gray-100 dark:border-slate-700 rounded-sm group hover:border-[#2b459a]/20 hover:shadow-lg transition-all duration-300">
            
            {{-- TAMBAHKAN: dark:bg-blue-900/20 dark:border-blue-800/30 --}}
            <div class="w-9 h-9 border border-[#2b459a]/15 bg-[#2b459a]/5 dark:bg-blue-900/20 dark:border-blue-800/30 rounded-sm flex items-center justify-center mb-5 group-hover:bg-[#2b459a]/10 transition-colors">
                <svg class="w-4 h-4 text-[#2b459a] dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                </svg>
            </div>
            
            {{-- TAMBAHKAN: dark:text-gray-100 --}}
            <h3 class="font-bold text-sm mb-2 text-gray-900 dark:text-gray-100">{{ $title }}</h3>
            
            {{-- TAMBAHKAN: dark:text-gray-400 --}}
            <p class="text-gray-500 dark:text-gray-400 text-sm leading-relaxed">{{ $desc }}</p>
        </div>
        @endforeach
    </div>
</section>