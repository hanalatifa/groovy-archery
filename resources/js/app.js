import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css' 

// ════════════════════════════════════════
//  COUNTER ANGKA (section stats)
// ════════════════════════════════════════
const counterObs = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el     = entry.target;
        const target = +el.dataset.target;
        const inc    = target / 60;
        const update = () => {
            const cur = +el.innerText;
            if (cur < target) { el.innerText = Math.ceil(cur + inc); setTimeout(update, 18); }
            else el.innerText = target;
        };
        update();
        obs.unobserve(el);
    });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach(c => counterObs.observe(c));


// ════════════════════════════════════════
//  FADE UP ON SCROLL
// ════════════════════════════════════════
const fadeObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            fadeObs.unobserve(e.target);
        }
    });
}, { threshold: 0.12 });
document.querySelectorAll('.fade-up').forEach(el => fadeObs.observe(el));

// TESTIMONI SLIDER
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('testiSlider');
    const cards = document.querySelectorAll('.testi-card');
    const dotsWrap = document.getElementById('testiDots');
    
    let currentIndex = 0;

    function getItemsPerView() {
        return window.innerWidth >= 768 ? 3 : 1;
    }

    function updateSlider() {
        const perView = getItemsPerView();
        const maxIndex = Math.max(0, cards.length - perView);
        
        // Mencegah index melampaui batas agar tidak ada area kosong
        if (currentIndex > maxIndex) currentIndex = maxIndex;

        // Hitung geseran: 100% dibagi jumlah item yang tampil
        const offset = currentIndex * (100 / perView);
        slider.style.transform = `translateX(-${offset}%)`;

        updateDots(maxIndex + 1);
    }

    function updateDots(totalDots) {
        dotsWrap.innerHTML = '';
        for (let i = 0; i < totalDots; i++) {
            const dot = document.createElement('button');
            dot.className = `h-2 transition-all duration-300 ${i === currentIndex ? 'bg-[#2b459a] w-6' : 'bg-gray-300 w-2'}`;
            dot.onclick = () => {
                currentIndex = i;
                updateSlider();
            };
            dotsWrap.appendChild(dot);
        }
    }

    document.getElementById('testiNext').addEventListener('click', () => {
        const perView = getItemsPerView();
        if (currentIndex < cards.length - perView) {
            currentIndex++;
        } else {
            currentIndex = 0; // Balik ke awal
        }
        updateSlider();
    });

    document.getElementById('testiPrev').addEventListener('click', () => {
        const perView = getItemsPerView();
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = Math.max(0, cards.length - perView); // Lompat ke akhir
        }
        updateSlider();
    });

    // Support Swipe di HP (Touch)
    let startX = 0;
    slider.addEventListener('touchstart', e => startX = e.touches[0].clientX);
    slider.addEventListener('touchend', e => {
        const endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) document.getElementById('testiNext').click();
        if (endX - startX > 50) document.getElementById('testiPrev').click();
    });

    window.addEventListener('resize', updateSlider);
    updateSlider(); // Init
});


// ════════════════════════════════════════
//  TOAST NOTIFIKASI
// ════════════════════════════════════════
function showToast(msg) {
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = `
        <div class="toast-icon">
            <svg width="12" height="12" fill="none" stroke="white" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <span>${msg}</span>`;
    document.body.appendChild(toast);
    setTimeout(() => {
        toast.classList.add('hide');
        setTimeout(() => toast.remove(), 400);
    }, 3500);
}


// ════════════════════════════════════════
//  MODAL TESTIMONI
// ════════════════════════════════════════
const testiModal     = document.getElementById('testiModal');
const openTestiBtn   = document.getElementById('openTestiModal');
const closeTestiBtn  = document.getElementById('closeTestiModal');
const cancelTestiBtn = document.getElementById('cancelTesti');
const submitTestiBtn = document.getElementById('submitTesti');

