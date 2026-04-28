document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('testiSlider');
    const items = slider.querySelectorAll('.testi-item');
    const nextBtn = document.getElementById('testiNext');
    const prevBtn = document.getElementById('testiPrev');

    let currentIndex = 0;

    function scrollToCard(index) {
        if (index < 0) index = 0;
        if (index >= items.length) index = items.length - 1;
        
        currentIndex = index;
        
        // Gunakan scrollIntoView agar browser yang menghitung posisi
        items[currentIndex].scrollIntoView({
            behavior: 'smooth',
            block: 'nearest',
            inline: 'center' // Ini kuncinya agar kartu berada di tengah
        });
        
        updateButtons();
    }

    function updateButtons() {
        // Sembunyikan tombol jika sudah di paling ujung
        prevBtn.style.opacity = currentIndex === 0 ? "0" : "1";
        prevBtn.style.pointerEvents = currentIndex === 0 ? "none" : "auto";
        
        // Di desktop (3 kartu), tombol next hilang lebih awal
        const offset = window.innerWidth >= 768 ? 3 : 1;
        nextBtn.style.opacity = currentIndex >= items.length - offset ? "0" : "1";
        nextBtn.style.pointerEvents = currentIndex >= items.length - offset ? "none" : "auto";
    }

    nextBtn.addEventListener('click', () => {
        scrollToCard(currentIndex + 1);
    });

    prevBtn.addEventListener('click', () => {
        scrollToCard(currentIndex - 1);
    });

    // Jalankan pengecekan tombol saat awal
    updateButtons();

    // Biarkan user scroll manual (touch), tapi update index-nya
    slider.addEventListener('scroll', () => {
        clearTimeout(window.scrollFinished);
        window.scrollFinished = setTimeout(() => {
            const index = Math.round(slider.scrollLeft / items[0].offsetWidth);
            currentIndex = index;
            updateButtons();
        }, 100);
    });
});