<x-layouts.admin-layout title="Kelola Data Atlet">

<div class="max-w-7xl mx-auto p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Kelola Data Atlet
        </h1>

        <a href="{{ route('atlet.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">
            + Tambah Atlet
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 text-green-700 p-4 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Kategori</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($atlets as $index => $atlet)
                    <tr class="border-b">
                        <td class="p-4">
                            {{ $index + 1 }}
                        </td>

                        <td class="p-4">
                            {{ $atlet->nama }}
                        </td>

                        <td class="p-4">
                            {{ $atlet->kategori }}
                        </td>

                        <td class="p-4 text-center">
                            <a href="{{ route('atlet.edit', $atlet->id) }}"
                               class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                                Edit
                            </a>

                            <button
                                onclick="openDeleteModal({{ $atlet->id }})"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-6 text-gray-500">
                            Belum ada data atlet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

{{-- Modal --}}
<div id="deleteModal"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white p-6 rounded-2xl w-full max-w-sm">
        <h2 class="text-xl font-bold mb-4">
            Hapus Atlet?
        </h2>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex gap-3">
                <button type="button"
                        onclick="closeDeleteModal()"
                        class="flex-1 bg-gray-200 py-3 rounded-xl">
                    Batal
                </button>

                <button type="submit"
                        class="flex-1 bg-red-500 text-white py-3 rounded-xl">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openDeleteModal(id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');

        form.action = `/hapus/atlet/${id}`;

        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal')
            .classList.add('hidden');
    }
</script>

</x-layouts.admin-layout>
