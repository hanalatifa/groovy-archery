<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        (function() {
            const savedTheme = localStorage.getItem('ga-theme');
            const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const theme = savedTheme || (systemDark ? 'dark' : 'light');
            
            document.documentElement.setAttribute('data-theme', theme);
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    
    <style>
        :root {
            --body-bg: #ffffff;
            --body-text: #1f2937;
        }
        [data-theme="dark"] {
            --body-bg: #0f172a;
            --body-text: #f1f5f9;
        }
        body {
            background-color: var(--body-bg);
            color: var(--body-text);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dark body {
            color: #f1f5f9 !important;
        }

        .dark h1, .dark h2, .dark h3, .dark h4, .dark p, .dark span:not([class*="text-"]) {
            color: #f8fafc;
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden bg-white dark:bg-slate-900 text-gray-900 dark:text-gray-100 transition-colors duration-300">

    @include('src.components.navbar')

    <main>
        @include('landing.hero')
        @include('landing.marque')
        @include('landing.about-us')
        @include('landing.visi-misi')
        @include('landing.values')
        @include('landing.sunnah')
        @include('landing.stats')
        @include('landing.training')
        @include('landing.testimoni')
        @include('landing.cta-champions')
        @include('landing.contacts')
    </main>

    @include('src.components.footer')

    @include('src.components.modal-daftar')
    @include('src.components.modal-testimoni')

    @include('src.components.modal-testimoni')

    <script>
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
        
        if (currentIndex > maxIndex) currentIndex = maxIndex;

        const offset = currentIndex * (100 / perView);
        slider.style.transform = `translateX(-${offset}%)`;

        updateDots(maxIndex + 1);
    }

    function updateDots(totalDots) {
        dotsWrap.innerHTML = '';
        for (let i = 0; i < totalDots; i++) {
            const dot = document.createElement('button');
            dot.className = `h-2 rounded-full transition-all duration-300 ${i === currentIndex ? 'bg-[#2b459a] w-6' : 'bg-gray-300 w-2'}`;
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
</script>
</body>
</html>

