<x-layouts.admin-layout title="Kelola Data Atlet">

    <div class="max-w-7xl mx-auto space-y-10">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-8 shadow-sm">

            <div>
                <h2 class="text-3xl font-semibold text-gray-800">
                    {{ __('dashboard.atlet_manage_heading') }}
                </h2>

                <p class="text-gray-500 mt-1">
                    {{ __('dashboard.atlet_manage_subtitle') }}
                </p>
            </div>

            <div class="flex gap-3">

                <a href="{{ route('atlet.requests') }}"
                   class="relative inline-flex items-center px-5 py-2.5 bg-gray-200 text-gray-700 text-sm font-bold hover:bg-gray-300 transition">
                    {{ __('dashboard.atlet_permintaan_btn') }}
                    @if($pendingCount > 0)
                        <span class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-[10px] text-white">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('atlet.create') }}"
                   class="px-6 py-3 bg-[#85488F] text-white text-medium hover:bg-[#7F4689] transition">
                    {{ __('dashboard.atlet_tambah_data') }}
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 bg-emerald-50 text-emerald-500 rounded-2xl border border-emerald-100 shadow-sm flex items-center gap-3">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>

                <span class="font-medium">
                    {{ session('success') }}
                </span>

            </div>
        @endif

        <div class="bg-white shadow-sm border border-gray-100 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b border-gray-100">

                        <tr>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                {{ __('dashboard.atlet_nama_foto') }}
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                {{ __('dashboard.atlet_kategori') }}
                            </th>

                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                {{ __('dashboard.atlet_col_umur') }}
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600">
                                {{ __('dashboard.atlet_deskripsi') }}
                            </th>
                            <th class="px-6 py-4 text-sm font-semibold text-gray-600 text-right">
                                {{ __('dashboard.col_aksi') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($atlets as $index => $atlet)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-5">

                                    <div class="flex items-center gap-4">

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

                                        <div>

                                            <div class="font-bold text-gray-900">
                                                {{ $atlet->nama }}
                                            </div>

                                            <div class="text-[11px] text-gray-400 italic">
                                                {{ __('dashboard.atlet_terdaftar') }} {{ $atlet->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    @if($atlet->kategori == 'Junior')
                                        <span class="border bg-indigo-50 text-indigo-500 px-4 py-1.5 rounded-full text-[12px] font-semibold tracking-tight">
                                            {{ $atlet->kategori }}
                                        </span>
                                    @else
                                        <span class="border bg-purple-50 text-purple-500 px-4 py-1.5 rounded-full text-[12px] font-semibold tracking-tight">
                                            {{ $atlet->kategori }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-5">
                                    <span class="text-gray-600 text-[13px] font-semibold">
                                        {{ $atlet->umur }}  {{ __('dashboard.atlet_tahun') }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="text-gray-500 text-sm leading-relaxed max-w-xs line-clamp-2">
                                        {{ $atlet->deskripsi }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('atlet.edit', $atlet->id) }}"
                                           class="px-4 py-2 border bg-yellow-100 text-yellow-500 text-xs font-bold hover:bg-yellow-200 transition">
                                           {{ __('dashboard.btn_edit') }}
                                        </a>
                                        <button
                                            type="button"
                                            onclick="openDeleteModal({{ $atlet->id }})"
                                            class="px-4 py-2 border bg-red-200 text-red-500 text-xs font-bold hover:bg-red-300 transition">
                                            {{ __('dashboard.btn_hapus') }}
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-24">
                                    <p class="text-gray-400 italic text-sm font-medium">
                                        {{ __('dashboard.atlet_empty') }}
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm items-center justify-center z-50 p-4">
        <div class="bg-white rounded-[2rem] shadow-2xl max-w-sm w-full overflow-hidden border border-gray-100">
            <div class="p-8 text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-red-100 text-red-500 flex items-center justify-center text-4xl mb-5">!</div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ __('dashboard.atlet_delete_title') }}</h2>
                <p class="text-gray-500 mb-8">{{ __('dashboard.atlet_delete_message') }}</p>
                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 rounded-2xl font-semibold transition">{{ __('dashboard.documentation_cancel') }}</button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-2xl font-semibold transition">{{ __('dashboard.documentation_confirm') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById('deleteModal');
            const form  = document.getElementById('deleteForm');

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
            if (e.target === this) closeDeleteModal();
        });
    </script>

</x-layouts.admin-layout>