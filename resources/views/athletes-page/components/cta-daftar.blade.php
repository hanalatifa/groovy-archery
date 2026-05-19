{{-- CTA DAFTAR BLADE --}}

{{-- ═══ TOAST (bottom-right) ═══ --}}
<div id="appToast"
     class="fixed bottom-6 right-6 z-[99999] flex items-center gap-3
            px-5 py-3.5 rounded-2xl shadow-2xl
            bg-[#0f172a] text-white
            translate-y-20 opacity-0 pointer-events-none
            transition-all duration-500 ease-[cubic-bezier(.34,1.56,.64,1)]
            max-w-xs w-max">
    <span id="appToastIcon"
          class="flex-shrink-0 w-6 h-6 rounded-full flex items-center justify-center bg-emerald-500">
        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
        </svg>
    </span>
    <p id="appToastMsg" class="text-sm font-semibold leading-snug"></p>
</div>

{{-- ═══ CTA SECTION ═══ --}}
<section class="py-24 px-6 text-center border-t border-gray-100 dark:border-slate-800 transition-colors duration-300">
    <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">
        {{ __('athlets.request_label') }}
    </p>

    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
        {{ __('athlets.request_title') }}
    </h2>

    <p class="text-gray-500 dark:text-gray-400 text-sm max-w-md mx-auto mb-10 leading-relaxed">
        {{ __('athlets.request_desc') }}<br class="hidden md:block">
    </p>

    <div class="flex flex-col items-center gap-2">
        <p class="text-[10px] text-gray-400 dark:text-gray-500 tracking-wide">
            {{ __('athlets.request_contact') }}
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
            <button onclick="openRequestModal()"
                    class="group inline-flex items-center gap-3 px-7 py-3
                       bg-[#2b459a] text-white text-xs font-bold uppercase tracking-[2px]
                       hover:bg-[#1e3278] transition-all shadow-[0_10px_20px_rgba(43,69,154,0.3)]
                       active:scale-95">
            <span class="bg-white/20 p-1 rounded-full group-hover:rotate-90 transition-transform">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
            </span>
                {{ __('athlets.request_button') }}
            </button>

            <a href="#contact"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                      px-8 py-3 border border-gray-300 dark:border-slate-700
                      text-gray-700 dark:text-gray-300 font-bold text-sm
                      hover:border-[#2b459a] dark:hover:border-blue-400
                      hover:text-[#2b459a] dark:hover:text-blue-400
                      transition-all duration-200 active:scale-95">
                {{ __('athlets.request_contact_button') }}
            </a>
        </div>
    </div>
</section>
{{-- ═══ REQUEST MODAL ═══ --}}
<div class="modal-backdrop" id="requestModal">
    <div class="modal-request mx-4">

        {{-- Header --}}
        <div class="sticky top-0 bg-white dark:bg-slate-800 z-10 px-8 pt-8 pb-5
                    border-b border-gray-100 dark:border-slate-700 rounded-t-2xl">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-slate-100">
                        {{ __('athlets.request_modal_title') }}
                    </h3>
                    <p class="text-xs text-gray-400 dark:text-slate-400 mt-1">
                        {{ __('athlets.request_modal_subtitle') }}
                    </p>
                </div>
                <button onclick="closeRequestModal()"
                        class="text-gray-400 hover:text-gray-600 dark:text-slate-400
                               dark:hover:text-slate-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Body --}}
        <div class="px-8 py-7 space-y-5 bg-white dark:bg-slate-800">

            {{-- Foto --}}
            <div>
                <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-2 uppercase tracking-wide">
                    {{ __('athlets.request_photo') }}
                </label>

                <div class="relative group w-24 h-24">
                    <input type="file" id="reqFoto" accept="image/*" class="hidden">

                    <label for="reqFoto" id="photoPreview"
                           class="w-24 h-24 bg-gray-50 dark:bg-slate-700 border-2 border-dashed
                                  border-gray-200 dark:border-slate-600 rounded-2xl
                                  flex items-center justify-center overflow-hidden cursor-pointer
                                  hover:bg-gray-100 dark:hover:bg-slate-600
                                  hover:border-[#2b459a] dark:hover:border-blue-400
                                  transition-all relative">

                        <img id="img-preview"
                             class="hidden absolute inset-0 w-full h-full object-cover rounded-2xl">

                        <div id="placeholder" class="text-center p-2">
                            <svg class="w-6 h-6 mx-auto text-gray-300 dark:text-slate-500 mb-1"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="text-gray-300 dark:text-slate-500 text-[10px]">
                                {{ __('athlets.request_add_photo') }}
                            </span>
                        </div>
                    </label>
                </div>

                <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqFoto">
                    {{ __('athlets.request_error_photo') }}
                </p>
            </div>

            {{-- Nama & Umur --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-1.5 uppercase">
                        {{ __('athlets.request_name') }}
                    </label>
                    <input type="text" id="reqNama"
                           class="w-full px-4 py-2.5 border border-gray-200 dark:border-slate-600
                                  rounded-lg text-sm text-gray-900 dark:text-slate-100
                                  bg-white dark:bg-slate-700
                                  placeholder-gray-400 dark:placeholder-slate-500
                                  focus:outline-none focus:border-[#2b459a] dark:focus:border-blue-400
                                  transition-colors"
                           placeholder="{{ __('athlets.request_name_placeholder') }}">
                    <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqNama">
                        {{ __('athlets.request_error_name') }}
                    </p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-1.5 uppercase">
                        {{ __('athlets.request_age') }}
                    </label>
                    <input type="number" id="reqUmur"
                           class="w-full px-4 py-2.5 border border-gray-200 dark:border-slate-600
                                  rounded-lg text-sm text-gray-900 dark:text-slate-100
                                  bg-white dark:bg-slate-700
                                  placeholder-gray-400 dark:placeholder-slate-500
                                  focus:outline-none focus:border-[#2b459a] dark:focus:border-blue-400
                                  transition-colors"
                           placeholder="{{ __('athlets.request_age_placeholder') }}">
                    <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqUmur">
                        {{ __('athlets.request_error_age') }}
                    </p>
                </div>
            </div>

            {{-- Kategori --}}
            <div>
                <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-3 uppercase">
                    {{ __('athlets.request_category') }}
                </label>
                <div class="grid grid-cols-2 gap-3">
                    <input type="radio" name="reqKategori" id="katJunior"
                           value="Junior" class="req-kategori-option hidden">
                    <label for="katJunior"
                           class="req-kategori-label flex flex-col items-center p-4 border-2
                                  border-gray-200 dark:border-slate-600 rounded-xl cursor-pointer
                                  text-center hover:bg-gray-50 dark:hover:bg-slate-700/60 transition-all">
                        <p class="font-bold text-sm text-gray-900 dark:text-slate-100">
                            {{ __('athlets.request_junior') }}
                        </p>
                        <p class="text-[10px] text-gray-400 dark:text-slate-500">
                            {{ __('athlets.request_junior_desc') }}
                        </p>
                    </label>

                    <input type="radio" name="reqKategori" id="katSenior"
                           value="Senior" class="req-kategori-option hidden">
                    <label for="katSenior"
                           class="req-kategori-label flex flex-col items-center p-4 border-2
                                  border-gray-200 dark:border-slate-600 rounded-xl cursor-pointer
                                  text-center hover:bg-gray-50 dark:hover:bg-slate-700/60 transition-all">
                        <p class="font-bold text-sm text-gray-900 dark:text-slate-100">
                            {{ __('athlets.request_senior') }}
                        </p>
                        <p class="text-[10px] text-gray-400 dark:text-slate-500">
                            {{ __('athlets.request_senior_desc') }}
                        </p>
                    </label>
                </div>
                <p class="text-red-500 text-[10px] mt-2 hidden" id="errReqKategori">
                    {{ __('athlets.request_error_category') }}
                </p>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-1.5 uppercase">
                    {{ __('athlets.request_description') }}
                </label>
                <textarea id="reqDeskripsi" rows="3"
                          class="w-full px-4 py-2.5 border border-gray-200 dark:border-slate-600
                                 rounded-lg text-sm text-gray-900 dark:text-slate-100
                                 bg-white dark:bg-slate-700
                                 placeholder-gray-400 dark:placeholder-slate-500
                                 focus:outline-none focus:border-[#2b459a] dark:focus:border-blue-400
                                 transition-colors resize-none"
                          placeholder="{{ __('athlets.request_description_placeholder') }}"></textarea>
                <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqDeskripsi">
                    {{ __('athlets.request_error_description') }}
                </p>
            </div>
        </div>
{{-- Footer --}}
        <div class="sticky bottom-0 bg-white dark:bg-slate-800 border-t
                    border-gray-100 dark:border-slate-700 px-8 py-5 rounded-b-2xl">
            <button id="submitRequest"
                    class="w-full py-3 bg-[#2b459a] text-white font-bold rounded-xl text-sm
                           hover:bg-[#1e3278] transition-all active:scale-95
                           shadow-lg shadow-blue-900/20 disabled:opacity-60 disabled:cursor-not-allowed">
                {{ __('athlets.request_submit') }}
            </button>
        </div>
    </div>
</div>

{{-- ═══ STYLES ═══ --}}
<style>
    .modal-backdrop {
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        z-index: 9999;
        display: flex; align-items: center; justify-content: center;
        opacity: 0; pointer-events: none;
        transition: opacity 0.3s ease;
    }
    .modal-backdrop.open  { opacity: 1; pointer-events: all; }

    .modal-request {
        background: white; border-radius: 24px;
        width: 100%; max-width: 500px; max-height: 90vh;
        overflow-y: auto;
        transform: scale(0.9) translateY(20px);
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .modal-backdrop.open .modal-request { transform: scale(1) translateY(0); }

    .req-kategori-option:checked + .req-kategori-label {
        border-color: #2b459a;
        background: #f0f4ff;
    }

    /* Toast */
    #appToast.toast-show {
        transform: translateY(0) !important;
        opacity: 1 !important;
        pointer-events: auto !important;
    }
</style>

{{-- ═══ SCRIPTS ═══ --}}
<script>
    /* ─────────────────────────────────────
       TOAST
    ───────────────────────────────────── */
    let _toastTimer = null;

    function showToast(message, isError = false) {
        const toast  = document.getElementById('appToast');
        const msgEl  = document.getElementById('appToastMsg');
        const iconEl = document.getElementById('appToastIcon');
        if (!toast || !msgEl || !iconEl) return;

        clearTimeout(_toastTimer);
        msgEl.textContent = message;

        if (isError) {
            iconEl.className = 'flex-shrink-0 w-6 h-6 rounded-full flex items-center justify-center bg-red-500';
            iconEl.innerHTML = `<svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>`;
        } else {
            iconEl.className = 'flex-shrink-0 w-6 h-6 rounded-full flex items-center justify-center bg-emerald-500';
            iconEl.innerHTML = `<svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>`;
        }

        toast.classList.add('toast-show');
        _toastTimer = setTimeout(() => toast.classList.remove('toast-show'), 3500);
    }

    /* ─────────────────────────────────────
       MODAL
    ───────────────────────────────────── */
    function openRequestModal() {
        document.getElementById('requestModal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeRequestModal() {
        document.getElementById('requestModal').classList.remove('open');
        document.body.style.overflow = '';
        resetFormAtlet();
    }

    function resetFormAtlet() {
        ['reqNama', 'reqUmur', 'reqDeskripsi'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });
        const fi = document.getElementById('reqFoto');
        if (fi) fi.value = '';
        const prev = document.getElementById('img-preview');
        const ph   = document.getElementById('placeholder');
        if (prev) { prev.src = ''; prev.classList.add('hidden'); }
        if (ph)   ph.classList.remove('hidden');
        document.querySelectorAll('.req-kategori-option').forEach(r => r.checked = false);
        document.querySelectorAll('[id^="errReq"]').forEach(el => el.classList.add('hidden'));
    }

    /* Klik backdrop → tutup */
    document.getElementById('requestModal').addEventListener('click', function (e) {
        if (e.target === this) closeRequestModal();
    });

    /* ─────────────────────────────────────
       FILE PREVIEW
    ───────────────────────────────────── */
    document.getElementById('reqFoto').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (ev) => {
            const prev = document.getElementById('img-preview');
            const ph   = document.getElementById('placeholder');
            prev.src = ev.target.result;
            prev.classList.remove('hidden');
            ph.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    });

    /* ─────────────────────────────────────
       SUBMIT — handle redirect & JSON
    ───────────────────────────────────── */
    let isSubmitting = false;

    document.getElementById('submitRequest').addEventListener('click', async function (e) {
        e.preventDefault();
        if (isSubmitting) return;

        const btn       = this;
        const origLabel = btn.textContent.trim();

        /* Kumpulkan nilai */
        const nama      = document.getElementById('reqNama').value.trim();
        const umur      = document.getElementById('reqUmur').value.trim();
        const deskripsi = document.getElementById('reqDeskripsi').value.trim();
        const foto      = document.getElementById('reqFoto').files[0];
        const katOption = document.querySelector('input[name="reqKategori"]:checked');
        const kategori  = katOption ? katOption.value : '';

        /* Validasi */
        document.getElementById('errReqNama').classList.toggle('hidden', !!nama);
        document.getElementById('errReqUmur').classList.toggle('hidden', !!umur);
        document.getElementById('errReqDeskripsi').classList.toggle('hidden', !!deskripsi);
        document.getElementById('errReqFoto').classList.toggle('hidden', !!foto);
        document.getElementById('errReqKategori').classList.toggle('hidden', !!kategori);
        if (!nama || !umur || !deskripsi || !foto || !kategori) return;

        /* Loading */
        isSubmitting    = true;
        btn.disabled    = true;
        btn.textContent = '{{ __('athlets.request_loading') }}';

        const formData = new FormData();
        formData.append('nama',      nama);
        formData.append('umur',      umur);
        formData.append('deskripsi', deskripsi);
        formData.append('kategori',  kategori);
        formData.append('foto',      foto);
        formData.append('_token',    '{{ csrf_token() }}');

        try {
            const response = await fetch("{{ route('atlet.store') }}", {
                method:  'POST',
                body:    formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            /*
             * Server bisa return:
             *   A) redirect (302)  → response.redirected === true  → anggap sukses
             *   B) JSON {success:true}                             → anggap sukses
             *   C) JSON {success:false, message:'...'}             → tampilkan pesan error
             *   D) non-2xx tanpa JSON                              → error generik
             */
            const contentType = response.headers.get('content-type') || '';
            let result = null;

            if (contentType.includes('application/json')) {
                result = await response.json().catch(() => null);
            }

            const isSuccess = response.redirected          /* redirect = sukses */
                || (response.ok && result === null)        /* ok tapi bukan JSON = sukses */
                || (response.ok && result?.success);       /* ok + JSON success */

            if (isSuccess) {
                closeRequestModal();
                showToast("{{ __('athlets.request_success') }} 🎯");

                /* Kalau server redirect ke URL lain, ikuti setelah toast tampil */
                if (response.redirected && response.url && response.url !== window.location.href) {
                    setTimeout(() => { window.location.href = response.url; }, 1800);
                }
            } else {
                const errMsg = result?.message || 'Terjadi kesalahan pada server.';
                showToast(errMsg, true);
            }

        } catch (err) {
            console.error(err);
            showToast('Gagal mengirim. Pastikan koneksi stabil dan coba lagi.', true);
        } finally {
            btn.disabled    = false;
            btn.textContent = origLabel;
            isSubmitting    = false;
        }
    });
</script>