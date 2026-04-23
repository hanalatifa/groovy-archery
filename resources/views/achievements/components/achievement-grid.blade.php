    {{-- Achievement Grid --}}
    <section class="max-w-6xl mx-auto px-6 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Kartu Achievement (Ulangi blok ini) --}}
            @for ($i = 0; $i < 6; $i++)
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition">
                <img src="{{ asset('assets/placeholder-event.jpg') }}" alt="Event" class="w-full h-56 object-cover">
                <div class="p-6">
                    <p class="text-gray-500 text-xs font-semibold uppercase">National</p>
                    <h3 class="text-xl font-bold mt-1 mb-2">Piala Kapolda Jawa Barat 2019</h3>
                    <p class="text-gray-600 text-sm mb-4">Marcus Chen claimed first place in a competitive field</p>
                    <a href="#" class="text-blue-600 font-semibold text-sm hover:underline">Lihat →</a>
                </div>
            </div>
            @endfor

        </div>

        <div class="text-center mt-12">
            <button class="border border-gray-300 px-8 py-3 rounded-md font-medium hover:bg-gray-100 transition">
                See All
            </button>
        </div>
    </section>
