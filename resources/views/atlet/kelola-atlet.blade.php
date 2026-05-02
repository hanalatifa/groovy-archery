<x-layouts.admin-layout title="Kelola Data Atlet">

    <div class="max-w-6xl mx-auto p-6">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Kelola Data Atlet</h1>

            <a href="{{ route('atlet.create') }}"
                class="bg-purple-700 hover:bg-purple-800 text-white px-6 py-3 rounded-2xl font-medium flex items-center gap-2">
                + Tambah Atlet Baru
            </a>
        </div>

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
                    <!-- Data diisi oleh JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full mx-4 text-center">
            <div
                class="mx-auto w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-5xl mb-6">
                !</div>
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

</x-layouts.admin-layout>

<script>
    // Base URL untuk Edit (ini yang paling aman)
    const editUrl = "{{ route('atlet.edit', ':id') }}";

    let atletData = [{
            id: 1,
            nama: "Zenia Karina",
            kategori: "Senior"
        },
        {
            id: 2,
            nama: "Althaf Kharuni",
            kategori: "Junior"
        },
        {
            id: 3,
            nama: "Raisa Amanda",
            kategori: "Senior"
        },
        {
            id: 4,
            nama: "Dimas Saputra",
            kategori: "Junior"
        },
        {
            id: 5,
            nama: "Sinta Dewi",
            kategori: "Senior"
        },
    ];

    let deleteCandidateId = null;

    // Render Tabel
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
                        <a href="${editUrl.replace(':id', atlet.id)}"
                           class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2 rounded-xl text-sm font-medium transition inline-block">
                            Edit
                        </a>
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

    // === DELETE ===
    function showDeleteModal(id) {
        deleteCandidateId = id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        deleteCandidateId = null;
    }

    function confirmDelete() {
        if (deleteCandidateId !== null) {
            atletData = atletData.filter(atlet => atlet.id !== deleteCandidateId);
            renderTable();
            closeDeleteModal();
        }
    }

    // Render pertama kali
    renderTable();
</script>
