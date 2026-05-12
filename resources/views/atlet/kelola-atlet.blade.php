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
    <div class="max-w-7xl mx-auto p-6 space-y-6">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Kelola Data Atlet
                </h1>
                <p class="text-gray-500 mt-1">
                    Daftar atlet yang sudah terdaftar di website.
                </p>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('atlet.requests') }}"
                   class="relative inline-flex items-center px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl font-semibold transition">

                    Permintaan Atlet

                    @if($pendingCount > 0)
                        <span class="absolute -top-2 -right-2 flex items-center justify-center w-6 h-6 rounded-full bg-red-500 text-white text-[10px]">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('atlet.create') }}"
                   class="px-5 py-3 bg-[#85488F] hover:bg-purple-700 text-white font-semibold transition">
                    + Tambah Atlet
                </a>
            </div>
        </div>

        {{-- Alert Success --}}
        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-100 text-emerald-700 border border-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                No
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Foto
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Nama Atlet
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Kategori
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                Umur
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($atlets as $index => $atlet)

                            <tr class="hover:bg-gray-50 transition">

                                {{-- No --}}
                                <td class="px-6 py-4 text-gray-500">
                                    {{ $index + 1 }}
                                </td>

                                {{-- Foto --}}
                                <td class="px-6 py-4">

                                    @if($atlet->foto)
                                        <img
                                            src="{{ asset('storage/atlet/' . $atlet->foto) }}"
                                            alt="{{ $atlet->nama }}"
                                            class="w-14 h-14 object-cover rounded-2xl"
                                        >
                                    @else
                                        <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-xs">
                                            No Pic
                                        </div>
                                    @endif

                                </td>

                                {{-- Nama --}}
                                <td class="px-6 py-4">

                                    <div class="font-semibold text-gray-800">
                                        {{ $atlet->nama }}
                                    </div>

                                    <div class="text-xs text-gray-400">
                                        Terdaftar {{ $atlet->created_at->diffForHumans() }}
                                    </div>

                                </td>

                                {{-- Kategori --}}
                                <td class="px-6 py-4">

                                    @if($atlet->kategori == 'Junior')

                                        <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-600 text-xs font-semibold">
                                            {{ $atlet->kategori }}
                                        </span>

                                    @else

                                        <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-600 text-xs font-semibold">
                                            {{ $atlet->kategori }}
                                        </span>

                                    @endif

                                </td>

                                {{-- Umur --}}
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $atlet->umur }} Tahun
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('atlet.edit', $atlet->id) }}"
                                           class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-sm font-medium transition">
                                            Edit
                                        </a>

                                        <button
                                            type="button"
                                            onclick="openDeleteModal({{ $atlet->id }})"
                                            class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl text-sm font-medium transition">

                                            Hapus
                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center text-gray-400 italic">
                                    Belum ada data atlet.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

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
    {{-- Delete Modal --}}
    <div
        id="deleteModal"
        class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 items-center justify-center p-4">

        <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden">

            <div class="p-8 text-center">

                <div class="w-20 h-20 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center text-4xl mb-5">
                    !
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Hapus Atlet?
                </h2>

                <p class="text-gray-500 mb-8">
                    Data atlet akan dihapus secara permanen.
                </p>

                <div class="flex gap-3">

                    <button
                        type="button"
                        onclick="closeDeleteModal()"
                        class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 rounded-2xl font-semibold transition">

                        Batal
                    </button>

                    <form id="deleteForm" method="POST" class="flex-1">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold transition">

                            Ya, Hapus
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    {{-- Script --}}
    <script>

        function openDeleteModal(id) {

            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');

            form.action = `/hapus/atlet/${id}`;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {

            const modal = document.getElementById('deleteModal');

            modal.classList.remove('flex');
            modal.classList.add('hidden');

            document.body.style.overflow = '';
        }

        document.getElementById('deleteModal').addEventListener('click', function(e) {

            if (e.target === this) {
                closeDeleteModal();
            }

        });

    </script>

</x-layouts.admin-layout>
