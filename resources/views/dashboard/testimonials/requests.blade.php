<x-layouts.admin-layout title="Permintaan Testimoni">
    <div class="max-w-7xl mx-auto">
        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('testi.index') }}" class="p-2 bg-white rounded-full shadow-sm hover:bg-gray-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Permintaan Baru</h2>
                <p class="text-gray-500 text-sm">Testimoni yang perlu persetujuan admin.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-sm">
            <table class="w-full text-left">
                <tbody class="divide-y">
                    @forelse($pendingTestis as $t)
                    <tr>
                        <td class="py-5 text-gray-400 text-xs">
                            {{ $t->created_at->format('H.i A, d F Y') }}
                        </td>
                        <td class="py-5 font-medium text-gray-800">{{ $t->nama }}</td>
                        <td class="py-5 text-amber-500">★ {{ $t->rating }}</td>
                        <td class="py-5 text-gray-500 text-sm">{{ $t->deskripsi }}</td>
                        <td class="py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('testi.approve', $t->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-xs font-bold hover:bg-green-700 transition">Terima</button>
                                </form>
                                <form action="{{ route('testi.reject', $t->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-white border border-red-200 text-red-600 rounded-lg text-xs font-bold hover:bg-red-50 transition">Tolak</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-20 text-gray-400 italic">Antrean kosong. Semua sudah diproses!</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin-layout>
