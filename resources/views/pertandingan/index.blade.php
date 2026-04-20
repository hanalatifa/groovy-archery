<x-layouts.admin-layout title="Kelola Pertandingan">

    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Kelola Pertandingan</h2>
            <a href="{{ route('pertandingan.create') }}"
               class="bg-purple-700 hover:bg-purple-800 text-white px-5 py-2.5 rounded-lg font-semibold text-sm transition">
                + Tambah Pertandingan
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="p-4 text-sm font-semibold text-gray-600">Waktu</th>
                        <th class="p-4 text-sm font-semibold text-gray-600">Foto</th>
                        <th class="p-4 text-sm font-semibold text-gray-600">Nama Pertandingan</th>
                        <th class="p-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pertandingan as $p)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-sm text-gray-500">
                                {{ $p->created_at->format('H.i A, d M Y') }}
                            </td>
                            <td class="p-4">
                                @if($p->dokumentasi && count($p->dokumentasi) > 0)
                                    <img src="{{ asset('storage/' . $p->dokumentasi[0]) }}"
                                         class="w-12 h-12 rounded-md object-cover border border-gray-200">
                                @else
                                    <span class="text-gray-400 text-xs">No photo</span>
                                @endif
                            </td>
                            <td class="p-4 text-sm font-medium text-gray-800">{{ $p->nama_pertandingan ?? 'N/A' }}</td>
                            <td class="p-4 text-center">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('pertandingan.edit', $p->id) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-xl text-xs font-semibold transition">
                                        Edit
                                    </a>
                                    <button type="button" onclick="showDeleteModal({{ $p->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-12 text-center text-gray-500">Belum ada data pertandingan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl shadow-xl max-w-sm w-full mx-4 overflow-hidden">
            <div class="p-8 text-center">
                <div class="mx-auto w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.595 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.595-1.858L5 7m5-4v6m4-6v6m1-10V9a1 1 0 00-1 1v1M12 4v6m2-3v6" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">Anda yakin?</h3>
                <p class="text-gray-500 mb-8">Data pertandingan ini akan dihapus permanen beserta fotonya.</p>

                <div class="flex gap-3">
                    <button onclick="hideDeleteModal()"
                            class="flex-1 py-3.5 text-sm font-semibold text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-2xl transition">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full py-3.5 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-2xl transition">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal(id) {
            const form = document.getElementById('deleteForm');
            form.action = `/hapus/pertandingan/${id}`;

            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) hideDeleteModal();
        });
    </script>

</x-layouts.admin-layout>
