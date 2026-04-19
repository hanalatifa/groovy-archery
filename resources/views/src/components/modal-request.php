<div class="modal-backdrop" id="requestModal">
    <div class="modal-request mx-4">

        <div class="sticky top-0 bg-white z-10 px-8 pt-8 pb-5 border-b border-gray-100 rounded-t-2xl">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Request Tambah Atlet</h3>
                    <p class="text-xs text-gray-400 mt-1">Isi data di bawah, admin akan segera memproses requestmu</p>
                </div>
                <button onclick="closeRequestModal()"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-gray-400
                               hover:bg-gray-100 hover:text-gray-600 transition-colors flex-shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="px-8 py-7 space-y-5">

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">
                    Nama Lengkap <span class="text-red-400">*</span>
                </label>
                <input type="text" id="reqNama" placeholder="Masukkan nama lengkap atlet"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700
                              placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25
                              focus:border-[#2b459a] transition">
                <p class="text-red-500 text-xs mt-1 hidden" id="errReqNama">Nama wajib diisi</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">
                    Umur <span class="text-red-400">*</span>
                </label>
                <input type="number" id="reqUmur" placeholder="Contoh: 17" min="5" max="60"
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700
                              placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25
                              focus:border-[#2b459a] transition">
                <p class="text-red-500 text-xs mt-1 hidden" id="errReqUmur">Umur wajib diisi</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-3 uppercase tracking-wide">
                    Kategori <span class="text-red-400">*</span>
                </label>
                <div class="grid grid-cols-2 gap-3">

                    <input type="radio" name="reqKategori" id="katJunior" value="Junior" class="req-kategori-option hidden">
                    <label for="katJunior"
                           class="req-kategori-label flex flex-col items-center gap-2 p-4 border-2 border-gray-200
                                  rounded-xl cursor-pointer transition-all duration-200 text-center
                                  hover:border-[#2b459a]/40">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-gray-900">Junior</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Di bawah 18 tahun</p>
                        </div>
                    </label>

                    <input type="radio" name="reqKategori" id="katSenior" value="Senior" class="req-kategori-option hidden">
                    <label for="katSenior"
                           class="req-kategori-label flex flex-col items-center gap-2 p-4 border-2 border-gray-200
                                  rounded-xl cursor-pointer transition-all duration-200 text-center
                                  hover:border-[#2b459a]/40">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#2b459a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-gray-900">Senior</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">18 tahun ke atas</p>
                        </div>
                    </label>

                </div>
                <p class="text-red-500 text-xs mt-2 hidden" id="errReqKategori">Pilih kategori terlebih dahulu</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase tracking-wide">
                    Deskripsi Atlet <span class="text-red-400">*</span>
                </label>
                <textarea id="reqDeskripsi" rows="4"
                          placeholder="Ceritakan sedikit tentang atlet ini, prestasi, atau alasan request..."
                          class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700
                                 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#2b459a]/25
                                 focus:border-[#2b459a] transition resize-none"></textarea>
                <p class="text-red-500 text-xs mt-1 hidden" id="errReqDeskripsi">Deskripsi wajib diisi</p>
            </div>

        </div>

        <div class="sticky bottom-0 bg-white border-t border-gray-100 px-8 py-5 rounded-b-2xl flex gap-3">
            <button id="submitRequest"
                    class="flex-1 py-3 bg-[#2b459a] text-white font-bold text-sm uppercase tracking-wide
                           rounded-xl hover:bg-[#1e3278] transition-colors flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Kirim Request
            </button>
            <button onclick="closeRequestModal()"
                    class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold text-sm
                           rounded-xl hover:bg-gray-50 transition-colors">
                Batal
            </button>
        </div>

    </div>
</div>

<style>
    .modal-backdrop {
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(3px);
        z-index: 9999;
        display: flex; align-items: center; justify-content: center;
        opacity: 0; pointer-events: none;
        transition: opacity 0.25s ease;
    }
    .modal-backdrop.open { opacity: 1; pointer-events: all; }

    .modal-request {
        background: #fff;
        border-radius: 16px;
        width: 100%;
        max-width: 520px;
        max-height: 90vh;
        overflow-y: auto;
        transform: translateY(20px) scale(0.96);
        transition: transform 0.35s cubic-bezier(0.4,0,0.2,1);
        scrollbar-width: thin;
        scrollbar-color: #e5e7eb transparent;
    }
    .modal-backdrop.open .modal-request { transform: translateY(0) scale(1); }

    /* Kategori card radio */
    .req-kategori-option:checked + .req-kategori-label {
        border-color: #2b459a;
        background: #f0f3fb;
    }
    .req-kategori-option:checked + .req-kategori-label .w-10 {
        background: #2b459a;
    }
    .req-kategori-option:checked + .req-kategori-label .w-10 svg {
        color: white;
    }

    /* Toast */
    @keyframes toastIn {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes toastOut {
        from { opacity: 1; transform: translateY(0); }
        to   { opacity: 0; transform: translateY(16px); }
    }
    .toast-notif {
        position: fixed; bottom: 28px; right: 28px; z-index: 99999;
        background: #1a1a2e; color: #fff;
        padding: 14px 20px; border-radius: 10px;
        font-size: 13px; font-weight: 600;
        display: flex; align-items: center; gap: 10px;
        animation: toastIn 0.35s ease forwards;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        font-family: 'Montserrat', sans-serif;
    }
    .toast-notif.hide { animation: toastOut 0.35s ease forwards; }
    .toast-icon-wrap {
        width: 20px; height: 20px;
        background: #22c55e; border-radius: 50%;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
</style>

<script>
    const requestModal = document.getElementById('requestModal');

    function openRequestModal()  {
        requestModal.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeRequestModal() {
        requestModal.classList.remove('open');
        document.body.style.overflow = '';
    }

    // Tutup kalau klik backdrop
    requestModal.addEventListener('click', e => {
        if (e.target === requestModal) closeRequestModal();
    });

    // Submit
    document.getElementById('submitRequest').addEventListener('click', () => {
        const nama      = document.getElementById('reqNama').value.trim();
        const umur      = document.getElementById('reqUmur').value.trim();
        const kategori  = document.querySelector('input[name="reqKategori"]:checked');
        const deskripsi = document.getElementById('reqDeskripsi').value.trim();

        // Validasi
        document.getElementById('errReqNama').classList.toggle('hidden', !!nama);
        document.getElementById('errReqUmur').classList.toggle('hidden', !!umur);
        document.getElementById('errReqKategori').classList.toggle('hidden', !!kategori);
        document.getElementById('errReqDeskripsi').classList.toggle('hidden', !!deskripsi);

        if (!nama || !umur || !kategori || !deskripsi) return;

        closeRequestModal();

        // Reset form
        document.getElementById('reqNama').value = '';
        document.getElementById('reqUmur').value = '';
        document.getElementById('reqDeskripsi').value = '';
        document.querySelectorAll('input[name="reqKategori"]').forEach(r => r.checked = false);

        // Toast notifikasi
        const toast = document.createElement('div');
        toast.className = 'toast-notif';
        toast.innerHTML = `
            <div class="toast-icon-wrap">
                <svg width="12" height="12" fill="none" stroke="white" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <span>Request berhasil dikirim! Admin akan segera memproses.</span>`;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 400);
        }, 3500);
    });
</script>