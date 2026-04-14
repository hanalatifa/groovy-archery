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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-white text-gray-900">

    {{-- navbar section --}}
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
            <a href="#" class="bg-[#2b459a] text-white px-6 py-2 font-medium">Login as Admin</a>
        </div>
    </nav>

        {{-- hero section --}}
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
                        class="bg-white text-black px-10 py-3 font-medium text-lg shadow-lg hover:bg-gray-100 transition inline-block">
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
            <p class="text-sm font-medium text-black uppercase mb-3">Visi dan Misi</p>
            <h2 class="text-4xl md:text-5xl font-semibold mb-4 text-gray-900">Mengapa Kami Ada?</h2>
            <p class="text-black">Choose the program that matches your experience and goals.</p>
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
        <section class="mx-auto px-6 py-20">
            <div class="text-center mb-12">
                <p class="text-[10px] font-medium text-black uppercase mb-2">Values</p>
                <h2 class="text-3xl md:text-4xl font-bold mb-3 text-gray-900">Apa yang kami perjuangkan</h2>
                <p class="text-black text-sm">Setiap tembakan itu penting. Setiap momen itu berarti.</p>
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
                    style="background: conic-gradient(from 0deg, #85488F, #254292, #85488F); z-index: 1;">
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

                <h2 class="text-3xl md:text-4xl font-bold mb-8 text-black tracking-tight leading-tight">
                    Dibangun di atas sunnah dan keahlian
                </h2>

                <p class="text-base md:text-lg leading-relaxed text-gray-600 font-light max-w-2xl mx-auto">
                    Klub Panahan ini berlandaskan pada nilai sunnah dalam olahraga panahan, yang tidak hanya melatih
                    keterampilan, tetapi juga membentuk karakter, fokus, dan kedisiplinan. Dengan menggabungkan nilai
                    spiritual dan teknik yang tepat, kami berkomitmen untuk terus berkembang menuju prestasi terbaik.
                </p>
            </div>
        </section>

        <section class="relative py-24 overflow-hidden bg-gradient-to-br from-[#85488F] to-[#254292]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-start gap-12 mb-20">
                    <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight max-w-xl">
                        Angka-angka yang mencerminkan komitmen kami
                    </h2>
                    <p class="text-white/80 text-lg max-w-md">
                        Para atlet kami telah meraih pengakuan di berbagai kompetisi tingkat regional dan nasional.
                        Prestasi ini merupakan buah dari dedikasi bertahun-tahun.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="relative p-10 rounded-sm border border-white/50 bg-gradient-to-br from-[#85488F] to-[#254292] text-center">
                        <div class="text-5xl md:text-7xl font-bold text-white mb-4">
                            <span class="counter" data-target="100">0</span>+
                        </div>
                        <p class="text-white uppercase text-sm font-medium">Member aktif</p>
                    </div>

                    <div
                        class="relative p-10 rounded-sm border border-white/50 bg-gradient-to-br from-[#85488F] to-[#254292] text-center">
                        <div class="text-5xl md:text-7xl font-bold text-white mb-4">
                            <span class="counter" data-target="45">0</span>+
                        </div>
                        <p class="text-white uppercase text-sm font-medium">Perlombaan</p>
                    </div>

                    <div
                        class="relative p-10 rounded-sm border border-white/50 bg-gradient-to-br from-[#85488F] to-[#254292] text-center">
                        <div class="text-5xl md:text-7xl font-bold text-white mb-4">
                            <span class="counter" data-target="9">0</span>
                        </div>
                        <p class="text-white uppercase text-sm font-medium">Tahun berdiri</p>
                    </div>
                </div>
            </div>
        </section>

        <script>
    const counters = document.querySelectorAll('.counter');
    const speed = 50;

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
                observer.unobserve(counter);
            }
        });
    };

    const options = {
        threshold: 0.5 
    };

    const counterObserver = new IntersectionObserver(startCounter, options);

    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
