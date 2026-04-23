{{-- ═══ FILTER ═══ --}}
<section id="galeri" class="bg-white px-6 py-8 sticky top-[73px] z-30 border-b border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-3 overflow-x-auto pb-1 scrollbar-hide">

            @foreach([
                ['all',       'Semua',      ''],
                ['latihan',   'Latihan',    '🏹'],
                ['kompetisi', 'Kompetisi',  '🏆'],
                ['event',     'Event',      '🎯'],
                ['team',      'Team',       '👥'],
            ] as [$val, $label, $icon])
            <button data-glry-filter="{{ $val }}"
                    class="glry-filter shrink-0 flex items-center gap-2 px-5 py-2.5 text-xs font-black
                           uppercase tracking-widest border-2 transition-all duration-200
                           {{ $val === 'all'
                               ? 'bg-[#2b459a] text-white border-[#2b459a]'
                               : 'bg-white text-gray-400 border-gray-200 hover:border-[#2b459a] hover:text-[#2b459a]' }}">
                @if($icon)<span>{{ $icon }}</span>@endif
                {{ $label }}
            </button>
            @endforeach

            <div class="ml-auto shrink-0">
                <span class="text-xs font-bold text-gray-300 uppercase tracking-widest" id="glryCount">12 Foto</span>
            </div>
        </div>
    </div>
</section>

<style>
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>