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
