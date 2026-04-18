<aside class="w-72 bg-white border-r border-gray-200 h-screen flex flex-col">

    <!-- Logo -->
    <div class="px-6 pt-8 pb-6 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/Logo.jpeg') }}"
                 class="h-10 w-10 object-contain"
                 alt="Groovy Archery Logo">
            <div>
                <p class="text-2xl font-bold tracking-tight text-gray-900">Groovy</p>
                <p class="text-xs -mt-1 text-purple-600 font-medium">Archery</p>
            </div>
        </div>
        <p class="text-[10px] text-gray-400 mt-1 pl-1">Admin Panel</p>
    </div>

    <!-- User Info -->
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/profile.jpg') }}"
                 class="w-10 h-10 rounded-2xl object-cover ring-2 ring-white shadow"
                 alt="Raisa Amanda">
            <div>
                <p class="font-semibold text-gray-800">Raisa Amanda</p>
                <p class="text-xs text-gray-500">Data Assistant</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
<nav class="flex-1 px-3 py-6 overflow-y-auto">
    <ul class="space-y-1">
        <li>
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-5 py-3.5 {{ request()->routeIs('dashboard') ? 'bg-purple-600 text-white' : 'text-gray-700 hover:bg-gray-100' }} rounded-2xl font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1v-5m10-10l2 2m-2-2v10a1 1 0 01-1 1v-5m-6 0a1 1 0 001-1v5" />
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('tambah.atlet') }}"
               class="flex items-center gap-3 px-5 py-3.5 {{ request()->routeIs('tambah.atlet') ? 'bg-purple-600 text-white' : 'text-gray-700 hover:bg-gray-100' }} rounded-2xl font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-9 0H6m3-3v3m0 0v3m0-3H6" />
                </svg>
                <span>Tambah Atlet</span>
            </a>
        </li>
        <li>
            <a href="#"
               class="flex items-center gap-3 px-5 py-3.5 text-gray-700 hover:bg-gray-100 rounded-2xl font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 01-5.356-1.857M17 20H7m5-2v2m-5-2v2m-5-2v2" />
                </svg>
                <span>Kelola Atlet</span>
            </a>
        </li>
        <li>
            <a href="#"
               class="flex items-center gap-3 px-5 py-3.5 text-gray-700 hover:bg-gray-100 rounded-2xl font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2 2 2 0 01-2-2 2 2 0 012-2 2 2 0 01-2-2 2 2 0 012-2 2 2 0 01-2-2z" />
                </svg>
                <span>Kelola Pertandingan</span>
            </a>
        </li>
        <li>
            <a href="#"
               class="flex items-center gap-3 px-5 py-3.5 text-gray-700 hover:bg-gray-100 rounded-2xl font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2" />
                </svg>
                <span>Kelola Dokumentasi</span>
            </a>
        </li>
        <li>
            <a href="#"
               class="flex items-center gap-3 px-5 py-3.5 text-gray-700 hover:bg-gray-100 rounded-2xl font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.975 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L8.16 9.41c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                <span>Kelola Testimoni</span>
            </a>
        </li>
    </ul>
</nav>

    <!-- Logout -->
    <div class="p-6 border-t border-gray-100 mt-auto">
        <a href="#" class="flex items-center gap-3 px-5 py-3.5 text-red-600 hover:bg-red-50 rounded-2xl font-medium transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4V7m-4 4V7" />
            </svg>
            <span>Logout</span>
        </a>
    </div>

</aside>
