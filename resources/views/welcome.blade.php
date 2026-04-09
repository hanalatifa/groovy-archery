<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery - Landing Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="antialiased bg-white text-gray-900">

    <nav class="flex items-center justify-between px-10 py-6 bg-white sticky top-0 z-50">
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
        </div>
        <div class="hidden md:flex items-center space-x-8">
            <a href="#" class="text-gray-700 font-medium">Home</a>
            <a href="#" class="text-gray-700 font-medium">Athletes</a>
            <a href="#" class="text-gray-700 font-medium">Achievement</a>
            <button class="flex items-center text-gray-700 font-medium">
                More <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <a href="#" class="bg-[#2b459a] text-white px-6 py-2 rounded-md font-medium">Login as Admin</a>
        </div>
    </nav>

    <main>
        <section class="px-6 md:px-20 py-10">
            <div class="relative w-full max-w-7xl mx-auto h-[600px] overflow-hidden flex items-center justify-center text-center text-white">
                
                <img src="{{ asset('assets/hero-image.jpeg') }}" alt="Archery Field" class="absolute inset-0 w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-black/40"></div>

                <div class="relative z-10 px-6">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                        Selamat datang, Archers.
                    </h1>
                    <p class="text-lg md:text-xl font-light mb-10 max-w-3xl mx-auto leading-relaxed">
                        The Archery Club brings together dedicated athletes committed to excellence. We train with purpose, compete with precision, and build a community bound by respect for the sport.
                    </p>
                    <a href="#" class="bg-white text-gray-900 px-10 py-3 font-semibold text-lg shadow-lg hover:bg-gray-100 transition inline-block">
                        Daftar Sebagai Member
                    </a>
                </div>
            </div>
        </section>

        <section class="max-w-4xl mx-auto px-6 py-20 text-center">
            <p class="text-sm font-semibold tracking-[0.2em] text-gray-400 uppercase mb-3">Tentang Kami</p>
            <h2 class="text-4xl md:text-5xl font-extrabold mb-8 text-gray-900">Groovy Archery</h2>
            <div class="space-y-5 text-gray-600 text-lg leading-relaxed">
                <p>Bagi pecinta olahraga panahan, kami menghadirkan klub panahan yang berlokasi di <span class="font-bold text-gray-800">Tanjung Priok, Jakarta Utara.</span></p>
                <p>Klub ini dirancang ramah anak, dengan fokus pada pembentukan karakter, disiplin, serta pengembangan keterampilan memanah dalam lingkungan yang positif dan suportif.</p>
                <p>Dengan identitas visual yang didominasi warna ungu, kami menciptakan suasana yang unik, modern, dan berkarakter.</p>
            </div>
        </section>

        <section class="text-center pb-12">
            <p class="text-sm font-semibold tracking-[0.2em] text-gray-400 uppercase mb-3">Visi dan Misi</p>
            <h2 class="text-4xl md:text-5xl font-extrabold mb-4 text-gray-900">Mengapa Kami Ada?</h2>
            <p class="text-gray-400 italic">Choose the program that matches your experience and goals.</p>
        </section>

        <section class="max-w-7xl mx-auto px-6 pb-24 grid md:grid-cols-2 gap-6">
            <div class="relative rounded-sm h-[550px] overflow-hidden group shadow-lg">
                <img src="{{ asset('images/visi-bg.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 to-transparent"></div>
                <div class="absolute bottom-0 p-12 text-white">
                    <p class="text-sm mb-2 opacity-80 uppercase tracking-widest">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-6">Visi</h3>
                    <p class="text-xl font-light leading-relaxed">Melalui olahraga panahan menciptakan atlet-atlet panahan yang berprestasi dan berakhlakul karimah</p>
                </div>
            </div>

            <div class="relative rounded-sm h-[550px] overflow-hidden group shadow-lg">
                <img src="{{ asset('images/misi-bg.jpg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 to-transparent"></div>
                <div class="absolute bottom-0 p-12 text-white">
                    <p class="text-sm mb-2 opacity-80 uppercase tracking-widest">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-6">Misi</h3>
                    <ul class="space-y-3 text-lg font-light leading-snug">
                        <li>1. Memasalkan olahraga panahan di Sekolah-Sekolah dan lingkungan sekitar</li>
                        <li>2. Menjadikan olahraga panahan wadah untuk pengembangan karakter</li>
                        <li>3. Membantu atlet mengembangkan bakat dan kemampuan memanah hingga mencapai jalur prestasi</li>
                        <li>4. Mencetak pemanah-pemanah berprestasi yang mampu mengharumkan nama bangsa di kancah Nasional dan Internasional</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>
</html>