<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-white text-gray-900">

    <nav class="flex items-center justify-between px-10 py-6 bg-white sticky top-0 z-50">
        <div class="flex items-center">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-10">
        </div>
        <div class="hidden md:flex items-center space-x-8">
            <a href="#" class="text-gray-700 font-medium">Home</a>
            <a href="#" class="text-gray-700 font-medium">Athletes</a>
            <a href="#" class="text-gray-700 font-medium">Achievement</a>
            <button class="flex items-center text-gray-700 font-medium">
                More <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <a href="#" class="bg-[#2b459a] text-white px-6 py-2 rounded-md font-medium">Login as Admin</a>
        </div>
    </nav>

    <main>
        <section class="px-6 md:px-20 py-10">
            <div
                class="relative w-full max-w-7xl mx-auto h-[600px] overflow-hidden flex items-center justify-center text-center text-white">

                <img src="{{ asset('assets/hero-image.jpeg') }}" alt="Archery Field"
                    class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-black/40"></div>

                <div class="relative z-10 px-6">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                        Selamat datang, Archers.
                    </h1>
                    <p class="text-lg md:text-xl font-light mb-10 max-w-3xl mx-auto leading-relaxed">
                        The Archery Club brings together dedicated athletes committed to excellence. We train with
                        purpose, compete with precision, and build a community bound by respect for the sport.
                    </p>
                    <a href="#"
                        class="bg-white text-gray-900 px-10 py-3 font-semibold text-lg shadow-lg hover:bg-gray-100 transition inline-block">
                        Daftar Sebagai Member
                    </a>
                </div>
            </div>
        </section>

        {{-- About Us Section --}}
        <section class="max-w-4xl mx-auto px-20 py-20 text-center">
            <p class="text-sm font-medium text-gray-900 uppercase mb-3">Tentang Kami</p>
            <h2 class="text-4xl md:text-5xl font-semibold mb-8 text-gray-900">Groovy Archery</h2>
            <div class="space-x-5 text-gray-600 text-lg leading-relaxed">
                <p>Bagi pecinta olahraga panahan, kami menghadirkan klub panahan yang berlokasi di Tanjung Priok,
                    Jakarta Utara.</p>
                <p> Klub ini dirancang ramah anak, dengan fokus pada pembentukan karakter, disiplin, serta pengembangan
                    keterampilan memanah dalam lingkungan yang positif dan suportif.</p>
                <p> Dengan identitas visual yang didominasi warna ungu, kami menciptakan suasana yang unik, modern, dan
                    berkarakter.</p>
            </div>
        </section>

        {{-- Visi Misi Section --}}
        <section class="text-center pb-12">
            <p class="text-sm font-medium text-gray-900 uppercase mb-3">Visi dan Misi</p>
            <h2 class="text-4xl md:text-5xl font-semibold mb-4 text-gray-900">Mengapa Kami Ada?</h2>
            <p class="text-gray-400 italic">Choose the program that matches your experience and goals.</p>
        </section>

        <section class="max-w-7xl mx-auto px-6 pb-24 grid md:grid-cols-2 gap-6">
            <div class="relative rounded-sm h-[550px] overflow-hidden group shadow-lg">
                <img src="{{ asset('assets/image 1.jpeg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 to-transparent"></div>
                <div class="absolute bottom-0 p-12 text-white">
                    <p class="text-sm mb-2 opacity-80 uppercase tracking-widest">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-6">Visi</h3>
                    <p class="text-xl font-light leading-relaxed">Melalui olahraga panahan menciptakan atlet-atlet
                        panahan yang berprestasi dan berakhlakul karimah</p>
                </div>
            </div>

            <div class="relative rounded-sm h-[550px] overflow-hidden group shadow-lg">
                <img src="{{ asset('assets/champion.jpeg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 to-transparent"></div>
                <div class="absolute bottom-0 p-12 text-white">
                    <p class="text-sm mb-2 opacity-80 uppercase tracking-widest">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-6">Misi</h3>
                    <ul class="space-x-3 text-lg font-light leading-snug">
                        <li>1. Memasalkan olahraga panahan di Sekolah-Sekolah dan lingkungan sekitar</li>
                        <li>2. Menjadikan olahraga panahan wadah untuk pengembangan karakter</li>
                        <li>3. Membantu atlet mengembangkan bakat dan kemampuan memanah hingga mencapai jalur prestasi
                        </li>
                        <li>4. Mencetak pemanah-pemanah berprestasi yang mampu mengharumkan nama bangsa di kancah
                            Nasional dan Internasional</li>
                    </ul>
                </div>
            </div>
        </section>

        {{-- card value --}}
        <section class="max-w-7xl mx-auto px-6 py-20 font-sans">
            <div class="text-center mb-12">
                <p class="text-[10px] font-bold tracking-[0.3em] text-gray-400 uppercase mb-2">Values</p>
                <h2 class="text-3xl md:text-4xl font-extrabold mb-3 text-gray-900">Apa yang kami perjuangkan</h2>
                <p class="text-gray-500 text-sm">Setiap tembakan itu penting. Setiap momen itu berarti.</p>
            </div>

            <div class="flex flex-col md:flex-row gap-6 w-full md:h-[550px] items-stretch justify-center">

                <div
                    class="group relative w-full md:w-[300px] hover:md:w-[600px] flex flex-col hover:md:flex-row bg-[#4c4494] text-white overflow-hidden transition-all duration-500 ease-in-out cursor-pointer shadow-xl rounded-sm shrink-0">
                    <div
                        class="w-full h-[50%] md:h-[50%] group-hover:md:h-full group-hover:md:w-1/2 shrink-0 transition-all duration-500">
                        <img src="{{ asset('assets/latihanrutin1.jpeg') }}" alt="Ketepatan"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="p-8 flex flex-col justify-between flex-grow transition-all duration-500 min-w-[300px]">
                        <div
                            class="flex flex-col flex-grow justify-start group-hover:justify-center transition-all duration-500">
                            <div>
                                <p class="text-[10px] uppercase tracking-widest text-blue-200 mb-2 opacity-80">Ketepatan
                                </p>
                                <h4 class="text-xl md:text-2xl font-bold mb-4 leading-tight transition-all">Ketepatan
                                    dalam gerakan</h4>

                                <div
                                    class="max-h-[100px] group-hover:max-h-[300px] overflow-hidden opacity-100 transition-all duration-500">
                                    <p class="text-sm leading-relaxed text-blue-100/80 mb-8">
                                        The arrow finds its mark through steady hands and unwavering focus. We demand
                                        nothing less than perfection.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <a href="#"
                            class="inline-flex items-center text-xs font-bold tracking-widest uppercase mt-4 shrink-0">
                            Jelajah <svg class="ml-2 w-3 h-3 transition-transform group-hover:translate-x-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div
                    class="group relative w-full md:w-[300px] hover:md:w-[600px] flex flex-col hover:md:flex-row bg-[#4c4494] text-white overflow-hidden transition-all duration-500 ease-in-out cursor-pointer shadow-xl rounded-sm shrink-0">
                    <div
                        class="w-full h-[50%] md:h-[50%] group-hover:md:h-full group-hover:md:w-1/2 shrink-0 transition-all duration-500">
                        <img src="{{ asset('assets/latihanrutin1.jpeg') }}" alt="Disiplin"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-8 flex flex-col justify-between flex-grow transition-all duration-500 min-w-[300px]">
                        <div
                            class="flex flex-col flex-grow justify-start group-hover:justify-center transition-all duration-500">
                            <div>
                                <p class="text-[10px] uppercase tracking-widest text-blue-200 mb-2 opacity-80">Disiplin
                                </p>
                                <h4 class="text-xl md:text-2xl font-bold mb-4 leading-tight">Latihan yang terarah</h4>
                                <div
                                    class="max-h-[100px] group-hover:max-h-[300px] overflow-hidden opacity-100 transition-all duration-500">
                                    <p class="text-sm leading-relaxed text-blue-100/80 mb-8">
                                        Discipline separates the serious from the casual. Our athletes train
                                        relentlessly, refining technique.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center text-xs font-bold tracking-widest uppercase mt-4 shrink-0">
                            Jelajah <svg class="ml-2 w-3 h-3 transition-transform group-hover:translate-x-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div
                    class="group relative w-full md:w-[300px] hover:md:w-[600px] flex flex-col hover:md:flex-row bg-[#4c4494] text-white overflow-hidden transition-all duration-500 ease-in-out cursor-pointer shadow-xl rounded-sm shrink-0">
                    <div
                        class="w-full h-[50%] md:h-[50%] group-hover:md:h-full group-hover:md:w-1/2 shrink-0 transition-all duration-500">
                        <img src="{{ asset('assets/latihanrutin1.jpeg') }}" alt="Keunggulan"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-8 flex flex-col justify-between flex-grow transition-all duration-500 min-w-[300px]">
                        <div
                            class="flex flex-col flex-grow justify-start group-hover:justify-center transition-all duration-500">
                            <div>
                                <p class="text-[10px] uppercase tracking-widest text-blue-200 mb-2 opacity-80">
                                    Keunggulan</p>
                                <h4 class="text-xl md:text-2xl font-bold mb-4 leading-tight">Keunggulan atlet</h4>
                                <div
                                    class="max-h-[100px] group-hover:max-h-[300px] overflow-hidden opacity-100 transition-all duration-500">
                                    <p class="text-sm leading-relaxed text-blue-100/80 mb-8">
                                        Keunggulan bukanlah tujuan akhir, melainkan upaya yang terus-menerus. Kami
                                        berkompetisi di level tertinggi.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center text-xs font-bold tracking-widest uppercase mt-4 shrink-0">
                            Jelajah <svg class="ml-2 w-3 h-3 transition-transform group-hover:translate-x-2"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7" stroke-width="3" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        {{-- sunnah section --}}
        <section class="max-w-7xl mx-auto px-6 py-24 font-sans bg-white">
            <div class="relative flex justify-center items-center mb-16 mx-auto" style="max-width: fit-content;">

                <div class="absolute inset-[-4px] md:inset-[-8px] rounded-lg animate-spin-slow blur-[1px]"
                    style="background: conic-gradient(from 0deg, #4c4494, #a78bfa, #4c4494); z-index: 1;">
                </div>

                <div class="relative rounded-sm overflow-hidden shadow-2xl bg-white" style="z-index: 2;">
                    <img src="{{ asset('assets/sunnaharchery.jpeg') }}" alt="United Through Archery"
                        class="w-full h-auto object-cover max-w-[900px]">
                </div>
            </div>

            <div class="text-center max-w-3xl mx-auto px-4">
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('assets/Logo.jpeg') }}" alt="Logo" class="w-14 h-14 object-contain">
                </div>

                <h2 class="text-3xl md:text-5xl font-extrabold mb-8 text-gray-900 tracking-tight leading-tight">
                    Dibangun di atas sunnah dan keahlian
                </h2>

                <p class="text-base md:text-lg leading-relaxed text-gray-600 font-light max-w-2xl mx-auto">
                    Klub Panahan ini berlandaskan pada nilai sunnah dalam olahraga panahan, yang tidak hanya melatih
                    keterampilan, tetapi juga membentuk karakter, fokus, dan kedisiplinan. Dengan menggabungkan nilai
                    spiritual dan teknik yang tepat, kami berkomitmen untuk terus berkembang menuju prestasi terbaik.
                </p>
            </div>
        </section>

        <section class="relative py-24 overflow-hidden bg-gradient-to-br from-[#4c4494] via-[#6d5dfc] to-[#4c4494]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-start gap-12 mb-20">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-white leading-tight max-w-xl">
                        Angka-angka yang mencerminkan komitmen kami
                    </h2>
                    <p class="text-blue-100/80 text-lg max-w-md">
                        Para atlet kami telah meraih pengakuan di berbagai kompetisi tingkat regional dan nasional.
                        Prestasi ini merupakan buah dari dedikasi bertahun-tahun.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="relative p-10 rounded-sm border border-white/20 bg-white/5 backdrop-blur-sm text-center">
                        <div class="text-5xl md:text-7xl font-black text-white mb-4">
                            <span class="counter" data-target="100">0</span>+
                        </div>
                        <p class="text-blue-200 uppercase tracking-widest text-sm font-bold">Member aktif</p>
                    </div>

                    <div
                        class="relative p-10 rounded-sm border border-white/20 bg-white/5 backdrop-blur-sm text-center">
                        <div class="text-5xl md:text-7xl font-black text-white mb-4">
                            <span class="counter" data-target="45">0</span>+
                        </div>
                        <p class="text-blue-200 uppercase tracking-widest text-sm font-bold">Perlombaan</p>
                    </div>

                    <div
                        class="relative p-10 rounded-sm border border-white/20 bg-white/5 backdrop-blur-sm text-center">
                        <div class="text-5xl md:text-7xl font-black text-white mb-4">
                            <span class="counter" data-target="9">0</span>
                        </div>
                        <p class="text-blue-200 uppercase tracking-widest text-sm font-bold">Tahun berdiri</p>
                    </div>
                </div>
            </div>
        </section>

        <style>
            @keyframes spin-slow {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .animate-spin-slow {
                animation: spin-slow 6s linear infinite;
            }
        </style>

        <script>
    const counters = document.querySelectorAll('.counter');
    const speed = 50; // Semakin kecil angka, semakin cepat hitungannya

    const startCounter = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = +counter.getAttribute('data-target');

                const updateCount = () => {
                    const count = +counter.innerText;
                    const inc = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCount();
                // Hentikan observer setelah animasi jalan sekali
                observer.unobserve(counter);
            }
        });
    };

    const options = {
        threshold: 0.5 // Animasi mulai saat 50% section terlihat di layar
    };

    const counterObserver = new IntersectionObserver(startCounter, options);

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
</script>

    </main>
</body>

</html>
