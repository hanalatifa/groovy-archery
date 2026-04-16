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
