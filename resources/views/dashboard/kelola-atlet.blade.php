<x-dashboard::admin-layout title="Kelola Data Atlet">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Kelola Data Atlet</h1>

        <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
            <table class="w-full" id="atletTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left py-5 px-6 font-medium text-gray-600 w-12">No</th>
                        <th class="text-left py-5 px-6 font-medium text-gray-600">Nama</th>
                        <th class="text-left py-5 px-6 font-medium text-gray-600">Kategori</th>
                        <th class="text-center py-5 px-6 font-medium text-gray-600 w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="tableBody">
                    <!-- Data akan diisi oleh JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full mx-4 text-center">
            <div class="mx-auto w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-5xl mb-6">!</div>
            <h3 class="text-2xl font-semibold mb-2">Anda yakin?</h3>
            <p class="text-gray-500 mb-8">Data atlet ini akan dihapus secara permanen.</p>

            <div class="flex gap-3">
                <button onclick="closeDeleteModal()"
                        class="flex-1 py-4 bg-gray-200 hover:bg-gray-300 rounded-2xl font-medium transition">
                    Cancel
                </button>
                <button onclick="confirmDelete()"
                        class="flex-1 py-4 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-medium transition">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

</x-dashboard::admin-layout>

<script>
// Data dummy awal
let atletData = [
    { id: 1, nama: "Zenia Karina", kategori: "Senior" },
    { id: 2, nama: "Althaf Kharuni", kategori: "Junior" },
    { id: 3, nama: "Raisa Amanda", kategori: "Senior" },
    { id: 4, nama: "Dimas Saputra", kategori: "Junior" },
    { id: 5, nama: "Sinta Dewi", kategori: "Senior" },
];

let currentEditId = null;

// Render tabel
function renderTable() {
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = '';

    atletData.forEach((atlet, index) => {
        const row = `
            <tr class="hover:bg-gray-50" id="row-${atlet.id}">
                <td class="py-5 px-6">${index + 1}.</td>
                <td class="py-5 px-6 font-medium">${atlet.nama}</td>
                <td class="py-5 px-6 text-gray-600">${atlet.kategori}</td>
                <td class="py-5 px-6">
                    <div class="flex gap-2 justify-center">
                        <button onclick="editAtlet(${atlet.id})"
                                class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2 rounded-xl text-sm font-medium transition">
                            Edit
                        </button>
                        <button onclick="showDeleteModal(${atlet.id})"
                                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl text-sm font-medium transition">
                            Hapus
                        </button>
                    </div>
                </td>
            </tr>
        `;
        tbody.innerHTML += row;
    });
}

// === HAPUS ===
let deleteCandidateId = null;

function showDeleteModal(id) {
    deleteCandidateId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

function confirmDelete() {
    if (deleteCandidateId) {
        atletData = atletData.filter(atlet => atlet.id !== deleteCandidateId);
        renderTable();
        closeDeleteModal();
    }
}

// === EDIT ===
function editAtlet(id) {
    const atlet = atletData.find(a => a.id === id);
    if (!atlet) return;

    currentEditId = id;

    const namaBaru = prompt("Masukkan nama baru:", atlet.nama);
    if (namaBaru === null) return; // batal

    const kategoriBaru = prompt("Masukkan kategori (Junior/Senior):", atlet.kategori);
    if (kategoriBaru === null) return;

    // Update data
    atlet.nama = namaBaru.trim();
    atlet.kategori = kategoriBaru.trim();

    renderTable();
    alert("Data berhasil diperbarui!");
}

// Render pertama kali
renderTable();
</script>
