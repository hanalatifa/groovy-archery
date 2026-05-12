<x-layouts.admin-layout title="Kelola Data Atlet">
    <div class="max-w-7xl mx-auto space-y-10">

    <div class="max-w-6xl mx-auto p-6">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Kelola Data Atlet</h1>
            <a href="{{ route('atlet.create') }}"
               class="bg-purple-700 hover:bg-purple-800 text-white px-6 py-3 rounded-2xl font-medium flex items-center gap-2 transition">
                <span class="text-xl">+</span> Tambah Atlet Baru
            </a>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-3xl shadow-sm border border-gray-50">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Atlet Aktif</h2>
                <p class="text-gray-500 mt-1">Daftar atlet yang sudah disetujui dan tampil di website.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('atlet.requests') }}" class="relative inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-2xl text-sm font-bold hover:bg-gray-200 transition">
                    Permintaan Atlet
                    @if($pendingCount > 0)
                        <span class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-[10px] text-white ring-4 ring-white shadow-lg">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('atlet.create') }}" class="px-6 py-3 bg-[#2b459a] text-white rounded-2xl text-sm font-bold hover:bg-[#1e3278] transition shadow-lg shadow-blue-900/20">
                    + Tambah Atlet Baru
                </a>
            </div>
        </div>

        {{-- Alert Success --}}
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
            <div class="p-4 bg-emerald-50 text-emerald-700 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-wider border-b border-gray-100">
                            <th class="pb-5 font-bold">Foto & Nama</th>
                            <th class="pb-5 font-bold">Kategori</th>
                            <th class="pb-5 font-bold">Umur</th>
                            <th class="pb-5 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($atlets as $atlet)
                        <tr class="group hover:bg-gray-50/50 transition">
                            <td class="py-5">
                                <div class="flex items-center gap-4">
                                    @if($atlet->foto)
                                        <img src="{{ asset('storage/atlet/' . $atlet->foto) }}"
                                             class="w-14 h-14 object-cover rounded-2xl shadow-sm border-2 border-white ring-1 ring-gray-100">
                                    @else
                                        <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-400 text-[10px] border border-dashed border-gray-300 uppercase">
                                            No Pic
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $atlet->nama }}</div>
                                        <div class="text-[11px] text-gray-400 italic">Terdaftar {{ $atlet->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </td>

                            {{-- Kolom Kategori (Fixed Warna & Alignment) --}}
                            <td class="py-5">
                                @if($atlet->kategori == 'Junior')
                                    <span class="bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-tight">
                                        {{ $atlet->kategori }}
                                    </span>
                                @else
                                    <span class="bg-purple-50 text-purple-600 px-4 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-tight">
                                        {{ $atlet->kategori }}
                                    </span>
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

                            {{-- Kolom Umur (Fixed Alignment) --}}
                            <td class="py-5">
                                <span class="text-gray-600 text-[13px] font-semibold">
                                    {{ $atlet->umur }} Tahun
                                </span>
                            </td>

                            <td class="py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('atlet.edit', $atlet->id) }}"
                                       class="px-4 py-2 border border-gray-200 text-gray-600 rounded-xl text-xs font-bold hover:bg-white hover:shadow-sm transition">
                                        Edit
                                    </a>
                                    <button type="button" onclick="showDeleteModal({{ $atlet->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-xs font-semibold transition">
                                    <button type="button"
                                            onclick="openDeleteModal({{ $atlet->id }})"
                                            class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-500 hover:text-white transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500">Belum ada data atlet.</td>
                            <td colspan="4" class="p-12 text-center text-gray-500 italic">Belum ada data atlet.</td>
                            <td colspan="4" class="text-center py-24">
                                <p class="text-gray-400 italic text-sm font-medium">Belum ada data atlet yang terdaftar.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
    {{-- Modal Delete tetap sama --}}
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-sm w-full overflow-hidden border border-gray-100">
            <div class="p-8 text-center">
                <div class="mx-auto w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center text-4xl mb-6 ring-8 ring-red-50/50">!</div>
                <h3 class="text-2xl font-black text-gray-900 mb-2">Hapus Atlet?</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-8 px-4">Data ini akan dihapus secara permanen dan tidak dapat dipulihkan kembali.</p>
                <div class="flex gap-3">
                    <button onclick="closeDeleteModal()" class="flex-1 py-4 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-2xl transition">Batal</button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-2xl transition shadow-lg shadow-red-200">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = "{{ url('/hapus/atlet') }}/" + id;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
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
            document.body.style.overflow = '';
        }

        // Tutup modal jika klik di luar area modal
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) hideDeleteModal();
        });
    </script>
</x-layouts.admin-layout>
