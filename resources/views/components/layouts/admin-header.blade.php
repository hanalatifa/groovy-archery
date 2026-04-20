<header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <h1 class="text-2xl font-semibold text-gray-800">
            {{ $title ?? 'Dashboard' }}
        </h1>
    </div>

    <div class="flex items-center gap-6">
        <!-- Search -->
        <div class="relative w-80">
            <input
                type="text"
                placeholder="Search..."
                class="w-full bg-gray-100 border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:border-purple-500">
        </div>

        <!-- Profile -->
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
