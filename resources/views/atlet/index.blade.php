<x-layouts.admin-layout title="{{ __('dashboard.nav_tambah_atlet') }}">

    <div class="p-6">

        {{-- ── Header ── --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-semibold text-gray-800">
                    {{ __('dashboard.nav_tambah_atlet') }}
                </h1>
                <p class="text-gray-500 mt-1">
                    {{ __('dashboard.atlet_aktivitas_sub') }}
                </p>
            </div>

            <a href="{{ route('atlet.create') }}"
               class="bg-purple-700 hover:bg-purple-800 text-white px-6 py-3 rounded-2xl font-medium flex items-center gap-2 transition">
                <span class="text-xl">+</span> {{ __('dashboard.btn_tambah_atlet_baru') }}
            </a>
        </div>

        {{-- ── Tabel Aktivitas ── --}}
        <div class="bg-white rounded-3xl shadow-sm p-8">
            <h2 class="text-xl font-semibold mb-6">{{ __('dashboard.atlet_aktivitas') }}</h2>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-5 px-6 font-medium text-gray-600">
                                {{ __('dashboard.atlet_tgl') }}
                            </th>
                            <th class="text-left py-5 px-6 font-medium text-gray-600">
                                {{ __('dashboard.atlet_nama_col') }}
                            </th>
                            <th class="text-left py-5 px-6 font-medium text-gray-600">
                                {{ __('dashboard.atlet_kategori_col') }}
                            </th>
                            <th class="text-left py-5 px-6 font-medium text-gray-600">
                                {{ __('dashboard.col_status') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($atlets as $atlet)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-5 px-6 text-gray-600">
                                {{ $atlet->created_at->format('H.i A, d M Y') }}
                            </td>
                            <td class="py-5 px-6 font-medium text-gray-800">
                                {{ $atlet->nama }}
                            </td>
                            <td class="py-5 px-6 text-gray-600">
                                {{ $atlet->kategori ?? 'Junior' }}
                            </td>
                            <td class="py-5 px-6">
                                <span class="inline-flex items-center px-5 py-1.5 bg-emerald-100 text-emerald-700 rounded-2xl text-xs font-medium">
                                    {{ __('dashboard.status_approved') }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-gray-500">
                                {{ __('dashboard.atlet_empty') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Lihat Semua --}}
            <div class="text-center mt-12">
                <a href="#"
                   class="bg-purple-600 text-white px-8 py-3 rounded-2xl font-medium hover:bg-purple-700 transition inline-block">
                    {{ __('dashboard.btn_lihat_semua_aktivitas') }}
                </a>
            </div>
        </div>
    </div>

</x-layouts.admin-layout>
