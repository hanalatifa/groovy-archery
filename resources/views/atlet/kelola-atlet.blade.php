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
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500">Belum ada data atlet.</td>
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
    </script>

</x-layouts.admin-layout>