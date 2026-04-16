<main>

{{-- SECTION SUNNAH --}}
<section class="max-w-7xl mx-auto px-6 py-24 bg-white overflow-hidden relative">

    <div class="relative flex justify-center items-center mb-16 mx-auto" style="max-width: fit-content;">

        {{-- Gradient border --}}
        <div class="absolute inset-[-6px] rounded-lg blur-sm"
             style="background: conic-gradient(from 0deg, #85488F, #254292, #85488F);">
        </div>

        {{-- Canvas --}}
        <div class="absolute inset-[-30px] opacity-80">
            <canvas id="gradient-canvas"></canvas>
        </div>

        {{-- Image --}}
        <div class="relative rounded-sm overflow-hidden shadow-2xl bg-white p-1">
            <img src="{{ asset('assets/sunnaharchery.jpeg') }}"
                 class="max-w-[900px] w-full object-cover">
        </div>
    </div>

    <div class="text-center max-w-3xl mx-auto px-4">

        <div class="flex justify-center mb-8">
            <img src="{{ asset('assets/Logo.jpeg') }}" class="w-14 h-14">
        </div>

        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Dibangun di atas sunnah dan keahlian
        </h2>

        <p class="text-gray-600 leading-relaxed">
            Klub Panahan ini berlandaskan pada nilai sunnah dalam olahraga panahan,
            membentuk karakter, fokus, dan kedisiplinan.
        </p>
    </div>

</section>

{{-- STATS --}}
<section class="py-24 bg-gradient-to-br from-[#85488F] to-[#254292] text-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col md:flex-row justify-between mb-16 gap-10">
            <h2 class="text-3xl md:text-4xl font-bold max-w-xl">
                Angka yang mencerminkan komitmen kami
            </h2>

            <p class="text-white/80 max-w-md">
                Prestasi dari dedikasi dan latihan bertahun-tahun.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 text-center">

            <div class="p-10 border border-white/30 rounded-lg">
                <h3 class="text-5xl font-bold">
                    <span class="counter" data-target="100">0</span>+
                </h3>
                <p class="mt-2 text-sm uppercase">Member aktif</p>
            </div>

            <div class="p-10 border border-white/30 rounded-lg">
                <h3 class="text-5xl font-bold">
                    <span class="counter" data-target="45">0</span>+
                </h3>
                <p class="mt-2 text-sm uppercase">Perlombaan</p>
            </div>

            <div class="p-10 border border-white/30 rounded-lg">
                <h3 class="text-5xl font-bold">
                    <span class="counter" data-target="9">0</span>
                </h3>
                <p class="mt-2 text-sm uppercase">Tahun berdiri</p>
            </div>

        </div>

    </div>

</section>

</main>