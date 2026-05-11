<x-layouts.admin-layout title="Kelola Data Atlet">

    <div class="max-w-6xl mx-auto p-6">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Kelola Data Atlet</h1>
            <a href="{{ route('atlet.create') }}"
               class="bg-purple-700 hover:bg-purple-800 text-white px-6 py-3 rounded-2xl font-medium flex items-center gap-2 transition">
                <span class="text-xl">+</span> Tambah Atlet Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-100 text-emerald-700 rounded-2xl">
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Kelola Data Atlet</h2>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-sm overflow-hidden">
            <table class="w-full" id="atletTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left py-5 px-6 font-medium text-gray-600 w-12">No</th>
                        <th class="text-left py-5 px-6 font-medium text-gray-600">Foto</th>
                        <th class="text-left py-5 px-6 font-medium text-gray-600">Nama</th>
                        <th class="text-left py-5 px-6 font-medium text-gray-600">Kategori</th>
                        <th class="text-center py-5 px-6 font-medium text-gray-600 w-40">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="tableBody">
                    @forelse($atlets as $index => $atlet)
                        <tr class="hover:bg-gray-50">
                            <td class="py-5 px-6">{{ $index + 1 }}.</td>
                            <td class="py-5 px-6">
                                @if($atlet->foto)
                                    <img src="{{ asset('storage/atlet/' . $atlet->foto) }}" 
                                         alt="Foto {{ $atlet->nama }}" 
                                         class="w-12 h-12 object-cover rounded-xl shadow-sm">
                                @else
                                    <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-xs text-center p-1">
                                        No Pic
                                    </div>
                                @endif
                            </td>
                            <td class="py-5 px-6 font-medium text-gray-800">{{ $atlet->nama }}</td>
                            <td class="py-5 px-6 text-gray-600">{{ $atlet->kategori }}</td>
                            <td class="py-5 px-6 text-center">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('atlet.edit', $atlet->id) }}"
                                       class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2 rounded-xl text-sm font-medium transition">
                                        Edit
                                    </a>
                                    
                                    {{-- Form Hapus --}}
                                    <button type="button" 
                                            onclick="openDeleteModal({{ $atlet->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl text-sm font-medium transition">
        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="p-4 text-sm font-semibold text-gray-600 w-16">No</th>
                        <th class="p-4 text-sm font-semibold text-gray-600">Nama Atlet</th>
                        <th class="p-4 text-sm font-semibold text-gray-600">Kategori</th>
                        <th class="p-4 text-sm font-semibold text-gray-600 text-center w-48">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($atlets as $index => $atlet)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 text-sm text-gray-500">
                                {{ $index + 1 }}.
                            </td>
                            <td class="p-4 text-sm font-medium text-gray-800">
                                {{ $atlet->nama }}
                            </td>
                            <td class="p-4 text-sm text-gray-600">
                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $atlet->kategori }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('atlet.edit', $atlet->id) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-xl text-xs font-semibold transition">
                                        Edit
                                    </a>
                                    <button type="button" onclick="showDeleteModal({{ $atlet->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500">Belum ada data atlet.</td>
                            <td colspan="4" class="p-12 text-center text-gray-500 italic">Belum ada data atlet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full mx-4 text-center">
            <div class="mx-auto w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-5xl mb-6">!</div>
            <h3 class="text-2xl font-semibold mb-2">Anda yakin?</h3>
            <p class="text-gray-500 mb-8">Data atlet ini akan dihapus secara permanen.</p>

            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()"
                            class="flex-1 py-4 bg-gray-200 hover:bg-gray-300 rounded-2xl font-medium transition">
                        Cancel
                    </button>
                    <button type="submit"
                            class="flex-1 py-4 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-medium transition">
                        Ya, Hapus
                    </button>
                </div>
            </form>
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-3xl shadow-xl max-w-sm w-full mx-4 overflow-hidden">
            <div class="p-8 text-center">
                <div class="mx-auto w-20 h-20 bg-red-100 rounded-2xl flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.595 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.595-1.858L5 7m5-4v6m4-6v6m1-10V9a1 1 0 00-1 1v1M12 4v6m2-3v6" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">Hapus Atlet?</h3>
                <p class="text-gray-500 mb-8">Data atlet ini akan dihapus permanen dari sistem.</p>

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
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            
            // Set action form secara dinamis ke route destroy
            form.action = `/atlet/${id}`; 
            
            modal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
        function showDeleteModal(id) {
            const form = document.getElementById('deleteForm');
            form.action = `/hapus/atlet/${id}`; 

            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Tutup modal jika klik di luar area modal
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) hideDeleteModal();
        });
    </script>

</x-layouts.admin-layout>