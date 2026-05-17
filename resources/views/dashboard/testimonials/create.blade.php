<x-layouts.admin-layout title="{{ __('dashboard.testimoni_add_title') }}">
    <div class="p-6 max-w-5xl mx-auto">

        <div class="mb-6">
            <a href="{{ route('testi.index') }}"
               class="flex items-center gap-2 font-medium"
               style="color: #85488F;">
                {{ __('dashboard.testimoni_back_list') }}
            </a>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-8">
            {{ __('dashboard.testimoni_add_title') }}
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

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.testimoni_form_name') }}
                        </label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                               placeholder="{{ __('dashboard.testimoni_name_ph') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                               onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                               required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.testimoni_form_role') }}
                        </label>
                        <input type="text" name="peran" value="{{ old('peran') }}"
                               placeholder="{{ __('dashboard.testimoni_role_ph') }}"
                               class="w-full px-5 py-4 border border-gray-200 focus:ring-2"
                               style="outline: none;"
                               onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                               onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                               required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            {{ __('dashboard.testimoni_rating_label') }}
                        </label>

                        <input type="hidden" name="rating" id="rating-value" value="{{ old('rating', '') }}" required>

                        <div class="flex items-center gap-1.5" id="star-rating-container">
                            @for ($i = 1; $i <= 5; $i++)
                                <button type="button" data-value="{{ $i }}" class="star-btn text-gray-300 hover:scale-110 transition-transform focus:outline-none">

                                    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                                        <path d="M12 1.7l3.09 6.26L22 8.93l-5 4.87 1.18 6.88L12 17.43l-6.18 3.25L7 13.8 2 8.93l6.91-.97L12 1.7z"/>
                                    </svg>
                                </button>
                            @endfor
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('dashboard.testimoni_message_label') }}
                        </label>
                        <textarea name="deskripsi" rows="6"
                                  placeholder="{{ __('dashboard.testimoni_message_ph') }}"
                                  class="w-full px-5 py-4 border border-gray-200 resize-y"
                                  style="outline: none;"
                                  onfocus="this.style.borderColor='#85488F'; this.style.boxShadow='0 0 0 4px rgba(133, 72, 143, 0.1)'"
                                  onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'"
                                  required>{{ old('deskripsi') }}</textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-4 mt-12 pt-8 border-t border-gray-50">
                    <a href="{{ route('testi.index') }}"
                       class="px-10 py-4 bg-red-500 hover:bg-red-600 text-white font-medium transition">
                        {{ __('dashboard.btn_batal') }}
                    </a>
                    <button type="submit"
                            class="px-10 py-4 text-white font-medium transition hover:opacity-90 bg-blue-900 hover:bg-blue-950">
                        {{ __('dashboard.testimoni_btn_save') }}
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const stars = document.querySelectorAll('.star-btn');
            const ratingInput = document.getElementById('rating-value');

            const activeColor = 'text-amber-400';
            const inactiveColor = 'text-gray-300';

            function updateStars(rating) {
                stars.forEach(star => {
                    const value = parseInt(star.getAttribute('data-value'));
                    if (value <= rating) {
                        star.classList.remove(inactiveColor);
                        star.classList.add(activeColor);
                    } else {
                        star.classList.remove(activeColor);
                        star.classList.add(inactiveColor);
                    }
                });
            }

            // Inisialisasi awal jika ada nilai old() dari validator laravel
            if (ratingInput.value) {
                updateStars(parseInt(ratingInput.value));
            }

            stars.forEach(star => {
                star.addEventListener('mouseover', function() {
                    const currentHoverValue = parseInt(this.getAttribute('data-value'));
                    updateStars(currentHoverValue);
                });

                star.addEventListener('mouseout', function() {
                    const currentSavedValue = parseInt(ratingInput.value) || 0;
                    updateStars(currentSavedValue);
                });

                star.addEventListener('click', function() {
                    const clickValue = this.getAttribute('data-value');
                    ratingInput.value = clickValue;
                    updateStars(parseInt(clickValue));
                });
            });
        });
    </script>

</x-layouts.admin-layout>