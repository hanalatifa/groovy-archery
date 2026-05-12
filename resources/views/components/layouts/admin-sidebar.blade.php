<aside class="w-72 bg-white border-r border-gray-200 h-screen flex flex-col">

    <div class="px-6 pt-8 pb-6 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/Logo.jpeg') }}" class="h-12 w-12 object-contain" alt="Groovy Archery Logo">
            <div>
                <p class="text-2xl font-bold tracking-tight text-gray-900">Groovy Archery</p>
                <p class="text-sm -mt-1 text-gray-600 font-medium">Admin Panel</p>
            </div>
        </div>
    </div>

    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6B21A5&color=fff"
                 class="w-10 h-10 rounded-2xl object-cover ring-2 ring-white shadow"
                 alt="{{ auth()->user()->name }}">
            <div>
                <p class="font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                <p class="text-xs text-gray-500">{{ __('dashboard.sidebar_admin_role') }}</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-3 py-6 overflow-y-auto">
        <ul class="space-y-1">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('dashboard') ? 'bg-[#85488F] text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-house w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_dashboard') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('atlet.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('atlet.index') ? 'bg-[#85488F] text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-address-book"></i>
                    <span>{{ __('dashboard.nav_tambah_atlet') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('atlet.kelola') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('atlet.kelola') ? 'bg-[#85488F] text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-users w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_kelola_atlet') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('pertandingan.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('pertandingan.*') ? 'bg-[#85488F] text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-trophy w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_kelola_pertandingan') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('documentations.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('documentations.*') ? 'bg-[#85488F] text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-images"></i>
                    <span>{{ __('dashboard.nav_kelola_dokumentasi') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('testi.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('testi.*') ? 'bg-[#85488F] text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="fa-solid fa-star w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_kelola_testimoni') }}</span>
                </a>
            </li>

        </ul>
    </nav>

    <div class="p-6 border-t border-gray-100 mt-auto">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="flex items-center gap-3 px-5 py-3.5 text-red-600 hover:bg-red-50 rounded-2xl font-medium transition-colors">
            <i class="fa-solid fa-right-from-bracket w-5 text-center text-base"></i>
            <span>{{ __('dashboard.nav_logout') }}</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</aside>