</script>
    </main>

    {{-- Training & Coaching Section --}}
     <section class="max-w-7xl mx-auto px-6 py-24 space-y-24">
    
    <div class="grid md:grid-cols-2 gap-10 items-center">
        <div class="flex flex-col justify-center">
            <div class="flex items-center gap-4 mb-10 text-gray-900">
                <span class="text-sm font-bold">02</span>
                <span class="text-sm font-bold uppercase tracking-wider">Training</span>
            </div>
            
            <p class="text-xs font-bold text-gray-400 uppercase mb-3">Program</p>
            <h2 class="text-5xl font-bold mb-8 text-black leading-tight">Pelatihan Bertahap</h2>
            
            <p class="text-gray-600 text-lg leading-relaxed mb-10 max-w-md">
                Program pelatihan kami dirancang untuk semua tingkatan, mulai dari pemula yang mempelajari dasar-dasar hingga atlet tingkat lanjut yang mengasah teknik bertanding. Setiap sesi dirancang untuk menghasilkan peningkatan yang terukur.
            </p>

            <div class="flex items-center gap-8">
                <a href="#" class="bg-[#e24a43] text-white px-10 py-3 font-bold hover:bg-red-700 transition shadow-sm">
                    Daftar
                </a>
                <a href="#" class="flex items-center gap-2 font-bold text-black hover:underline group">
                    Details 
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
        
        <div>
            <img src="{{ asset('assets/champion.jpeg') }}" alt="Training" class="w-full h-auto object-cover shadow-sm">
        </div>
    </div>

    {{-- <div class="border-t border-gray-100"></div> --}}

    <div class="grid md:grid-cols-2 gap-10 items-center">
        <div class="flex flex-col justify-center">
            <div class="flex items-center gap-4 mb-10 text-gray-900">
                <span class="text-sm font-bold">03</span>
                <span class="text-sm font-bold uppercase tracking-wider">Coaching</span>
            </div>

            <p class="text-xs font-bold text-gray-400 uppercase mb-3">Pelatihan</p>
            <h2 class="text-5xl font-bold mb-8 text-black leading-tight">Pelatihan Expert</h2>
            
            <p class="text-gray-600 text-lg leading-relaxed mb-10 max-w-md">
                Para pelatih kami memiliki pengalaman bertahun-tahun di bidang kompetisi serta pengetahuan teknis yang mendalam. Mereka akan mendampingi Anda secara pribadi untuk mengidentifikasi kelemahan, menyempurnakan teknik, dan mempersiapkan diri untuk kompetisi.
            </p>

            <div class="flex items-center gap-8">
                <a href="#" class="bg-[#e24a43] text-white px-10 py-3 font-bold hover:bg-red-700 transition shadow-sm">
                    Daftar
                </a>
                <a href="#" class="flex items-center gap-2 font-bold text-black hover:underline group">
                    Details 
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <div>
            <img src="{{ asset('assets/champion.jpeg') }}" alt="Coaching" class="w-full h-auto object-cover shadow-sm">
        </div>
    </div>
</section>

    {{-- testimoni section --}}
<section class="py-24 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-5xl font-extrabold mb-4 text-black tracking-tight">Testimoni Member</h2>
        <p class="text-gray-500 mb-20 italic">Dari harapan menjadi kenyataan</p>
        
        <div class="swiper mySwiper overflow-visible">
            <div class="swiper-wrapper flex items-stretch">
                
                <div class="swiper-slide h-auto">
                    <div class="bg-gradient-to-br from-[#6d5dfc] to-[#4c4494] p-10 text-left text-white rounded-sm shadow-xl flex flex-col justify-between h-full">
                        <div>
                            <div class="flex gap-1 mb-6">
                                @for($i=0; $i<5; $i++) <span class="text-yellow-400 text-xl">★</span> @endfor
                            </div>
                            <p class="text-lg leading-relaxed mb-8 opacity-90">"Coach nya berpengalaman dan dapat memberikan pengalaman latihan yang baik namun tegas. Latihan selalu terstruktur"</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-xs">IMG</div>
                            <div>
                                <p class="font-bold">Bunda Aqsa</p>
                                <p class="text-xs opacity-70">Club Member</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide h-auto">
                    <div class="bg-gradient-to-br from-[#6d5dfc] to-[#4c4494] p-10 text-left text-white rounded-sm shadow-xl flex flex-col justify-between h-full">
                        <div>
                            <div class="flex gap-1 mb-6">
                                @for($i=0; $i<5; $i++) <span class="text-yellow-400 text-xl">★</span> @endfor
                            </div>
                            <p class="text-lg leading-relaxed mb-8 opacity-90">"Sebelumnya aku ga tertarik ke panahan. tapi disini coachnya baik dan seru banget."</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-xs">IMG</div>
                            <div>
                                <p class="font-bold">Noorina</p>
                                <p class="text-xs opacity-70">Club member</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide h-auto">
                    <div class="bg-gradient-to-br from-[#6d5dfc] to-[#4c4494] p-10 text-left text-white rounded-sm shadow-xl flex flex-col justify-between h-full">
                        <div>
                            <div class="flex gap-1 mb-6">
                                @for($i=0; $i<5; $i++) <span class="text-yellow-400 text-xl">★</span> @endfor
                            </div>
                            <p class="text-lg leading-relaxed mb-8 opacity-90">"Setiap sesi coachnya selalu ontime, jarang bahkan hampir ga pernah terlambat."</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 text-xs">IMG</div>
                            <div>
                                <p class="font-bold">Raffasya</p>
                                <p class="text-xs opacity-70">Club Member</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="swiper-button-next text-black hover:scale-110 transition after:content-[''] after:text-4xl">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <div class="swiper-button-prev text-black hover:scale-110 transition after:content-[''] after:text-4xl">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            
            <div class="swiper-pagination !-bottom-12"></div>
        </div>

        <button class="mt-28 bg-[#2b459a] text-white px-10 py-3 font-medium hover:bg-blue-900 transition rounded-sm shadow-md">
            Beri Testimoni
        </button>
    </div>
</section>

