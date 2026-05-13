<section class="py-24 px-6 text-center border-t border-gray-100 dark:border-slate-800 transition-colors duration-300">
    <p class="text-[10px] font-bold text-[#2b459a] dark:text-blue-400 uppercase tracking-[5px] mb-2">Request</p>

    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Namamu belum tercantum?</h2>

    <p class="text-gray-500 dark:text-gray-400 text-sm max-w-md mx-auto mb-10 leading-relaxed">
        Sudah bergabung dalam club tapi namamu belum tercantum?<br class="hidden md:block">
        Request kepada admin untuk segera ditambahkan!
    </p>

    <div class="flex flex-col items-center gap-2">
        <p class="text-[10px] text-gray-400 dark:text-gray-500 tracking-wide">Hubungi coach kami</p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
            <button onclick="openRequestModal()"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 bg-[#2b459a] dark:bg-blue-600
                           text-white font-bold text-sm hover:bg-[#1e3278] dark:hover:bg-blue-700
                           transition-all duration-200 shadow-lg shadow-blue-900/10 active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Request Tambahkan
            </button>

            <a href="#contact"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3 border border-gray-300 dark:border-slate-700
                      text-gray-700 dark:text-gray-300 font-bold text-sm hover:border-[#2b459a] dark:hover:border-blue-400
                      hover:text-[#2b459a] dark:hover:text-blue-400 transition-all duration-200 active:scale-95">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<div class="modal-backdrop" id="requestModal">
    <div class="modal-request mx-4">
        <div class="sticky top-0 bg-white z-10 px-8 pt-8 pb-5 border-b border-gray-100 rounded-t-2xl">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Request Tambah Atlet</h3>
                    <p class="text-xs text-gray-400 mt-1">Isi data di bawah, admin akan segera memproses requestmu</p>
                </div>
                <button onclick="closeRequestModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <div class="px-8 py-7 space-y-5">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2 uppercase tracking-wide">Foto Atlet *</label>

                <div class="relative group w-24 h-24">
                    <input type="file" id="reqFoto" accept="image/*" class="hidden">

                    <label for="reqFoto"
                           id="photoPreview"
                           class="w-24 h-24 bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl
                                  flex items-center justify-center overflow-hidden cursor-pointer
                                  hover:bg-gray-100 hover:border-[#2b459a] transition-all relative">

                        <img id="img-preview" class="hidden absolute inset-0 w-full h-full object-cover">

                        <div id="placeholder-text" class="text-center p-2">
                            <svg class="w-6 h-6 mx-auto text-gray-300 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="text-gray-300 text-[10px]">Add Photo</span>
                        </div>
                    </label>
                </div>

                <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqFoto">Foto wajib diunggah</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase">Nama Lengkap *</label>
                    <input type="text" id="reqNama" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm" placeholder="Nama atlet">
                    <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqNama">Nama wajib diisi</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase">Umur *</label>
                    <input type="number" id="reqUmur" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm" placeholder="Contoh: 17">
                    <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqUmur">Umur wajib diisi</p>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-3 uppercase">Kategori *</label>
                <div class="grid grid-cols-2 gap-3">
                    <input type="radio" name="reqKategori" id="katJunior" value="Junior" class="req-kategori-option hidden">
                    <label for="katJunior" class="req-kategori-label flex flex-col items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer text-center hover:bg-gray-50 transition-all">
                        <p class="font-bold text-sm text-gray-900">Junior</p>
                        <p class="text-[10px] text-gray-400">Di bawah 18 thn</p>
                    </label>

                    <input type="radio" name="reqKategori" id="katSenior" value="Senior" class="req-kategori-option hidden">
                    <label for="katSenior" class="req-kategori-label flex flex-col items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer text-center hover:bg-gray-50 transition-all">
                        <p class="font-bold text-sm text-gray-900">Senior</p>
                        <p class="text-[10px] text-gray-400">18 thn ke atas</p>
                    </label>
                </div>
                <p class="text-red-500 text-[10px] mt-2 hidden" id="errReqKategori">Pilih kategori</p>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5 uppercase">Deskripsi *</label>
                <textarea id="reqDeskripsi" rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-lg text-sm resize-none" placeholder="Prestasi atau info singkat..."></textarea>
                <p class="text-red-500 text-[10px] mt-1 hidden" id="errReqDeskripsi">Deskripsi wajib diisi</p>
            </div>
        </div>

        <div class="sticky bottom-0 bg-white border-t border-gray-100 px-8 py-5 rounded-b-2xl flex gap-3">
            <button id="submitRequest" class="flex-1 py-3 bg-[#2b459a] text-white font-bold rounded-xl text-sm hover:bg-[#1e3278] transition-all active:scale-95 shadow-lg shadow-blue-900/20">
                Kirim Request
            </button>
        </div>
    </div>
</div>

<style>
    .modal-backdrop {
        position: fixed; inset: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);
        z-index: 9999; display: flex; align-items: center; justify-content: center;
        opacity: 0; pointer-events: none; transition: all 0.3s ease;
    }
    .modal-backdrop.open { opacity: 1; pointer-events: all; }

    .modal-request {
        background: white; border-radius: 24px; width: 100%; max-width: 500px;
        max-height: 90vh; overflow-y: auto; transform: scale(0.9) translateY(20px);
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .modal-backdrop.open .modal-request { transform: scale(1) translateY(0); }

    .req-kategori-option:checked + .req-kategori-label {
        border-color: #2b459a; background: #f0f4ff;
    }
</style>

<script>
function openRequestModal() {
    document.getElementById('requestModal').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeRequestModal() {
    const modal = document.getElementById('requestModal');
    modal.classList.remove('open');
    document.body.style.overflow = '';

    resetFormAtlet();
}

function resetFormAtlet() {
    document.getElementById('reqNama').value = '';
    document.getElementById('reqUmur').value = '';
    document.getElementById('reqDeskripsi').value = '';

    const fileInput = document.getElementById('reqFoto');
    fileInput.value = '';

    const preview = document.getElementById('img-preview');
    const placeholder = document.getElementById('placeholder');
    preview.src = '';
    preview.classList.add('hidden');
    placeholder.classList.remove('hidden');

    document.querySelectorAll('[id^="errReq"]').forEach(el => el.classList.add('hidden'));
}

document.getElementById('reqFoto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('img-preview');
    const placeholder = document.getElementById('placeholder');
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    }
});

document.getElementById('submitRequest').addEventListener('click', async function(e) {
        e.preventDefault();
        const btn = this;
        const fotoInput = document.getElementById('reqFoto');

        const nama = document.getElementById('reqNama').value.trim();
        const umur = document.getElementById('reqUmur').value.trim();
        const deskripsi = document.getElementById('reqDeskripsi').value.trim();
        const foto = fotoInput.files[0];

        document.getElementById('errReqNama').classList.toggle('hidden', !!nama);
        document.getElementById('errReqUmur').classList.toggle('hidden', !!umur);
        document.getElementById('errReqDeskripsi').classList.toggle('hidden', !!deskripsi);
        document.getElementById('errReqFoto').classList.toggle('hidden', !!foto);

        if (!nama || !umur || !deskripsi || !foto) return;

        btn.disabled = true;
        btn.innerText = 'Mengirim...';

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
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const result = await response.json();

            if (response.ok && result.success) {
                alert('Request Berhasil Dikirim!');

                document.getElementById('reqNama').value = '';
                document.getElementById('reqUmur').value = '';
                document.getElementById('reqDeskripsi').value = '';
                fotoInput.value = "";
                const preview = document.getElementById('img-preview');
                preview.src = '';
                preview.classList.add('hidden');
                document.getElementById('placeholder').classList.remove('hidden');

                closeRequestModal();
            } else {
                let errorMsg = '';
                if (result.errors) {
                    errorMsg = Object.values(result.errors).flat().join('\n');
                } else {
                    errorMsg = result.error || 'Terjadi kesalahan tidak diketahui';
                }
                alert('Gagal Mengirim:\n' + errorMsg);
            }
        } catch (error) {
            alert('Kesalahan Koneksi: Pastikan server jalan atau file tidak terlalu besar.');
            console.error(error);
        } finally {
            btn.disabled = false;
            btn.innerText = 'Kirim Request';
        }
    });
</script>
