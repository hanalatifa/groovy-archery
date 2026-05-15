<x-layouts.admin-layout title="Tambah Testimoni">

    <div class="p-6 max-w-5xl mx-auto">

        {{-- Tombol Kembali --}}
        <div class="mb-6">
            <a href="{{ route('testi.index') }}"
                class="flex items-center gap-2 font-medium"
                style="color: #85488F;">
                ← Kembali ke Daftar Testimoni
            </a>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-8">
            Tambah Testimoni Baru
        </h1>

        <div class="bg-white shadow-xl p-10 border border-gray-100">

            @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 mb-6">
                <ul class="list-disc list-inside text-sm font-medium">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('testi.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    {{-- Nama --}}
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            placeholder="Contoh: Budi Santoso"
                            class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm"
                            required>
                    </div>

                    {{-- Peran --}}
                    <div class="col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Peran / Jabatan</label>
                        <input type="text" name="peran" value="{{ old('peran') }}"
                            placeholder="Contoh: Atlet / Coach / Wali Murid"
                            class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm"
                            required>
                    </div>

                    {{-- Rating --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Rating Bintang</label>
                        
                        <input type="hidden" name="rating" id="rating-value" value="{{ old('rating', '') }}" required>
                        
                        <div class="flex items-center gap-2 py-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button" data-value="{{ $i }}" class="star-btn text-4xl text-gray-300 hover:scale-110 transition-transform focus:outline-none">
                                    ★
                                </button>
                            @endfor
                        </div>
                        <p class="text-xs text-gray-400 mt-1 italic">*Klik pada salah satu bintang untuk memberikan penilaian.</p>
                    </div>

                    {{-- Pesan Testimoni --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wider">Pesan Testimoni</label>
                        <textarea name="deskripsi" rows="6"
                            placeholder="Tuliskan pengalaman atau pesan testimoni di sini..."
                            class="w-full px-5 py-4 border border-gray-200 focus:ring-4 focus:ring-purple-100 focus:border-purple-500 outline-none transition shadow-sm resize-none"
                            required>{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end gap-4 mt-12 pt-8 border-t border-gray-50">
                    <a href="{{ route('testi.index') }}"
                        class="px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-bold transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-950 px-12 py-4 text-white font-bold transition shadow-lg active:scale-95">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script Handler Bintang --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star-btn');
            const ratingInput = document.getElementById('rating-value');

            function highlightStars(rating) {
                stars.forEach(star => {
                    const value = parseInt(star.getAttribute('data-value'));
                    if (value <= rating) {
                        star.classList.remove('text-gray-300');
                        star.classList.add('text-yellow-400');
                    } else {
                        star.classList.remove('text-yellow-400');
                        star.classList.add('text-gray-300');
                    }
                });
            }

            if (ratingInput.value) {
                highlightStars(parseInt(ratingInput.value));
            }

            stars.forEach(star => {
                star.addEventListener('mouseover', function () {
                    const hoverValue = parseInt(this.getAttribute('data-value'));
                    highlightStars(hoverValue);
                });

                star.addEventListener('mouseout', function () {
                    const currentRating = parseInt(ratingInput.value) || 0;
                    highlightStars(currentRating);
                });

                star.addEventListener('click', function () {
                    const clickedValue = this.getAttribute('data-value');
                    ratingInput.value = clickedValue;
                    highlightStars(parseInt(clickedValue));
                });
            });
        });
    </script>

</x-layouts.admin-layout>