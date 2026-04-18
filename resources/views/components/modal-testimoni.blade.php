{{-- resources/views/components/modal-testimoni.blade.php --}}
<div class="modal-backdrop fixed inset-0 bg-black/50 z-50 hidden items-center justify-center" id="testiModal">
    <div class="modal-box bg-white rounded-3xl p-8 max-w-md w-full mx-4 shadow-2xl">
        <form action="{{ route('testimoni.store') }}" method="POST" id="formTestimoni">
            @csrf
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-900">Tambah Testimoni</h3>
                <button type="button" onclick="document.getElementById('testiModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    ✕
                </button>
            </div>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase">Nama</label>
                    <input type="text" name="nama" required class="w-full px-4 py-2.5 border rounded-lg text-sm outline-none focus:border-[#2b459a]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2 uppercase">Rating</label>
                    <div class="flex flex-row-reverse justify-end gap-1">
                        @for($i = 5; $i >= 1; $i--)
                        <input type="radio" name="rating" id="modal_star{{ $i }}" value="{{ $i }}" class="hidden peer" required>
                        <label for="modal_star{{ $i }}" class="text-2xl text-gray-300 cursor-pointer peer-checked:text-amber-400 transition-colors">★</label>
                        @endfor
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required class="w-full px-4 py-2.5 border rounded-lg text-sm outline-none focus:border-[#2b459a]"></textarea>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="flex-1 py-3 bg-[#2b459a] text-white font-bold text-sm rounded-xl hover:bg-[#1e3278]">
                    Simpan Testimoni
                </button>
                <button type="button" onclick="document.getElementById('testiModal').classList.add('hidden')" class="px-5 py-3 border rounded-xl text-sm font-semibold">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>