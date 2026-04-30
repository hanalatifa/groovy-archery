<header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
    <!-- <div class="flex items-center gap-4">
        <h1 class="text-2xl font-semibold text-gray-800">
            {{ $title ?? 'Dashboard' }}
        </h1>
    </div> -->

    <div class="flex items-center gap-6">
        <!-- Search -->
        <div class="sticky top-0 z-10 bg-gray-50 border-b border-gray-100 px-8 py-3 -mx-8 -mt-8 mb-8">
    <div class="relative max-w-sm">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
        </svg>
        <input type="text" placeholder="Search"
               class="w-full pl-9 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl
                      text-sm text-gray-700 placeholder-gray-400 outline-none
                      focus:ring-2 focus:ring-[#274494]/20 focus:border-[#274494]/40
                      transition-all duration-200">
    </div>
</div>


        <!-- Profile -->
        <!-- <div class="flex items-center gap-3">
            <img src="{{ asset('assets/profile.jpg') }}"
                 class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm"
                 alt="Profile">
            <div>
                <p class="font-semibold text-sm text-gray-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-500 -mt-0.5">Admin</p>
            </div>
        </div>
    </div> -->
</header>
