<x-layouts.admin-layout title="Kelola Dokumentasi">

    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Kelola Dokumentasi</h2>
            <a href="{{ url('/documentations/create') }}"
                class="bg-purple-700 hover:bg-purple-800 text-white px-5 py-2 rounded-lg font-semibold text-sm transition">
                + Tambah Dokumentasi
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
                        <th class="p-4 text-sm font-semibold text-gray-600">Judul</th>
                        <th class="p-4 text-sm font-semibold text-gray-600">Deskripsi</th>
                        <th class="p-4 text-sm font-semibold text-gray-600">Foto</th>
                        <th class="p-4 text-sm font-semibold text-gray-600">Waktu</th>
                        <th class="p-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($docs as $doc)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-sm text-gray-800 font-medium">{{ $doc->judul }}</td>
                            <td class="p-4 text-sm text-gray-600">{{ Str::limit($doc->deskripsi, 50) }}</td>
                            <td class="p-4">
                                <div class="flex gap-1 flex-wrap">
                                    @php
                                        $images = json_decode($doc->foto);
                                    @endphp
                                    @if ($images)
                                        @foreach ($images as $img)
                                            <img src="{{ asset('storage/docs/' . $img) }}"
                                                class="w-10 h-10 rounded-md object-cover border border-gray-200">
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td class="p-4 text-sm text-gray-500">
                                {{ $doc->created_at->format('d M Y') }}<br>
                                <span class="text-xs text-gray-400">{{ $doc->created_at->format('H:i') }} WIB</span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ url('/documentations/' . $doc->id . '/edit') }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-xl text-xs font-semibold transition">
                                        Edit
                                    </a>

                                    <button type="button"
                                            onclick="showDeleteModal({{ $doc->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl shadow-xl max-w-sm w-full mx-4 overflow-hidden">
            <div class="p-8 text-center">
                <div class="mx-auto w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.595 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.595-1.858L5 7m5-4v6m4-6v6m1-10V9a1 1 0 00-1 1v1M12 4v6m2-3v6" />
                    </svg>
                </div>

                <h3 class="text-2xl font-semibold text-gray-900 mb-2">Anda yakin?</h3>
                <p class="text-gray-500 mb-8">Data dokumentasi ini akan dihapus permanen dan tidak dapat dikembalikan.</p>

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
            form.action = `/documentations/${id}`;

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
