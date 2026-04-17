<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { opacity: 0; }
        .fade-up.visible { animation: fadeUp 0.7s ease forwards; }
        .delay-1 { animation-delay: 0.08s; }
        .delay-2 { animation-delay: 0.18s; }
        .delay-3 { animation-delay: 0.28s; }
        .delay-4 { animation-delay: 0.40s; }

        @keyframes marquee {
            from { transform: translateX(0); }
            to   { transform: translateX(-50%); }
        }
        .marquee-track { animation: marquee 22s linear infinite; display: flex; width: max-content; }

        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .gradient-animated {
            background: linear-gradient(135deg, #85488F, #254292, #6b3fa0, #1a3580, #85488F);
            background-size: 300% 300%;
            animation: gradientShift 9s ease infinite;
        }

        .value-card { transition: width 0.55s cubic-bezier(0.4,0,0.2,1), box-shadow 0.3s ease; }
        .value-desc { max-height: 0; overflow: hidden; opacity: 0; transition: max-height 0.45s ease, opacity 0.35s ease; }
        .value-card:hover .value-desc { max-height: 150px; opacity: 1; }
        .value-card:hover { box-shadow: 0 28px 56px rgba(0,0,0,0.28); }

        .img-frame { position: relative; }
        .img-frame::before {
            content: '';
            position: absolute;
            inset: 0;
            border: 2px solid rgba(43,69,154,0.18);
            transform: translate(10px, 10px);
            transition: transform 0.5s ease;
            z-index: 0;
        }
        .img-frame:hover::before { transform: translate(14px, 14px); }
        .img-frame img { position: relative; z-index: 1; }

        .stat-card { transition: transform 0.3s ease; }
        .stat-card:hover { transform: translateY(-8px); }

        .vismis-card img { transition: transform 0.7s cubic-bezier(0.4,0,0.2,1); }
        .vismis-card:hover img { transform: scale(1.06); }
        .vismis-underline { width: 36px; height: 2px; background: rgba(255,255,255,0.3); border-radius: 2px; transition: width 0.4s ease; }
        .vismis-card:hover .vismis-underline { width: 68px; }

        @keyframes scrollDot {
            0%, 100% { opacity: 0.2; transform: translateY(0); }
            50%       { opacity: 0.7; transform: translateY(4px); }
        }
        .scroll-dot { animation: scrollDot 1.6s ease infinite; }
        .scroll-dot:nth-child(2) { animation-delay: 0.2s; }
        .scroll-dot:nth-child(3) { animation-delay: 0.4s; }

        /* ── Testimoni slider ── */
        .testi-slider { display: flex; transition: transform 0.45s cubic-bezier(0.4,0,0.2,1); }
        .testi-card { flex-shrink: 0; }

        /* ── Popup modal ── */
        .modal-backdrop {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(3px);
            z-index: 9999;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none;
            transition: opacity 0.25s ease;
        }
        .modal-backdrop.open { opacity: 1; pointer-events: all; }
        .modal-box {
            background: #fff;
            border-radius: 12px;
            padding: 36px;
            width: 100%;
            max-width: 460px;
            transform: translateY(16px) scale(0.97);
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        .modal-backdrop.open .modal-box { transform: translateY(0) scale(1); }

        /* ── Star rating ── */
        .star-input { display: flex; flex-direction: row-reverse; justify-content: flex-end; gap: 4px; }
        .star-input input { display: none; }
        .star-input label {
            font-size: 28px; color: #d1d5db; cursor: pointer;
            transition: color 0.15s ease;
        }
        .star-input label:hover,
        .star-input label:hover ~ label,
        .star-input input:checked ~ label { color: #f59e0b; }

        /* ── Toast notif ── */
        @keyframes toastIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes toastOut {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(16px); }
        }
        .toast {
            position: fixed; bottom: 28px; right: 28px; z-index: 99999;
            background: #1a1a2e; color: #fff;
            padding: 14px 20px; border-radius: 10px;
            font-size: 13px; font-weight: 600;
            display: flex; align-items: center; gap: 10px;
            animation: toastIn 0.35s ease forwards;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
        .toast.hide { animation: toastOut 0.35s ease forwards; }
        .toast-icon { width: 20px; height: 20px; background: #22c55e; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    </style>
</head>

<body class="antialiased bg-white text-gray-900 overflow-x-hidden">

    {{-- ═══════════════════════ NAVBAR ═══════════════════════ --}}
    <nav class="flex items-center justify-between px-10 py-5 bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm">
        <div class="flex items-center">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-10">
        </div>
        <div class="hidden md:flex items-center gap-1">
            @foreach([['Home','#'],['Athletes','#'],['Achievement','#']] as [$label,$href])
            <a href="{{ $href }}"
               class="relative px-4 py-2 text-sm font-semibold text-gray-700 rounded-md
                      hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                      after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                      after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                      after:transition-transform after:duration-300 hover:after:scale-x-100">
                {{ $label }}
            </a>
            @endforeach

            <div class="relative group">
                <button class="relative flex items-center gap-1 px-4 py-2 text-sm font-semibold text-gray-700 rounded-md
                               hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                               after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                               after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                               after:transition-transform after:duration-300 hover:after:scale-x-100">
                    More
                    <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="absolute top-full left-0 mt-2 w-44 bg-white border border-gray-100 rounded-xl shadow-lg
                            py-1.5 px-1.5 z-50 opacity-0 pointer-events-none -translate-y-1
                            group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0
                            transition-all duration-200">
                    @foreach(['Gallery','Schedule','Contact Us','About'] as $item)
                    <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg
                                      hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-150">
                        {{ $item }}
                    </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('login') }}"
               class="ml-2 px-6 py-2.5 bg-[#2b459a] text-white text-sm font-semibold
                      hover:bg-[#1e3278] transition-colors duration-200 tracking-wide">
                Login as Admin
            </a>
        </div>
    </nav>

    <main>

        {{-- ═══════════════════════ HERO ═══════════════════════ --}}
        <section class="px-6 md:px-20 py-10">
            <div class="relative w-full max-w-7xl mx-auto h-[600px] overflow-hidden flex items-center justify-center text-center text-white">
                <img src="{{ asset('assets/hero-image.jpeg') }}" alt="Archery Field"
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-[8000ms] ease-out hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-b from-black/15 via-black/50 to-black/75"></div>
                <div class="relative z-10 px-6">
                    <p class="fade-up delay-1 text-[10px] font-bold uppercase tracking-[5px] text-white/55 mb-5">
                        Groovy Archery — Jakarta Utara
                    </p>
                    <h1 class="fade-up delay-2 text-5xl md:text-7xl font-extrabold mb-6 leading-[1.1] tracking-tight">
                        Selamat datang,<br>Archers.
                    </h1>
                    <p class="fade-up delay-3 text-base md:text-lg font-light mb-10 max-w-2xl mx-auto leading-relaxed text-white/80">
                        Klub Panahan menyatukan para atlet yang berdedikasi dan berkomitmen untuk mencapai yang terbaik. Kami berlatih dengan tekad yang kuat, bertanding dengan ketepatan, dan membangun komunitas yang diikat oleh rasa hormat.
                    </p>
                    <a href="#" class="fade-up delay-4 inline-flex items-center gap-3 bg-white text-black px-10 py-3.5 font-bold text-sm uppercase tracking-widest hover:bg-gray-100 transition">
                        Daftar Sebagai Member
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1.5">
                    <span class="text-[9px] uppercase tracking-[4px] text-white/40 mb-1">Scroll</span>
                    <div class="scroll-dot w-1 h-1 rounded-full bg-white"></div>
                    <div class="scroll-dot w-1 h-1 rounded-full bg-white"></div>
                    <div class="scroll-dot w-1 h-1 rounded-full bg-white"></div>
                </div>
            </div>
        </section>

        {{-- ═══════════════════════ MARQUEE ═══════════════════════ --}}
        <div class="overflow-hidden border-y border-gray-100 bg-gray-50 py-3.5">
            <div class="marquee-track">
                @php $words = ['Ketepatan','Disiplin','Keunggulan','Sunnah','Prestasi','Komunitas','Fokus','Dedikasi']; @endphp
                @foreach(array_merge($words,$words) as $word)
                <span class="flex items-center gap-5 mr-10 text-[10px] font-bold uppercase tracking-[4px] text-gray-400">
                    {{ $word }}<span class="w-1 h-1 rounded-full bg-[#2b459a] opacity-40 inline-block shrink-0"></span>
                </span>
                @endforeach
            </div>
        </div>

        {{-- ═══════════════════════ ABOUT ═══════════════════════ --}}
        <section class="max-w-5xl mx-auto px-6 py-24 text-center">
            <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Tentang Kami</p>
            <h2 class="text-4xl md:text-5xl font-bold mb-12 text-gray-900 leading-tight">Groovy Archery</h2>
            <div class="grid md:grid-cols-3 gap-6 text-left">
                @foreach([
                    ['M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z','Lokasi Strategis','Berlokasi di Tanjung Priok, Jakarta Utara — mudah dijangkau dari berbagai penjuru kota.'],
                    ['M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z','Ramah Anak','Dirancang untuk semua usia dengan fokus pada pembentukan karakter, disiplin, dan lingkungan yang positif.'],
                    ['M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z','Identitas Kuat','Visual ungu yang modern menciptakan suasana unik, berkarakter, dan mudah dikenali.'],
                ] as [$path,$title,$desc])
                <div class="p-6 border border-gray-100 rounded-sm group hover:border-[#2b459a]/20 hover:shadow-lg transition-all duration-300">
                    <div class="w-9 h-9 border border-[#2b459a]/15 bg-[#2b459a]/5 rounded-sm flex items-center justify-center mb-5 group-hover:bg-[#2b459a]/10 transition-colors">
                        <svg class="w-4 h-4 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $path }}"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-sm mb-2 text-gray-900">{{ $title }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </section>

        {{-- ═══════════════════════ VISI MISI HEADER ═══════════════════════ --}}
        <section class="text-center pb-10 px-6">
            <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Visi dan Misi</p>
            <h2 class="text-4xl md:text-5xl font-bold mb-3 text-gray-900">Mengapa Kami Ada?</h2>
            <p class="text-gray-400 text-sm">Kami hadir dengan tujuan.</p>
        </section>

        {{-- ═══════════════════════ VISI MISI CARDS ═══════════════════════ --}}
        <section class="max-w-7xl mx-auto px-6 pb-28 grid md:grid-cols-2 gap-6">
            <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg">
                <img src="{{ asset('assets/image 1.jpeg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 via-[#1e2a78]/30 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-12 text-white">
                    <p class="text-[10px] mb-3 opacity-50 uppercase tracking-[5px]">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-5">Visi</h3>
                    <p class="text-base font-light leading-relaxed text-white/80 max-w-sm">
                        Melalui olahraga panahan menciptakan atlet-atlet panahan yang berprestasi dan berakhlakul karimah.
                    </p>
                    <div class="vismis-underline mt-6"></div>
                </div>
            </div>
            <div class="vismis-card relative rounded-sm h-[550px] overflow-hidden shadow-lg">
                <img src="{{ asset('assets/champion.jpeg') }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-[#1e2a78]/95 via-[#1e2a78]/30 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-12 text-white">
                    <p class="text-[10px] mb-3 opacity-50 uppercase tracking-[5px]">Groovy Archery</p>
                    <h3 class="text-5xl font-bold mb-5">Misi</h3>
                    <ul class="space-y-2.5 text-sm font-light text-white/80">
                        @foreach(['Memasalkan olahraga panahan di Sekolah-Sekolah dan lingkungan sekitar','Menjadikan olahraga panahan wadah untuk pengembangan karakter','Membantu atlet mengembangkan bakat dan kemampuan memanah hingga mencapai jalur prestasi','Mencetak pemanah berprestasi yang mampu mengharumkan nama bangsa di kancah Nasional dan Internasional'] as $i => $misi)
                        <li class="flex gap-3 leading-relaxed">
                            <span class="opacity-40 font-bold shrink-0">0{{ $i+1 }}</span>{{ $misi }}
                        </li>
                        @endforeach
                    </ul>
                    <div class="vismis-underline mt-6"></div>
                </div>
            </div>
        </section>

        {{-- ═══════════════════════ VALUES ═══════════════════════ --}}
        <section class="mx-auto px-6 py-20">
            <div class="text-center mb-14">
                <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Values</p>
                <h2 class="text-3xl md:text-4xl font-bold mb-3 text-gray-900">Apa yang kami perjuangkan</h2>
                <p class="text-gray-400 text-sm">Setiap tembakan itu penting. Setiap momen itu berarti.</p>
            </div>
            <div class="flex flex-col md:flex-row gap-5 w-full md:h-[520px] items-stretch justify-center">
                @foreach([
                    ['Ketepatan','Ketepatan dalam gerakan','Panah menemukan sasaran melalui tangan yang stabil dan fokus yang tak goyah. Kami menuntut tidak kurang dari kesempurnaan.','assets/latihanrutin1.jpeg'],
                    ['Disiplin','Latihan yang terarah','Disiplin membedakan mereka yang serius dari yang sekadar iseng. Para atlet kami berlatih tanpa henti, menyempurnakan teknik mereka.','assets/latihanrutin1.jpeg'],
                    ['Keunggulan','Keunggulan atlet','Keunggulan bukanlah tujuan akhir, melainkan upaya yang terus-menerus. Kami berkompetisi di level tertinggi.','assets/latihanrutin1.jpeg'],
                ] as [$tag,$title,$desc,$img])
                <div class="value-card group relative flex-1 md:flex-none md:w-[28%] hover:md:w-[44%] flex flex-col bg-[#4c4494] text-white overflow-hidden rounded-sm shadow-xl cursor-pointer">
                    <div class="h-48 md:h-52 w-full overflow-hidden shrink-0">
                        <img src="{{ asset($img) }}" alt="{{ $tag }}"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="p-7 flex flex-col justify-between flex-grow">
                        <div>
                            <p class="text-[9px] uppercase tracking-[4px] text-blue-200/60 mb-2">{{ $tag }}</p>
                            <h4 class="text-lg font-bold mb-3 leading-snug">{{ $title }}</h4>
                            <div class="value-desc">
                                <p class="text-sm leading-relaxed text-blue-100/75">{{ $desc }}</p>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center gap-2 text-[10px] font-bold tracking-[3px] uppercase mt-5 opacity-50 group-hover:opacity-100 transition-opacity duration-300">
                            Jelajah
                            <svg class="w-3 h-3 transition-transform group-hover:translate-x-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        {{-- ═══════════════════════ SUNNAH ═══════════════════════ --}}
        <section class="max-w-7xl mx-auto px-6 py-24">
            <div class="flex justify-center mb-16">
                <div class="relative inline-block">
                    <div class="absolute -inset-3 border-2 border-[#85488F]/25 rounded-sm"></div>
                    <div class="absolute -inset-1.5 border border-[#254292]/15 rounded-sm"></div>
                    <img src="{{ asset('assets/sunnaharchery.jpeg') }}" alt="United Through Archery"
                         class="relative block w-full max-w-[860px] h-auto object-cover rounded-sm shadow-2xl">
                </div>
            </div>
            <div class="text-center max-w-3xl mx-auto px-4">
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('assets/Logo.jpeg') }}" alt="Logo" class="w-14 h-14 object-contain">
                </div>
                <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-5">Nilai Kami</p>
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900 leading-tight">
                    Dibangun di atas sunnah dan keahlian
                </h2>
                <p class="text-base md:text-lg leading-relaxed text-gray-500 font-light max-w-2xl mx-auto">
                    Klub Panahan ini berlandaskan pada nilai sunnah dalam olahraga panahan, yang tidak hanya melatih keterampilan, tetapi juga membentuk karakter, fokus, dan kedisiplinan. Dengan menggabungkan nilai spiritual dan teknik yang tepat, kami berkomitmen untuk terus berkembang menuju prestasi terbaik.
                </p>
            </div>
        </section>

        {{-- ═══════════════════════ STATS ═══════════════════════ --}}
        <section class="relative py-28 overflow-hidden gradient-animated">
            <div class="absolute top-0 right-0 w-96 h-96 rounded-full pointer-events-none"
                 style="background: radial-gradient(circle, rgba(255,255,255,0.07), transparent); transform: translate(25%,-25%);"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full pointer-events-none"
                 style="background: radial-gradient(circle, rgba(255,255,255,0.06), transparent); transform: translate(-25%,25%);"></div>
            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-20">
                    <div class="max-w-xl">
                        <p class="text-[10px] font-bold uppercase tracking-[5px] text-white/40 mb-4">Angka & Fakta</p>
                        <h2 class="text-3xl md:text-4xl font-bold text-white leading-tight">
                            Angka-angka yang mencerminkan komitmen kami
                        </h2>
                    </div>
                    <p class="text-white/65 text-base max-w-sm leading-relaxed">
                        Para atlet kami telah meraih pengakuan di berbagai kompetisi tingkat regional dan nasional. Prestasi ini merupakan buah dari dedikasi bertahun-tahun.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    @foreach([['100','+','Member aktif'],['45','+','Perlombaan'],['9','','Tahun berdiri']] as [$n,$s,$l])
                    <div class="stat-card p-10 rounded-sm text-center cursor-default"
                         style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.18);">
                        <div class="text-6xl md:text-7xl font-extrabold text-white mb-3 tracking-tight">
                            <span class="counter" data-target="{{ $n }}">0</span>{{ $s }}
                        </div>
                        <div class="w-8 h-px bg-white/30 mx-auto mb-3"></div>
                        <p class="text-white/60 uppercase text-[10px] font-bold tracking-[4px]">{{ $l }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    {{-- ═══════════════════════ TRAINING & COACHING ═══════════════════════ --}}
    <section class="max-w-7xl mx-auto px-6 py-28 space-y-28">
        @foreach([
            ['02','Training','Program','Pelatihan Bertahap','Program pelatihan kami dirancang untuk semua tingkatan, mulai dari pemula yang mempelajari dasar-dasar hingga atlet tingkat lanjut yang mengasah teknik bertanding. Setiap sesi dirancang untuk menghasilkan peningkatan yang terukur.','assets/champion.jpeg',false],
            ['03','Coaching','Pelatihan','Pelatihan Expert','Para pelatih kami memiliki pengalaman bertahun-tahun di bidang kompetisi serta pengetahuan teknis yang mendalam. Mereka akan mendampingi Anda secara pribadi untuk mengidentifikasi kelemahan, menyempurnakan teknik, dan mempersiapkan diri untuk kompetisi.','assets/champion.jpeg',true],
        ] as [$num,$type,$tag,$title,$desc,$img,$reverse])
        <div class="grid md:grid-cols-2 gap-16 items-center {{ $reverse ? 'md:[direction:rtl]' : '' }}">
            <div class="flex flex-col justify-center {{ $reverse ? '[direction:ltr]' : '' }}">
                <div class="flex items-center gap-3 mb-8">
                    <span class="text-xs font-bold text-gray-300">{{ $num }}</span>
                    <div class="w-5 h-px bg-gray-200"></div>
                    <span class="text-[10px] font-bold uppercase tracking-[3px] text-gray-400">{{ $type }}</span>
                </div>
                <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[4px] mb-3">{{ $tag }}</p>
                <h2 class="text-4xl md:text-5xl font-bold mb-5 text-black leading-tight">{{ $title }}</h2>
                <div class="w-10 h-0.5 bg-[#2b459a] mb-6 rounded-full"></div>
                <p class="text-gray-500 text-base leading-relaxed mb-10 max-w-md">{{ $desc }}</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="inline-flex items-center gap-2 bg-[#e24a43] text-white px-8 py-3 font-bold text-sm uppercase tracking-wide hover:bg-red-700 transition-colors duration-200 shadow-sm">
                        Daftar
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="#" class="flex items-center gap-2 font-bold text-sm text-black hover:text-[#2b459a] transition-colors group">
                        Details
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="img-frame {{ $reverse ? '[direction:ltr]' : '' }} group overflow-hidden">
                <img src="{{ asset($img) }}" alt="{{ $title }}"
                     class="w-full h-[420px] object-cover shadow-xl transition-transform duration-700 group-hover:scale-[1.03]">
            </div>
        </div>
        @if(!$reverse)<div class="border-t border-gray-100"></div>@endif
        @endforeach
    </section>

    {{-- ═══════════════════════ TESTIMONI ═══════════════════════ --}}
    <section class="py-24 px-6 bg-white" id="testimoni">
        <div class="text-center mb-14">
            <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Testimoni</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Testimoni Member</h2>
            <p class="text-gray-400 text-sm">Dari harapan menjadi kenyataan</p>
        </div>

        {{-- Slider wrapper --}}
        <div class="relative max-w-5xl mx-auto">
            <div class="overflow-hidden">
                <div class="testi-slider" id="testiSlider">

                    @php
                    $testimonis = [
                        ['Budi Arya', 'Club Member', 5, '"Coach kami memberikan perhatian dan input yang membangun pengalaman latihan yang baik namun tegas. Latihan yang disiplin, dan sesi latihan terbaik."'],
                        ['Naadia', 'Club Member', 5, '"Sekalinya aku ikut pertolongan, tapi akhirnya aku jadi lebih baik dan lebih merasa nyaman. Top iklim coaching kami memulai, dan latihan ini membantu, dan saat ini."'],
                        ['Naftaya', 'Club Member', 5, '"Setiap sesi coaching selalu ada ilmu baru yang bermanfaat bagi perkembangan saya sebagai atlet panahan. Sangat antusias untuk latihan hari ini."'],
                        ['Rizky Pratama', 'Club Member', 5, '"Program latihan di sini sangat terstruktur dan para pelatih sangat berpengalaman. Saya merasakan perkembangan yang signifikan sejak bergabung."'],
                        ['Siti Rahma', 'Club Member', 4, '"Lingkungan yang suportif dan komunitas yang hangat membuat saya semakin semangat berlatih. Sangat merekomendasikan Groovy Archery!"'],
                    ];
                    @endphp

                    @foreach($testimonis as $testi)
                    <div class="testi-card w-full md:w-1/3 px-3 flex-shrink-0">
                        <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300 h-full flex flex-col">
                            {{-- Bintang --}}
                            <div class="flex gap-1 mb-4">
                                @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testi[2] ? 'text-amber-400' : 'text-gray-200' }}"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                @endfor
                            </div>
                            {{-- Teks --}}
                            <p class="text-gray-600 text-sm leading-relaxed italic flex-grow mb-5">{{ $testi[3] }}</p>
                            {{-- Avatar + nama --}}
                            <div class="flex items-center gap-3 mt-auto pt-4 border-t border-gray-50">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0"
                                     style="background: linear-gradient(135deg, #85488F, #254292);">
                                    {{ strtoupper(substr($testi[0], 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-800">{{ $testi[0] }}</p>
                                    <p class="text-xs text-gray-400">{{ $testi[1] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            {{-- Prev / Next --}}
            <button id="testiPrev"
                    class="absolute top-1/2 -translate-y-1/2 -left-5 w-9 h-9 rounded-full bg-white border border-gray-200 shadow flex items-center justify-center hover:border-[#2b459a] hover:text-[#2b459a] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button id="testiNext"
                    class="absolute top-1/2 -translate-y-1/2 -right-5 w-9 h-9 rounded-full bg-white border border-gray-200 shadow flex items-center justify-center hover:border-[#2b459a] hover:text-[#2b459a] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        {{-- Dots --}}
        <div class="flex justify-center gap-2 mt-8" id="testiDots"></div>

        {{-- Tombol Beri Testimoni --}}
        <div class="text-center mt-10">
            <button id="openTestiModal"
                    class="inline-flex items-center gap-2 px-7 py-3 bg-[#2b459a] text-white text-sm font-bold uppercase tracking-wide hover:bg-[#1e3278] transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Beri Testimoni
            </button>
        </div>
    </section>

    {{-- ═══════════════════════ CTA CHAMPIONS ═══════════════════════ --}}
    <section class="py-24 px-6 text-center bg-gray-50 border-t border-gray-100">
        <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-4">Connect</p>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Siap untuk menjadi champions?</h2>
        <p class="text-gray-500 text-sm max-w-md mx-auto mb-10">
            Bergabunglah dengan komunitas yang terus berkembang. Kami berlatih dengan tekad dan dan bertanding dengan presisi.
        </p>
        <div class="flex items-center justify-center gap-4">
            <a href="#" class="inline-flex items-center gap-2 px-8 py-3 bg-[#2b459a] text-white font-bold text-sm hover:bg-[#1e3278] transition-colors duration-200">
                Daftar
            </a>
            <a href="#contact" class="inline-flex items-center gap-2 px-8 py-3 border border-gray-300 text-gray-700 font-bold text-sm hover:border-[#2b459a] hover:text-[#2b459a] transition-colors duration-200">
                Hubungi Kami
            </a>
        </div>
    </section>

    {{-- ═══════════════════════ CONTACT + MAP ═══════════════════════ --}}
    <section class="max-w-7xl mx-auto px-6 py-24" id="contact">
        <div class="mb-10">
            <p class="text-[10px] font-bold text-[#2b459a] uppercase tracking-[5px] mb-3">Connect</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Kenali kami lebih jauh</h2>
            <p class="text-gray-400 text-sm max-w-md">Ada pertanyaan tentang bergabung atau jenis pelatihan? Kami siap membantu.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-start">

            {{-- Kontak Info --}}
            <div class="space-y-8">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-sm bg-[#2b459a]/8 border border-[#2b459a]/12 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-900 mb-1">Email</p>
                        <p class="text-xs text-gray-400 mb-1">Informasi Email</p>
                        <a href="mailto:groovyarchery@gmail.com" class="text-sm text-[#2b459a] hover:underline font-medium">
                            groovyarchery@gmail.com
                        </a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-sm bg-[#2b459a]/8 border border-[#2b459a]/12 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-900 mb-1">Phone</p>
                        <p class="text-xs text-gray-400 mb-1">Hubungi kami pada jam kerja</p>
                        <a href="https://wa.me/6281298005503" class="text-sm text-gray-700 font-medium hover:text-[#2b459a] transition-colors">
                            +62 812 9800 5503
                        </a>
                        <span class="ml-2 text-xs text-gray-400">(Contact Kami)</span>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-sm bg-[#2b459a]/8 border border-[#2b459a]/12 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-4 h-4 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-900 mb-1">Office</p>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Jalan Kebon Bawang XI No. 63, <br>
                             Kecamatan Tj.Priok, Jakarta Utara 14320
                        </p>
                        <a href="https://www.google.com/maps/place/Jl.+Kebon+Bawang+XI,+Kb.+Bawang,+Kec.+Tj.+Priok,+Jkt+Utara,+Daerah+Khusus+Ibukota+Jakarta+14320/@-6.1151882,106.8860849,17z/data=!3m1!4b1!4m6!3m5!1s0x2e6a1fc02f3cb7c3:0xc20cce580c03dd20!8m2!3d-6.1151882!4d106.8886598!16s%2Fg%2F1hm2_jyyc?entry=ttu&g_ep=EgoyMDI2MDQxNC4wIKXMDSoASAFQAw%3D%3D"
                           target="_blank"
                           class="inline-flex items-center gap-1 mt-2 text-xs text-[#2b459a] font-semibold hover:underline">
                            Tampilkan di peta
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Google Maps Embed — Kalibaru, Cilincing, Jakarta Utara --}}
            <div class="rounded-sm overflow-hidden shadow-lg border border-gray-100 h-72 md:h-80">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1234567890123!2d106.93!3d-6.09!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f9e1a1b1c1d%3A0x1234567890abcdef!2sKalibaru%2C%20Cilincing%2C%20Jakarta%20Utara%2C%20Kota%20Jakarta%20Utara%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid"
                    width="100%" height="100%"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════ FOOTER ═══════════════════════ --}}
    <footer class="gradient-animated text-white pt-16 pb-8 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 mb-14">

                {{-- Brand --}}
                <div class="col-span-2 md:col-span-1">
                    <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-12 mb-4 brightness-0 invert">
                    <p class="text-white/60 text-sm leading-relaxed mb-6 max-w-xs">
                        Get updates on competitions, training tips, and club news.
                    </p>
                    <div class="flex gap-0">
                        <input type="email" placeholder="Your email"
                               class="flex-1 px-4 py-2.5 text-sm bg-white/10 border border-white/20 text-white placeholder-white/40 focus:outline-none focus:border-white/50 transition-colors">
                        <button class="px-4 py-2.5 bg-white text-[#2b459a] text-xs font-bold uppercase tracking-wide hover:bg-gray-100 transition-colors whitespace-nowrap">
                            Subscribe
                        </button>
                    </div>
                    <p class="text-white/30 text-[10px] mt-2 leading-relaxed">
                        By subscribing, you agree to our Privacy Policy and consent to receive updates from Groovy Archery.
                    </p>
                </div>

                {{-- About us --}}
                <div>
                    <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">About us</p>
                    <ul class="space-y-3">
                        @foreach(['Our story','Athletes','Training','Coaches','Contact'] as $item)
                        <li><a href="#" class="text-white/70 text-sm hover:text-white transition-colors">{{ $item }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Resources --}}
                <div>
                    <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">Resources</p>
                    <ul class="space-y-3">
                        @foreach(['Membership','Partners','Coaching','Schedule','FAQ'] as $item)
                        <li><a href="#" class="text-white/70 text-sm hover:text-white transition-colors">{{ $item }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Follow us --}}
                <div>
                    <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">Follow us</p>
                    <ul class="space-y-3">
                        @foreach([
                            ['Facebook', 'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z'],
                            ['Instagram', 'M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01'],
                            ['X / Twitter', 'M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z'],
                            ['LinkedIn', 'M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z M4 6a2 2 0 100-4 2 2 0 000 4z'],
                            ['YouTube', 'M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z'],
                        ] as [$name, $iconPath])
                        <li>
                            <a href="#" class="flex items-center gap-2.5 text-white/70 text-sm hover:text-white transition-colors group">
                                <svg class="w-4 h-4 opacity-60 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                                </svg>
                                {{ $name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="border-t border-white/15 pt-7 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-white/40 text-xs">© 2024 Groovy Club Organization. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    @foreach(['Privacy Policy','Terms of Service','Cookie Settings'] as $link)
                    <a href="#" class="text-white/40 text-xs hover:text-white/70 transition-colors">{{ $link }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>

    {{-- ═══════════════════════ MODAL TESTIMONI ═══════════════════════ --}}
    <div class="modal-backdrop" id="testiModal">
        <div class="modal-box">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Beri Testimoni</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Bagikan pengalaman kamu bersama Groovy Archery</p>
                </div>
                <button id="closeTestiModal"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="space-y-5">
                {{-- Nama --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">Nama</label>
                    <input type="text" id="testiNama" placeholder="Masukkan nama kamu"
                           class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition">
                    <p class="text-red-500 text-xs mt-1 hidden" id="errNama">Nama wajib diisi</p>
                </div>

                {{-- Bintang --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Rating</label>
                    <div class="star-input" id="starInput">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}">
                        <label for="star{{ $i }}">★</label>
                        @endfor
                    </div>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errRating">Pilih rating terlebih dahulu</p>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">Deskripsi</label>
                    <textarea id="testiDeskripsi" rows="4" placeholder="Ceritakan pengalaman kamu..."
                              class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25 focus:border-[#2b459a] transition resize-none"></textarea>
                    <p class="text-red-500 text-xs mt-1 hidden" id="errDeskripsi">Deskripsi wajib diisi</p>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button id="submitTesti"
                        class="flex-1 py-3 bg-[#2b459a] text-white font-bold text-sm uppercase tracking-wide hover:bg-[#1e3278] transition-colors rounded-lg">
                    Kirim Testimoni
                </button>
                <button id="cancelTesti"
                        class="px-5 py-3 border border-gray-200 text-gray-600 font-semibold text-sm rounded-lg hover:bg-gray-50 transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════ SCRIPTS ═══════════════════════ --}}
    <script>
        // ── Counter ──
        const counterObs = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const target = +el.dataset.target;
                const inc = target / 60;
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

        // ── Fade up ──
        const fadeObs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('visible'); fadeObs.unobserve(e.target); }
            });
        }, { threshold: 0.12 });
        document.querySelectorAll('.fade-up').forEach(el => fadeObs.observe(el));

        // ── Testimoni Slider ──
        const slider     = document.getElementById('testiSlider');
        const cards      = slider.querySelectorAll('.testi-card');
        const dotsWrap   = document.getElementById('testiDots');
        const perView    = window.innerWidth >= 768 ? 3 : 1;
        const totalSlides = Math.ceil(cards.length / perView);
        let current = 0;

        // Build dots
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 ' + (i === 0 ? 'bg-[#2b459a] w-5' : 'bg-gray-300');
            dot.addEventListener('click', () => goTo(i));
            dotsWrap.appendChild(dot);
        }

        function goTo(idx) {
            current = Math.max(0, Math.min(idx, totalSlides - 1));
            const pct = (100 / perView) * current * perView;
            slider.style.transform = `translateX(-${pct / cards.length * 100}%)`;
            dotsWrap.querySelectorAll('button').forEach((d, i) => {
                d.className = 'rounded-full transition-all duration-300 ' + (i === current ? 'bg-[#2b459a] w-5 h-2' : 'bg-gray-300 w-2 h-2');
            });
        }

        // Set card widths
        cards.forEach(c => c.style.width = `${100 / perView}%`);

        document.getElementById('testiPrev').addEventListener('click', () => goTo(current - 1));
        document.getElementById('testiNext').addEventListener('click', () => goTo(current + 1));

        // ── Modal ──
        const modal      = document.getElementById('testiModal');
        const openBtn    = document.getElementById('openTestiModal');
        const closeBtn   = document.getElementById('closeTestiModal');
        const cancelBtn  = document.getElementById('cancelTesti');
        const submitBtn  = document.getElementById('submitTesti');

        function openModal()  { modal.classList.add('open'); document.body.style.overflow = 'hidden'; }
        function closeModal() { modal.classList.remove('open'); document.body.style.overflow = ''; }

        openBtn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });

        // ── Validasi + Submit ──
        submitBtn.addEventListener('click', () => {
            const nama      = document.getElementById('testiNama').value.trim();
            const rating    = document.querySelector('input[name="rating"]:checked');
            const deskripsi = document.getElementById('testiDeskripsi').value.trim();
            let valid = true;

            const errNama     = document.getElementById('errNama');
            const errRating   = document.getElementById('errRating');
            const errDeskripsi = document.getElementById('errDeskripsi');

            errNama.classList.toggle('hidden', !!nama);
            errRating.classList.toggle('hidden', !!rating);
            errDeskripsi.classList.toggle('hidden', !!deskripsi);

            if (!nama || !rating || !deskripsi) return;

            closeModal();
            // Reset form
            document.getElementById('testiNama').value = '';
            document.getElementById('testiDeskripsi').value = '';
            document.querySelectorAll('input[name="rating"]').forEach(r => r.checked = false);

            showToast('Testimoni berhasil dikirim! Terima kasih 🎯');
        });

        // ── Toast ──
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
    </script>

</body>
</html>