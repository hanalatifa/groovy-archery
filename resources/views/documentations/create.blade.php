<x-layouts.admin-layout title="Tambah Dokumentasi">

    <div class="p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Tambah Dokumentasi</h1>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 border border-red-100">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('documentations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul') }}"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition"
                           placeholder="Masukkan judul kegiatan..." required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Masukkan dokumentasi</label>
                        <div id="preview-container" class="relative group">
                            <input type="file" name="foto[]" id="foto" accept="image/*" class="sr-only" required multiple>
                            <label for="foto" class="flex flex-col items-center justify-center w-full h-72 border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 hover:bg-gray-100 hover:border-gray-400 transition overflow-hidden">
                                <div id="preview" class="hidden absolute inset-0 p-3 grid grid-cols-3 gap-2 bg-gray-50 rounded-2xl overflow-y-auto z-10"></div>
                                <div id="placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 z-0">
                                    <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 20 16">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                                    <p class="text-xs text-gray-400">PNG, JPG atau JPEG (Maks. 9 foto)</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi kegiatan</label>
                        <textarea name="deskripsi" class="w-full h-72 px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-purple-200 focus:border-purple-400 transition resize-none"
                                  placeholder="Tuliskan deskripsi kegiatan di sini..." required>{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-10">
                    <a href="{{ url('/documentations') }}"
                       class="px-6 py-2.5 rounded-lg text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-lg text-sm font-semibold text-white bg-purple-700 hover:bg-purple-800 transition shadow-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.admin-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('foto');
        const previewContainer = document.getElementById('preview');
        const placeholder = document.getElementById('placeholder');

        if (!input || !previewContainer || !placeholder) return;

        input.addEventListener('change', function (event) {
            previewContainer.innerHTML = "";
            const files = event.target.files;

            if (files.length > 9) {
                alert("Maksimal 9 foto!");
                event.target.value = "";
                placeholder.classList.remove('hidden');
                previewContainer.classList.add('hidden');
                return;
            }

            if (files.length > 0) {
                placeholder.classList.add('hidden');
                previewContainer.classList.remove('hidden');
            } else {
                placeholder.classList.remove('hidden');
                previewContainer.classList.add('hidden');
            }

            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) return;
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = "w-full aspect-square object-cover rounded-xl border border-gray-200 shadow-sm";
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        });
    });
</script>
