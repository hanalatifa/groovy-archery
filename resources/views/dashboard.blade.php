<x-dashboard::admin-layout title="Dashboard">

    <div class="max-w-7xl mx-auto">
        <!-- Greeting -->
        <div class="mb-10">
            <h2 class="text-3xl font-semibold text-gray-800">
                Selamat Datang Kembali, <span class="text-purple-600">{{ auth()->user()->name }}</span>!
            </h2>
            <p class="text-gray-500 mt-1">Ini adalah dashboard admin untuk saat ini</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-gray-500 text-sm">Total Atlet</p>
                <p class="text-5xl font-bold text-gray-800 mt-3">56</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-gray-500 text-sm">Total Dokumentasi</p>
                <p class="text-5xl font-bold text-gray-800 mt-3">3</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm">
                <p class="text-gray-500 text-sm">Total Pertandingan</p>
                <p class="text-5xl font-bold text-gray-800 mt-3">6</p>
            </div>
        </div>

        <!-- Two Columns -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Permintaan Tambah Testimoni -->
            <div class="bg-white rounded-3xl p-8">
                <h3 class="font-semibold text-lg mb-6">Permintaan Tambah Testimoni</h3>
                <!-- Isi tabel testimoni nanti -->
                <p class="text-gray-400 text-center py-10">Tabel testimoni akan ditampilkan di sini</p>
            </div>

            <!-- Permintaan Tambah Atlet -->
            <div class="bg-white rounded-3xl p-8">
                <h3 class="font-semibold text-lg mb-6">Permintaan Tambah Atlet</h3>
                <!-- Isi tabel atlet nanti -->
                <p class="text-gray-400 text-center py-10">Tabel permintaan atlet akan ditampilkan di sini</p>
            </div>
        </div>
    </div>

</x-dashboard::admin-layout>