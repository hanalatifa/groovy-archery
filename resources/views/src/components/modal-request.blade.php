<div class="modal-backdrop" id="requestModal">
    <div class="modal-request mx-4 
                bg-white dark:bg-slate-800 
                border border-gray-100 dark:border-slate-700
                rounded-2xl shadow-2xl">

        {{-- Header --}}
        <div class="sticky top-0 z-10 px-8 pt-8 pb-5 border-b 
                    border-gray-100 dark:border-slate-700 
                    bg-white dark:bg-slate-800 
                    rounded-t-2xl">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-slate-100">
                        Request Tambah Atlet
                    </h3>
                    <p class="text-xs text-gray-400 dark:text-slate-400 mt-1">
                        Klik kotak di bawah untuk mengunggah foto atlet
                    </p>
                </div>
                <button onclick="closeRequestModal()" 
                        class="text-gray-400 hover:text-gray-600 dark:text-slate-400 dark:hover:text-slate-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Body --}}
        <div class="px-8 py-7 space-y-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-2 uppercase tracking-wide">
                    Foto Atlet *
                </label>
                <div class="relative group">
                    <input type="file" id="reqFoto" accept="image/*" class="sr-only hidden">
                    <label for="reqFoto" id="labelFoto" 
                           class="flex flex-col items-center justify-center w-full h-72 
                                  border-2 border-dashed rounded-2xl cursor-pointer 
                                  border-gray-300 dark:border-slate-600
                                  bg-gray-50 dark:bg-slate-700/50
                                  hover:bg-gray-100 dark:hover:bg-slate-700
                                  transition-all overflow-hidden relative">
                        <img id="img-preview" class="hidden absolute inset-0 w-full h-full object-cover z-10">
                        <div id="placeholder" class="flex flex-col items-center justify-center pt-5 pb-6 z-0 text-center">
                            <svg class="w-12 h-12 mb-3 text-gray-400 dark:text-slate-500" 
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="text-sm font-semibold text-gray-500 dark:text-slate-400">
                                Klik untuk upload foto
                            </p>
                            <p class="text-[10px] text-gray-400 dark:text-slate-500 mt-1 uppercase">
                                PNG, JPG (Maks. 10MB)
                            </p>
                        </div>
                    </label>
                </div>
                <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqFoto">
                    Foto wajib diunggah
                </p>
            </div>

            {{-- Nama & Umur --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-1.5 uppercase">
                        Nama Lengkap *
                    </label>
                    <input type="text" id="reqNama" 
                           class="w-full px-4 py-2.5 text-sm rounded-xl outline-none
                                  border border-gray-200 dark:border-slate-600
                                  bg-white dark:bg-slate-700
                                  text-gray-900 dark:text-slate-100
                                  placeholder-gray-400 dark:placeholder-slate-500
                                  focus:border-[#2b459a] dark:focus:border-blue-400
                                  transition-colors"
                           placeholder="Nama atlet">
                    <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqNama">
                        Nama wajib diisi
                    </p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-1.5 uppercase">
                        Umur *
                    </label>
                    <input type="number" id="reqUmur" 
                           class="w-full px-4 py-2.5 text-sm rounded-xl outline-none
                                  border border-gray-200 dark:border-slate-600
                                  bg-white dark:bg-slate-700
                                  text-gray-900 dark:text-slate-100
                                  placeholder-gray-400 dark:placeholder-slate-500
                                  focus:border-[#2b459a] dark:focus:border-blue-400
                                  transition-colors"
                           placeholder="17">
                    <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqUmur">
                        Umur wajib diisi
                    </p>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-xs font-bold text-gray-700 dark:text-slate-300 mb-1.5 uppercase">
                    Deskripsi *
                </label>
                <textarea id="reqDeskripsi" rows="3" 
                          class="w-full px-4 py-2.5 text-sm rounded-xl resize-none outline-none
                                 border border-gray-200 dark:border-slate-600
                                 bg-white dark:bg-slate-700
                                 text-gray-900 dark:text-slate-100
                                 placeholder-gray-400 dark:placeholder-slate-500
                                 focus:border-[#2b459a] dark:focus:border-blue-400
                                 transition-colors"
                          placeholder="Prestasi atlet..."></textarea>
                <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqDeskripsi">
                    Deskripsi wajib diisi
                </p>
            </div>
        </div>

        {{-- Footer --}}
        <div class="sticky bottom-0 px-8 py-5 rounded-b-2xl border-t
                    border-gray-100 dark:border-slate-700
                    bg-white dark:bg-slate-800">
            <button id="submitRequest" 
                    class="w-full py-3 font-bold rounded-xl text-sm text-white
                           bg-[#2b459a] hover:bg-[#1e3278] 
                           transition-all active:scale-95 
                           shadow-lg shadow-blue-900/20">
                Kirim Request
            </button>
        </div>

    </div>
</div>

<script>
    let isSubmitting = false;
    let abortController = null;

    function openRequestModal() {
        document.getElementById('requestModal').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeRequestModal() {
        const modal = document.getElementById('requestModal');
        modal.classList.remove('open');
        document.body.style.overflow = '';
        setTimeout(() => {
            isSubmitting = false;
        }, 500);
    }

    document.getElementById('reqFoto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const imgPreview = document.getElementById('img-preview');
        const placeholder = document.getElementById('placeholder');
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imgPreview.src = e.target.result;
                imgPreview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('submitRequest').addEventListener('click', async function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        if (isSubmitting) return;

        const btn = this;
        const fotoInput = document.getElementById('reqFoto');
        const nama = document.getElementById('reqNama').value.trim();
        const umur = document.getElementById('reqUmur').value.trim();
        const deskripsi = document.getElementById('reqDeskripsi').value.trim();
        const foto = fotoInput.files[0];

        if (!nama || !umur || !deskripsi || !foto) {
            document.getElementById('errReqNama').classList.toggle('hidden', !!nama);
            document.getElementById('errReqUmur').classList.toggle('hidden', !!umur);
            document.getElementById('errReqDeskripsi').classList.toggle('hidden', !!deskripsi);
            document.getElementById('errReqFoto').classList.toggle('hidden', !!foto);
            return;
        }

        isSubmitting = true;
        btn.disabled = true;
        btn.style.opacity = '0.7';
        btn.style.cursor = 'not-allowed';
        btn.innerText = 'Mengirim...';

        abortController = new AbortController();

        const formData = new FormData();
        formData.append('nama', nama);
        formData.append('umur', umur);
        formData.append('deskripsi', deskripsi);
        formData.append('foto', foto);
        formData.append('_token', '{{ csrf_token() }}');

        try {
            const response = await fetch("{{ route('atlet.store') }}", {
                method: 'POST',
                body: formData,
                signal: abortController.signal,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const result = await response.json();

            if (response.ok && result.success) {
                document.getElementById('reqNama').value = '';
                document.getElementById('reqUmur').value = '';
                document.getElementById('reqDeskripsi').value = '';
                fotoInput.value = "";
                document.getElementById('img-preview').classList.add('hidden');
                document.getElementById('placeholder').classList.remove('hidden');

            closeModal();
            formTestimoni.reset();
            showToast('Request berhasil dikirim! Admin akan segera memprosesnya...');

        } catch (err) {
            showToast('Gagal mengirim. Silakan coba lagi.', true);
        } finally {
            btn.disabled = false;
            btn.textContent = origText;
        }
    });
</script>