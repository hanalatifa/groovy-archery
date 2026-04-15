<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groovy Archery - Achievement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 antialiased text-gray-900">

    {{-- Navbar Section --}}
    <nav class="flex items-center justify-between px-10 py-6 bg-white sticky top-0 z-50 shadow-sm">
        <div class="flex items-center">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-10">
        </div>

        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('dashboard') }}" class="text-gray-700 font-medium hover:text-blue-600 transition">Home</a>
            <a href="{{ route('athletes') }}"
                class="text-gray-700 font-medium hover:text-blue-600 transition">Athletes</a>
            <a href="{{ route('achievements') }}" class="text-blue-600 font-bold transition">Achievement</a>

            <button class="flex items-center text-gray-700 font-medium hover:text-blue-600 transition">
                More
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <a href="{{ route('login') }}"
                class="bg-[#2b459a] text-white px-6 py-2 rounded-md font-medium hover:bg-blue-800 transition">
                Login as Admin
            </a>
        </div>
    </nav>

    {{-- Header Section --}}
    <section class="py-16 text-center">
        <p class="text-blue-600 font-semibold uppercase tracking-widest text-sm">Victories</p>
        <h1 class="text-4xl font-bold mt-2">See our Achievement</h1>
        <p class="text-gray-600 mt-4">Our athletes continue to earn recognition at every level</p>
    </section>

    {{-- Achievement Grid --}}
    <section class="max-w-6xl mx-auto px-6 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Sekarang loop sampai 9 agar muncul 9 kartu --}}
            @for ($i = 0; $i < 9; $i++)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition">
                    <img src="{{ asset('assets/pialapanglima.png') }}" alt="Event"
                        class="w-full h-56 object-cover">
                    <div class="p-6">
                        <p class="text-gray-500 text-xs font-semibold uppercase">National</p>
                        <h3 class="text-xl font-bold mt-1 mb-2">Piala Kapolda Jawa Barat 2019</h3>
                        <p class="text-gray-600 text-sm mb-4">Marcus Chen claimed first place in a competitive field</p>
                        <a href="#" class="text-blue-600 font-semibold text-sm hover:underline">Lihat →</a>
                    </div>
                </div>
            @endfor

        </div>

        {{-- Tombol See All --}}
        <div class="text-center mt-12">
            <button class="border border-gray-300 px-8 py-3 rounded-md font-medium hover:bg-gray-100 transition">
                See All
            </button>
        </div>
    </section>

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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-black mb-2">Office</h3>
                        <p class="text-gray-600 leading-relaxed text-sm max-w-xs">
                            Jalan Kebon Bawang No. 63, Kebon Bawang, Jakarta, Daerah Khusus Ibukota Jakarta 14320
                        </p>
                        <a href="#"
                            class="inline-flex items-center gap-2 mt-6 font-medium text-black hover:underline group text-sm">
                            Tampilkan di peta
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div
                class="w-full h-[500px] bg-gray-200 rounded-sm relative overflow-hidden flex items-center justify-center">
                <div class="flex flex-col items-center opacity-30">
                    <svg class="w-24 h-24 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
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
                        By subscribing you agree to our Privacy Policy and consent to receive updates from the Archery
                        Club Organization.
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
                            <i class="fab fa-facebook text-lg"></i> <a href="#"
                                class="hover:underline">Facebook</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-instagram text-lg"></i> <a href="#"
                                class="hover:underline">Instagram</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-x-twitter text-lg"></i> <a href="#" class="hover:underline">X</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-linkedin text-lg"></i> <a href="#"
                                class="hover:underline">LinkedIn</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-youtube text-lg"></i> <a href="#"
                                class="hover:underline">YouTube</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs opacity-80">
                <p>© 2025 Archery Club Organization. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <a href="#" class="hover:underline">Terms of Service</a>
                    <a href="#" class="hover:underline">Cookies Settings</a>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>
