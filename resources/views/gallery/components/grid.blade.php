@php
    $docs = $docs ?? [];
@endphp

<section class="bg-gray px-6 py-16">
    <div class="max-w-7xl mx-auto">

        <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4" id="glryGrid">
            @foreach($docs as $i => $doc)
            @php
                $ukuran = ($i % 5 == 0) ? 'tall' : (($i % 3 == 0) ? 'wide' : 'normal');
                $kategoriSlug = strtolower($doc->kategori ?? 'umum');
            @endphp
            
            <div class="glry-item break-inside-avoid mb-4 group relative overflow-hidden rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300"
                 data-index="{{ $i }}"
                 data-kategori="{{ $kategoriSlug }}"
                 style="animation-delay:{{ $i * 50 }}ms; cursor: pointer; position: relative;">

                <div class="relative overflow-hidden rounded-2xl {{ $ukuran === 'tall' ? 'aspect-[3/5]' : ($ukuran === 'wide' ? 'aspect-[16/9]' : 'aspect-[4/3]') }}">

                    <div class="absolute top-3 left-3 z-20">
                        <span class="bg-[#2b459a] text-white text-[9px] font-black uppercase tracking-[2px] px-3 py-1.5 rounded-lg shadow-lg">
                            {{ $doc->kategori }}
                        </span>
                    </div>

                    <img src="{{ asset('storage/docs/' . $doc->foto) }}" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-6 z-10 
                    translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 
                    transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)]">
                        <h3 class="text-white font-black text-md mb-1 leading-tight">{{ $doc->judul }}</h3>
                        <p class="text-white/70 text-[11px] line-clamp-2 font-light">{{ $doc->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="glryEmpty" class="{{ count($docs) > 0 ? 'hidden' : '' }} text-center py-24 text-gray-400">
            <p class="text-sm font-black uppercase tracking-widest">Belum ada dokumentasi</p>
        </div>

    </div>
</section>

<div id="modalGallery"
     class="hidden fixed inset-0 w-full h-full bg-black/95 flex-col items-center justify-center p-4"
     style="z-index:999999; display:none;">

    <button id="closeBtn"
        class="fixed top-6 right-6 p-4 text-white/50 hover:text-white hover:bg-white/20 rounded-full"
        style="z-index:9999999;">
        <svg class="w-10 h-10 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    <div class="flex flex-col items-center w-full max-w-4xl gap-6">
        <div class="w-full flex justify-center">
            <img id="imgGallery"
                 class="max-w-full max-h-[65vh] object-contain shadow-2xl border border-white/10">
        </div>

        <div class="w-full text-left px-4">
            <span id="katGallery"
                  class="text-gray-400 text-[10px] font-black uppercase tracking-[4px] block mb-2"></span>

            <h2 id="judulGallery"
                class="text-white text-2xl md:text-4xl font-black mb-3"></h2>

            <p id="deskGallery"
               class="text-white/60 text-sm md:text-base italic"></p>
        </div>
    </div>
</div>


<script>
    window.masterDocs = @json($docs);
    
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modalGallery');
        const closeBtn = document.getElementById('closeBtn');
        const items = document.querySelectorAll('.glry-item');

        document.querySelectorAll('.glry-filter').forEach(btn => {
    btn.addEventListener('click', function() {
        const filterValue = this.getAttribute('data-glry-filter').toLowerCase();
        const items = document.querySelectorAll('.glry-item');

        document.querySelectorAll('.glry-filter').forEach(b => {
            b.classList.remove('active-filter', 'bg-[#2b459a]', 'text-white', 'border-[#2b459a]');
            b.classList.add('bg-white', 'text-gray-400', 'border-gray-200');
        });

        this.classList.add('active-filter', 'bg-[#2b459a]', 'text-white', 'border-[#2b459a]');
        this.classList.remove('bg-white', 'text-gray-400', 'border-gray-200');

        let visibleCount = 0;
        items.forEach(item => {
            const itemKategori = item.getAttribute('data-kategori').toLowerCase();
            
            if (filterValue === 'all' || itemKategori === filterValue) {

                item.style.display = 'inline-block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 10);
                visibleCount++;
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });

        const emptyState = document.getElementById('glryEmpty');
        if (emptyState) {
            emptyState.classList.toggle('hidden', visibleCount > 0);
        }
    });
});

        items.forEach(item => {
            item.addEventListener('click', function () {
                if (!modal.classList.contains('hidden')) return;
    
                const idx = this.dataset.index;
                const data = window.masterDocs[idx];
                if (!data) return;
    
                document.getElementById('imgGallery').src = `/storage/docs/${data.foto}`;
                document.getElementById('judulGallery').innerText = data.judul;
                document.getElementById('katGallery').innerText = data.kategori;
                document.getElementById('deskGallery').innerText = data.deskripsi;
    
                modal.style.display = 'flex';
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        });

        function closeModal() {
            modal.classList.add('hidden');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    
        closeBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            closeModal();
        });
    
        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeModal();
        });
    });
    </script>


<style>
.glry-item { 
        transition: all 0.4s ease; 
        backface-visibility: hidden;
    }
.glry-item img { display: block; width: 100%; }
</style>
