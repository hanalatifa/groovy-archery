<header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <h1 class="text-2xl font-semibold text-gray-800">
            {{ $title ?? 'Dashboard' }}
        </h1>
    </div>

    <div class="flex items-center gap-6">
        <div class="flex items-center gap-3">
            <div class="relative w-80">
                <input
                    type="text"
                    placeholder="Search..."
                    class="w-full bg-gray-100 border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:border-purple-500">
            </div>

            <button id="theme-toggle"
                    class="p-3 bg-[#1e293b]/10 border border-gray-200/50 rounded-[20px] text-gray-500 hover:bg-[#1e293b]/20 transition-all duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 2v2"></path>
                    <path d="M12 20v2"></path>
                    <path d="M4.93 4.93l1.41 1.41"></path>
                    <path d="M17.66 17.66l1.41 1.41"></path>
                    <path d="M2 12h2"></path>
                    <path d="M20 12h2"></path>
                    <path d="M6.34 17.66l-1.41 1.41"></path>
                    <path d="M19.07 4.93l-1.41 1.41"></path>
                </svg>
            </button>
        </div>

        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/profile.jpg') }}"
                 class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm"
                 alt="Profile">
            <div>
                <p class="font-semibold text-sm text-gray-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-500 -mt-0.5">Admin</p>
            </div>
        </div>
    </div>
</header>
