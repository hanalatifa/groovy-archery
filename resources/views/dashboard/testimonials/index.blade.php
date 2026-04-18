<x-dashboard::admin-layout title="Kelola Testimoni">
    <div class="max-w-7xl mx-auto">
        <div class="mb-10">
            <h2 class="text-3xl font-semibold text-gray-800">Permintaan Testimoni</h2>
            <p class="text-gray-500 mt-1">Setujui atau tolak testimoni dari member sebelum tampil di landing page.</p>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-sm">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-sm uppercase tracking-wider border-b">
                        <th class="pb-4">Nama</th>
                        <th class="pb-4">Rating</th>
                        <th class="pb-4">Pesan</th>
                        <th class="pb-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($pendingTestis as $t)
                    <tr>
                        <td class="py-5 font-medium text-gray-800">{{ $t->nama }}</td>
                        <td class="py-5 text-amber-500">★ {{ $t->rating }}</td>
                        <td class="py-5 text-gray-500 text-sm">{{ Str::limit($t->deskripsi, 50) }}</td>
                        <td class="py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('testi.approve', $t->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-50 text-green-600 rounded-lg text-sm font-bold hover:bg-green-100">
                                        Terima
                                    </button>
                                </form>
                                <form action="{{ route('testi.reject', $t->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-bold hover:bg-red-100">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-400 italic">
                            Belum ada permintaan testimoni baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard::admin-layout>