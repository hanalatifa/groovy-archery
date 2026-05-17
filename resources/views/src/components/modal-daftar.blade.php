<div class="modal-backdrop hidden opacity-0 transition-all duration-300 fixed inset-0 z-[10000] bg-black/60 backdrop-blur-sm flex items-center justify-center"
    id="daftarModal">
    <div class="modal-daftar mx-4 bg-white dark:bg-slate-900 w-full max-w-lg rounded-2xl shadow-2xl overflow-y-auto max-h-[90vh] transition-transform duration-300 scale-95"
        id="modalContainer">

        <div
            class="sticky top-0 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md z-10 px-8 pt-8 pb-5 border-b border-gray-100 dark:border-slate-800 rounded-t-2xl">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white text-md">{{ __('gallery.modal_title') }}
                    </h3>
                    <p class="text-[11px] text-gray-400 dark:text-gray-500 mt-1 uppercase tracking-wider font-medium">
                        {{ __('gallery.modal_subtitle') }}</p>
                </div>
                <button onclick="closeDaftarModal()"
                    class="w-10 h-10 rounded-full flex items-center justify-center text-gray-400 hover:bg-gray-100 dark:hover:bg-slate-800 hover:text-gray-600 dark:hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="px-8 py-7 space-y-6">

            <div>
                <label
                    class="block text-[10px] font-black text-gray-700 dark:text-gray-400 mb-2 uppercase tracking-widest">
                    {{ __('gallery.modal_nama') }}
                    <span class="text-red-400">*</span>
                </label>
                <input type="text" id="daftarNama" placeholder="{{ __('gallery.modal_nama_placeholder') }}"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-xl text-sm text-gray-700 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/20 focus:border-[#2b459a] transition-all">
                <p class="text-red-500 text-[10px] mt-1 hidden font-bold uppercase" id="errDaftarNama">
                    {{ __('gallery.modal_nama_err') }}</p>
            </div>

            <div>
                <label
                    class="block text-[10px] font-black text-gray-700 dark:text-gray-400 mb-2 uppercase tracking-widest">
                    {{ __('gallery.modal_umur') }}
                    <span class="text-red-400">*</span>
                </label>
                <input type="number" id="daftarUmur" placeholder="{{ __('gallery.modal_umur_placeholder') }}"
                    min="5" max="60"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-xl text-sm text-gray-700 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/20 focus:border-[#2b459a] transition-all">
                <p class="text-red-500 text-[10px] mt-1 hidden font-bold uppercase" id="errDaftarUmur">
                    {{ __('gallery.modal_umur_err') }}</p>
            </div>

            <div>
                <label
                    class="block text-[10px] font-black text-gray-700 dark:text-gray-400 mb-4 uppercase tracking-widest">
                    {{ __('gallery.modal_program') }}
                    <span class="text-red-400">*</span>
                </label>
                <div class="grid grid-cols-1 gap-3">
                    <label
                        class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-all border-gray-100 dark:border-slate-800 group has-[:checked]:border-[#2b459a] has-[:checked]:bg-blue-50 dark:has-[:checked]:bg-blue-900/20">
                        <input type="radio" name="daftarProgram" value="Regular" class="hidden peer">
                        <div class="flex flex-col">
                            <span
                                class="text-sm font-bold text-gray-900 dark:text-white">{{ __('gallery.modal_regular_title') }}</span>
                            <span
                                class="text-[11px] text-gray-500 dark:text-gray-400">{{ __('gallery.modal_regular_sub') }}</span>
                        </div>
                        <div
                            class="ml-auto w-5 h-5 rounded-full border-2 border-gray-200 dark:border-slate-700 flex items-center justify-center peer-checked:border-[#2b459a] transition-all">
                            <div
                                class="w-2.5 h-2.5 rounded-full bg-[#2b459a] opacity-0 peer-checked:opacity-100 scale-50 peer-checked:scale-100 transition-all">
                            </div>
                        </div>
                    </label>

                    <label
                        class="relative flex items-center p-4 border rounded-xl cursor-pointer hover:bg-purple-50 dark:hover:bg-purple-900/10 transition-all border-gray-100 dark:border-slate-800 group has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50 dark:has-[:checked]:bg-purple-900/20">
                        <input type="radio" name="daftarProgram" value="Intensif" class="hidden peer">
                        <div class="flex flex-col">
                            <span
                                class="text-sm font-bold text-gray-900 dark:text-white">{{ __('gallery.modal_intensif_title') }}</span>
                            <span
                                class="text-[11px] text-gray-500 dark:text-gray-400">{{ __('gallery.modal_intensif_sub') }}</span>
                        </div>
                        <div
                            class="ml-auto w-5 h-5 rounded-full border-2 border-gray-200 dark:border-slate-700 flex items-center justify-center peer-checked:border-purple-600 transition-all">
                            <div
                                class="w-2.5 h-2.5 rounded-full bg-purple-600 opacity-0 peer-checked:opacity-100 scale-50 peer-checked:scale-100 transition-all">
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-3 uppercase tracking-wide">
                    {{ __('gallery.modal_lokasi') }}
                    <span class="text-red-400">*</span>
                </label>

                <div class="flex gap-2 mb-4 flex-wrap">
                    <button type="button"
                        class="lokasi-tab active px-4 py-2 border border-gray-200 rounded-lg text-xs font-bold text-gray-600 hover:border-[#2b459a]"
                        data-lokasi="grtp">
                        {{ __('gallery.modal_lokasi_grtp') }}
                    </button>
                    <button type="button"
                        class="lokasi-tab px-4 py-2 border border-gray-200 rounded-lg text-xs font-bold text-gray-600 hover:border-[#2b459a]"
                        data-lokasi="bmw">
                        {{ __('gallery.modal_lokasi_bmw') }}
                    </button>
                    <button type="button"
                        class="lokasi-tab px-4 py-2 border border-gray-200 rounded-lg text-xs font-bold text-gray-600 hover:border-[#2b459a]"
                        data-lokasi="yon">
                        {{ __('gallery.modal_lokasi_yon') }}
                    </button>
                </div>

                <div class="lokasi-map active rounded-xl overflow-hidden border border-gray-100 shadow-sm"
                    id="map-grtp">
                    <div class="bg-blue-50 border-b border-blue-100 px-4 py-2.5 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-[#2b459a]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-[11px] font-bold text-[#2b459a]">{{ __('gallery.modal_addr_grtp') }}</span>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.86480187499!3d-6.151819693834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e3c5a5b5c5d%3A0xabcdef1234567890!2sGelanggang%20Remaja%20Tanjung%20Priok%2C%20Sunter%2C%20Jakarta%20Utara!5e0!3m2!1sid!2sid!4v1700000000001!5m2!1sid!2sid"
                        width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="lokasi-map rounded-xl overflow-hidden border border-gray-100 shadow-sm" id="map-bmw">
                    <div class="bg-blue-50 border-b border-blue-100 px-4 py-2.5 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-[#2b459a]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-[11px] font-bold text-[#2b459a]">{{ __('gallery.modal_addr_bmw') }}</span>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3!2d106.8750!3d-6.1450!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e0000000001%3A0x0000000000000001!2sLapangan%20BMW%2C%20Sunter%2C%20Jakarta%20Utara!5e0!3m2!1sid!2sid!4v1700000000002!5m2!1sid!2sid"
                        width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="lokasi-map rounded-xl overflow-hidden border border-gray-100 shadow-sm" id="map-yon">
                    <div class="bg-blue-50 border-b border-blue-100 px-4 py-2.5 flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-[#2b459a]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-[11px] font-bold text-[#2b459a]">{{ __('gallery.modal_addr_yon') }}</span>
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8!2d106.9200!3d-6.1100!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f000000001%3A0x0000000000000002!2sBatalyon%20Arhanud%20Udara%2C%20Cilincing%2C%20Jakarta%20Utara!5e0!3m2!1sid!2sid!4v1700000000003!5m2!1sid!2sid"
                        width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <p class="text-red-500 text-xs mt-2 hidden" id="errDaftarLokasi">{{ __('gallery.modal_lokasi_err') }}
                </p>
            </div>
        </div>

        <div
            class="sticky bottom-0 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-t border-gray-100 dark:border-slate-800 px-8 py-5">
           <button id="submitDaftar" onclick="submitDaftarWhatsApp()"
    class="group w-full py-4 bg-[#274494] text-white font-bold text-xs uppercase tracking-[2px] rounded-xl flex items-center justify-center gap-3 hover:shadow-xl hover:shadow-blue-500/20 active:scale-[0.98] transition-all">
    <svg class="w-5 h-5 transition-transform group-hover:rotate-12" fill="currentColor"
        viewBox="0 0 24 24">
        <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
    </svg>
    {{ __('gallery.modal_btn_submit') }}
</button>
        </div>

    </div>
</div>

<script>
    function submitDaftarWhatsApp() {
    const nama = document.getElementById('daftarNama').value.trim();
    const umur = document.getElementById('daftarUmur').value.trim();
    const program = document.querySelector('input[name="daftarProgram"]:checked');
    const lokasi = document.querySelector('.lokasi-tab.active');

    // Reset errors
    document.getElementById('errDaftarNama').classList.add('hidden');
    document.getElementById('errDaftarUmur').classList.add('hidden');
    document.getElementById('errDaftarLokasi').classList.add('hidden');

    // Validasi
    let valid = true;
    if (!nama) {
        document.getElementById('errDaftarNama').classList.remove('hidden');
        valid = false;
    }
    if (!umur || umur < 5 || umur > 60) {
        document.getElementById('errDaftarUmur').classList.remove('hidden');
        valid = false;
    }
    if (!program) {
        valid = false;
    }

    if (!valid) return;

    const lokasiText = lokasi ? lokasi.textContent.trim() : '-';
    const programText = program ? program.value : '-';

    const pesan = 
        `Halo Coach Groovy Archery! \n\n` +
        `Saya ingin mendaftar dengan detail berikut:\n` +
        `Nama: ${nama}\n` +
        `Umur: ${umur} tahun\n` +
        `Program: ${programText}\n` +
        `Lokasi: ${lokasiText}\n\n` +
        `Bisa bantu saya untuk menentukan jadwal?\nTerima kasih!`;

    const url = `https://wa.me/6281214711219?text=${encodeURIComponent(pesan)}`;
    window.open(url, '_blank');
}
</script>

<style>
    .lokasi-tab {
        border-color: #f3f4f6;
        color: #9ca3af;
    }

    .dark .lokasi-tab {
        border-color: #1e293b;
    }

    .lokasi-tab.active {
        border-color: #2b459a;
        color: #2b459a;
        background: #eff6ff;
    }

    .dark .lokasi-tab.active {
        border-color: #3b82f6;
        color: #3b82f6;
        background: rgba(59, 130, 246, 0.1);
    }
</style>
