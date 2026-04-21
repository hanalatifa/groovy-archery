{{-- ═══ LIGHTBOX ═══ --}}
<div id="glryLightbox"
     class="fixed inset-0 z-[9999] bg-black/95 backdrop-blur-sm
            opacity-0 pointer-events-none transition-opacity duration-300
            flex items-center justify-center"
     onclick="if(event.target===this) closeLightbox()">

    {{-- Tombol close --}}
    <button onclick="closeLightbox()"
            class="absolute top-6 right-6 z-10 w-10 h-10 rounded-full bg-white/10 border border-white/15
                   flex items-center justify-center hover:bg-white/20 transition-colors group">
        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    {{-- Counter --}}
    <div class="absolute top-6 left-1/2 -translate-x-1/2 z-10">
        <span id="lbCounter" class="text-white/40 text-xs font-black uppercase tracking-widest"></span>
    </div>

    {{-- Prev --}}
    <button onclick="lbNav(-1)"
            class="absolute left-4 md:left-8 z-10 w-12 h-12 rounded-full bg-white/8 border border-white/10
                   flex items-center justify-center hover:bg-white/20 transition-all duration-200 group">
        <svg class="w-5 h-5 text-white transition-transform group-hover:-translate-x-0.5"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>

    {{-- Next --}}
    <button onclick="lbNav(1)"
            class="absolute right-4 md:right-8 z-10 w-12 h-12 rounded-full bg-white/8 border border-white/10
                   flex items-center justify-center hover:bg-white/20 transition-all duration-200 group">
        <svg class="w-5 h-5 text-white transition-transform group-hover:translate-x-0.5"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- Konten --}}
    <div class="relative max-w-5xl w-full mx-4 md:mx-20 flex flex-col items-center">

        {{-- Gambar --}}
        <div class="relative w-full overflow-hidden rounded-2xl">
            <img id="lbImg" src="" alt=""
                 class="w-full max-h-[72vh] object-contain transition-all duration-400">

            {{-- Shimmer loading --}}
            <div id="lbShimmer"
                 class="absolute inset-0 bg-white/5 animate-pulse rounded-2xl"></div>
        </div>

        {{-- Info bawah --}}
        <div class="w-full mt-6 flex items-start justify-between gap-6">
            <div class="flex-1">
                <div id="lbTag"
                     class="inline-block text-[9px] font-black uppercase tracking-[4px] text-white/40 mb-2"></div>
                <h2 id="lbJudul"
                    class="text-white font-black text-xl md:text-2xl leading-tight mb-2"></h2>
                <p id="lbDesk"
                   class="text-white/50 text-sm leading-relaxed max-w-xl font-light"></p>
            </div>

            {{-- Keyboard hint --}}
            <div class="hidden md:flex items-center gap-2 shrink-0 opacity-30">
                <kbd class="bg-white/10 border border-white/15 rounded px-2 py-1 text-[10px] font-black text-white">←</kbd>
                <kbd class="bg-white/10 border border-white/15 rounded px-2 py-1 text-[10px] font-black text-white">→</kbd>
                <span class="text-white/40 text-[10px] font-bold">navigasi</span>
            </div>
        </div>

    </div>
</div>

<script>
let lbCurrent = 0;
const lbData  = window.glryData || [];

function openLightbox(idx) {
    lbCurrent = idx;
    renderLightbox();
    const lb = document.getElementById('glryLightbox');
    lb.classList.remove('opacity-0', 'pointer-events-none');
    lb.classList.add('opacity-100');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lb = document.getElementById('glryLightbox');
    lb.classList.add('opacity-0', 'pointer-events-none');
    lb.classList.remove('opacity-100');
    document.body.style.overflow = '';
}

function lbNav(dir) {
    lbCurrent = (lbCurrent + dir + lbData.length) % lbData.length;
    renderLightbox();
}

function renderLightbox() {
    const d       = lbData[lbCurrent];
    const img     = document.getElementById('lbImg');
    const shimmer = document.getElementById('lbShimmer');

    shimmer.classList.remove('hidden');
    img.style.opacity = '0';

    img.onload = () => {
        img.style.transition = 'opacity .3s ease';
        img.style.opacity    = '1';
        shimmer.classList.add('hidden');
    };
    img.src = d.src || '';
    img.alt = d.judul || '';

    document.getElementById('lbJudul').textContent  = d.judul || '';
    document.getElementById('lbDesk').textContent   = d.desk  || '';
    document.getElementById('lbTag').textContent    = d.tag   || '';
    document.getElementById('lbCounter').textContent =
        (lbCurrent + 1) + ' / ' + lbData.length;
}

// Keyboard navigation
document.addEventListener('keydown', e => {
    const lb = document.getElementById('glryLightbox');
    if (lb.classList.contains('opacity-0')) return;
    if (e.key === 'ArrowRight') lbNav(1);
    if (e.key === 'ArrowLeft')  lbNav(-1);
    if (e.key === 'Escape')     closeLightbox();
});
</script>