if (testiModal) {
    function openTestiModal()  { testiModal.classList.add('open');    document.body.style.overflow = 'hidden'; }
    function closeTestiModal() { testiModal.classList.remove('open'); document.body.style.overflow = ''; }

    openTestiBtn?.addEventListener('click', openTestiModal);
    closeTestiBtn?.addEventListener('click', closeTestiModal);
    cancelTestiBtn?.addEventListener('click', closeTestiModal);

    // Tutup kalau klik area gelap
    testiModal.addEventListener('click', e => { if (e.target === testiModal) closeTestiModal(); });

    submitTestiBtn?.addEventListener('click', () => {
        const nama      = document.getElementById('testiNama').value.trim();
        const rating    = document.querySelector('input[name="rating"]:checked');
        const deskripsi = document.getElementById('testiDeskripsi').value.trim();

        document.getElementById('errNama').classList.toggle('hidden', !!nama);
        document.getElementById('errRating').classList.toggle('hidden', !!rating);
        document.getElementById('errDeskripsi').classList.toggle('hidden', !!deskripsi);

        if (!nama || !rating || !deskripsi) return;

        closeTestiModal();

        // Reset form
        document.getElementById('testiNama').value = '';
        document.getElementById('testiDeskripsi').value = '';
        document.querySelectorAll('input[name="rating"]').forEach(r => r.checked = false);

        showToast('Testimoni berhasil dikirim! Terima kasih 🎯');
    });
}


// ════════════════════════════════════════
//  MODAL DAFTAR
// ════════════════════════════════════════
const daftarModal = document.getElementById('daftarModal');

// Fungsi global dipasang ke window supaya bisa dipanggil dari onclick="..." di Blade
window.openDaftarModal  = function() { daftarModal.classList.add('open');    document.body.style.overflow = 'hidden'; };
window.closeDaftarModal = function() { daftarModal.classList.remove('open'); document.body.style.overflow = ''; };

if (daftarModal) {
    // Tutup kalau klik backdrop gelap
    daftarModal.addEventListener('click', e => { if (e.target === daftarModal) window.closeDaftarModal(); });

    // Tab lokasi — switch peta
    document.querySelectorAll('.lokasi-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.lokasi-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.lokasi-map').forEach(m => m.classList.remove('active'));
            tab.classList.add('active');
            document.getElementById('map-' + tab.dataset.lokasi).classList.add('active');
        });
    });

    // Submit → WhatsApp
    document.getElementById('submitDaftar')?.addEventListener('click', () => {
        const nama      = document.getElementById('daftarNama').value.trim();
        const umur      = document.getElementById('daftarUmur').value.trim();
        const program   = document.querySelector('input[name="daftarProgram"]:checked');
        const lokasiTab = document.querySelector('.lokasi-tab.active');

        document.getElementById('errDaftarNama').classList.toggle('hidden', !!nama);
        document.getElementById('errDaftarUmur').classList.toggle('hidden', !!umur);
        document.getElementById('errDaftarProgram').classList.toggle('hidden', !!program);
        document.getElementById('errDaftarLokasi').classList.toggle('hidden', !!lokasiTab);

        if (!nama || !umur || !program || !lokasiTab) return;

        const lokasiMap = {
            grtp: 'Lapangan GRTP Sunter',
            bmw:  'Lapangan BMW JIS',
            yon:  'Lapangan Yon Arhanud',
        };

        // Redirest pesan ke WA
        const waNumber = '6281214711219';
        const pesan =
            `Halo Coach Groovy Archery! \n\n` +
            `Saya ingin mendaftar dengan detail berikut:\n\n` +
            `Nama: ${nama}\n` +
            `Umur: ${umur} tahun\n` +
            `Program: ${program.value}\n` +
            `Lokasi Latihan: ${lokasiMap[lokasiTab.dataset.lokasi]}\n\n` +
            `Bisa bantu saya untuk menentukan jadwal? \n Terima kasih!`;

        window.closeDaftarModal();

        // Reset form
        document.getElementById('daftarNama').value = '';
        document.getElementById('daftarUmur').value = '';
        document.querySelectorAll('input[name="daftarProgram"]').forEach(r => r.checked = false);

        window.open(`https://wa.me/${waNumber}?text=${encodeURIComponent(pesan)}`, '_blank');
    });
}