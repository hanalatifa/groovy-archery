<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archery Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white antialiased text-gray-900">

    <nav class="flex items-center justify-between px-10 py-6 bg-white sticky top-0 z-50 shadow-sm">
        <div class="flex items-center">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-10">
        </div>
        <div class="hidden md:flex items-center space-x-8">

            <a href="{{ route('welcome') }}" class="text-gray-700 font-medium hover:text-blue-600">Home</a>
            <a href="{{ route('athletes') }}" class="text-gray-700 font-medium hover:text-blue-600">Athletes</a>
            <a href="{{ route('achievements') }}" class="text-gray-700 font-medium hover:text-blue-600">Achievement</a>

            <button class="flex items-center text-gray-700 font-medium hover:text-blue-600">
                More <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <a href="{{ route('login') }}"
                class="bg-[#2b459a] text-white px-6 py-2 rounded-md font-medium hover:bg-blue-800 transition">
                Login as Admin
            </a>

        </div>
    </nav>

    <section class="flex flex-col items-center justify-center py-20 px-6 text-center bg-gray-50">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-6 tracking-tight">
            Ketepatan. Fokus. Keunggulan.
        </h1>

        <p class="text-lg text-gray-600 max-w-2xl mb-10">
            Bergabunglah dengan komunitas pemanah yang berdedikasi...
        </p>

        <div class="flex gap-4">
            <a href="#"
                class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-md font-semibold transition duration-300">
                Daftar
            </a>

            <a href="{{ route('athletes') }}"
                class="border-2 border-gray-300 hover:border-gray-400 text-gray-700 px-8 py-3 rounded-md font-semibold transition duration-300">
                Lihat Atlet
            </a>
        </div>
    </section>

    <section class="w-full">
        <div class="overflow-hidden">
            <img src="{{ asset('assets/athletesimage.png') }}" alt="Komunitas Pemanah"
                class="w-full h-auto object-cover block">
        </div>
    </section>

    <section class="py-20 px-6 bg-white">
        <div class="text-center mb-16">
            <p class="text-blue-600 font-semibold uppercase tracking-widest text-sm">Athlete</p>
            <h2 class="text-4xl font-bold text-gray-900 mt-2">Atlet Kami</h2>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 px-4">

            @for ($i = 0; $i < 4; $i++)
                <div
                    class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition duration-300 flex flex-col">
                    <img src="{{ asset('assets/atlet.jpg') }}" class="w-full h-60 object-cover block">

                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-lg font-bold text-gray-900 mt-2 mb-2">Latihan yang terarah</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                            Discipline separates the serious from the casual...
                        </p>

                        <div class="mt-auto pt-2 border-t border-gray-100">
                            <a href="#" class="text-blue-600 font-semibold text-sm">
                                Jelajah →
                            </a>
                        </div>
                    </div>
                </div>
            @endfor

        </div>

        <div class="text-center mt-12">

            <a href="{{ route('athletes') }}"
                class="bg-[#2b459a] text-white px-8 py-3 rounded-md font-medium hover:bg-blue-800 transition">
                Lihat Semua
            </a>

        </div>
    </section>

    <footer class="bg-[#8b5a8c] text-white py-20">
        <div class="text-center">
            <p>© 2025 Archery Club Organization. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