<section class="py-24 bg-white text-center">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-5xl font-bold mb-6 text-black tracking-tight">Siap untuk menjadi champions?</h2>
        <p class="text-gray-600 text-xl mb-12">Bergabunglah dengan komunitas yang berlatih dengan tekad kuat dan bertindak dengan presisi.</p>
        
        <div class="flex justify-center gap-4">
            <a href="#" class="bg-[#2b459a] text-white px-10 py-4 font-medium rounded-sm hover:bg-blue-900 transition shadow-lg">
                Daftar
            </a>
            <a href="#" class="bg-[#e24a43] text-white px-10 py-4 font-medium rounded-sm hover:bg-red-700 transition shadow-lg">
                Hubungi Admin
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1, // Berapa slide yang muncul di mobile
            spaceBetween: 30, // Jarak antar slide
            loop: true, // Kembali ke awal setelah slide terakhir
            
            // Pengaturan untuk tombol panah
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            
            // Pengaturan untuk titik-titik indikator
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
        });
    });
</script>

    {{-- Contact section --}}
    <section class="max-w-7xl mx-auto px-6 py-24">
    <div class="mb-16">
        <p class="text-sm font-medium text-black mb-4">Connect</p>
        <h2 class="text-5xl font-bold text-black mb-6 tracking-tight">Kenali kami lebih jauh</h2>
        <p class="text-gray-600 text-lg">Ada pertanyaan tentang keanggotaan atau pelatihan? Kami siap membantu.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-16 items-start">
        <div class="space-y-12">
            <div class="flex flex-col gap-4">
                <div class="text-black">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-black mb-2">Email</h3>
                    <p class="text-gray-600 mb-1 text-sm">Informasi Email</p>
                    <a href="#" class="text-black font-medium">
                        groovyarcheryclub@gmail.com
                    </a>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <div class="text-black">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-black mb-2">Phone</h3>
                    <p class="text-gray-600 mb-1 text-sm">Hubungi kami pada jam kerja</p>
                    <a href="#" target="_blank" class="text-black font-medium transition">
                        +62 812 8800 5652 (Coach Romel)
                    </a>
                </div>
            </div>

            <div class="flex flex-col gap-4">
                <div class="text-black">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-black mb-2">Office</h3>
                    <p class="text-gray-600 leading-relaxed text-sm max-w-xs">
                        Jalan Kebon Bawang No. 63, Kebon Bawang, Jakarta, Daerah Khusus Ibukota Jakarta 14320
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 mt-6 font-medium text-black hover:underline group text-sm">
                        Tampilkan di peta
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full h-[500px] bg-gray-200 rounded-sm relative overflow-hidden flex items-center justify-center">
            <div class="flex flex-col items-center opacity-30">
                 <svg class="w-24 h-24 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                 </svg>
            </div>
            
            </div>
    </div>
</section>

    {{-- Footer --}}
    <footer class="bg-[#8b5a8c] text-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-20 mb-20">
            
            <div class="md:col-span-1">
                <div class="mb-8">
                    <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-16 w-auto">
                </div>
                <p class="text-sm mb-6 opacity-90">Get updates on competitions, training tips, and club news.</p>
                
                <form action="#" class="flex gap-2">
                    <input type="email" placeholder="Your email" 
                        class="w-full px-4 py-3 text-black text-sm focus:outline-none rounded-sm">
                    <button type="submit" 
                        class="bg-[#e24a43] hover:bg-red-700 px-6 py-3 font-bold transition rounded-sm text-sm">
                        Subscribe
                    </button>
                </form>
                <p class="text-[10px] mt-4 opacity-70 leading-relaxed">
                    By subscribing you agree to our Privacy Policy and consent to receive updates from the Archery Club Organization.
                </p>
            </div>

            <div>
                <h4 class="font-bold mb-8">About us</h4>
                <ul class="space-y-4 text-sm opacity-90">
                    <li><a href="#" class="hover:underline">Our story</a></li>
                    <li><a href="#" class="hover:underline">Athletes</a></li>
                    <li><a href="#" class="hover:underline">Training</a></li>
                    <li><a href="#" class="hover:underline">Events</a></li>
                    <li><a href="#" class="hover:underline">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-8">Resources</h4>
                <ul class="space-y-4 text-sm opacity-90">
                    <li><a href="#" class="hover:underline">Membership</a></li>
                    <li><a href="#" class="hover:underline">Facilities</a></li>
                    <li><a href="#" class="hover:underline">Coaching</a></li>
                    <li><a href="#" class="hover:underline">Schedule</a></li>
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-8">Follow us</h4>
                <ul class="space-y-4 text-sm opacity-90">
                    <li class="flex items-center gap-3">
                        <i class="fab fa-facebook text-lg"></i> <a href="#" class="hover:underline">Facebook</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-instagram text-lg"></i> <a href="#" class="hover:underline">Instagram</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-x-twitter text-lg"></i> <a href="#" class="hover:underline">X</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-linkedin text-lg"></i> <a href="#" class="hover:underline">LinkedIn</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-youtube text-lg"></i> <a href="#" class="hover:underline">YouTube</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs opacity-80">
            <p>© 2025 Archery Club Organization. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Service</a>
                <a href="#" class="hover:underline">Cookies Settings</a>
            </div>
        </div>
    </div>
</footer>

    {{-- swipe with js --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
