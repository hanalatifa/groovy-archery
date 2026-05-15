<aside class="w-72 bg-white border-r border-gray-100 h-screen flex flex-col">

    <div class="px-6 pt-7 pb-5 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/Logo.jpeg') }}"
                 class="h-10 w-10 object-contain rounded-xl" alt="Groovy Archery">
            <div class="leading-tight">
                <p class="text-lg font-bold text-gray-900 tracking-tight">Groovy Archery</p>
                <p class="text-[11px] text-gray-400 font-medium">{{ __('dashboard.sidebar_admin_panel') }}</p>
            </div>
        </div>
    </div>

    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-3">
            @if(file_exists(public_path('assets/profile.jpg')))
                <img src="{{ asset('assets/profile.jpg') }}"
                     class="w-11 h-11 rounded-full object-cover ring-2 ring-gray-100 shadow-sm"
                     alt="Profile">
            @else
                <div class="w-11 h-11 rounded-full flex items-center justify-center
                            text-white text-sm font-bold shadow-sm"
                     style="background: #85488F;">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
            @endif
            <div class="leading-tight min-w-0">
                <p class="text-sm font-bold text-gray-800 truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-gray-400 font-medium">{{ __('dashboard.sidebar_admin_role') }}</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-4 py-5 overflow-y-auto space-y-0.5">

        @php $active = request()->routeIs('dashboard'); @endphp
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-150
                  {{ $active ? 'text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
           style="{{ $active ? 'background: linear-gradient(135deg, #85488F, #7c3aed);' : '' }}">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
    <path d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336L112 512C112 547.3 140.7 576 176 576L464 576C499.3 576 528 547.3 528 512L528 336L544 336C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384L336 384C362.5 384 384 405.5 384 432L384 528L256 528L256 432C256 405.5 277.5 384 304 384z"/></svg>
            Dashboard
        </a>

        @php $active = request()->routeIs('atlet.edit', 'atlet.kelola'); @endphp
        <a href="{{ route('atlet.index') }}"
           class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-150
                  {{ $active ? 'text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}"
           style="{{ $active ? 'background: linear-gradient(135deg, #85488F, #7c3aed);' : '' }}">
            <svg class="w-5 h-5 shrink-0 {{ $active ? '' : 'text-gray-400' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            {{ __('dashboard.nav_kelola_atlet') }}
        </a>

        @php $active = request()->routeIs('pertandingan.*'); @endphp
        <a href="{{ route('pertandingan.index') }}"
           class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-150
                  {{ $active ? 'text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}"
           style="{{ $active ? 'background: linear-gradient(135deg, #85488F, #7c3aed);' : '' }}">
            <svg class="w-5 h-5 shrink-0 {{ $active ? '' : 'text-gray-400' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
            </svg>
            {{ __('dashboard.nav_kelola_pertandingan') }}
        </a>

        @php $active = request()->routeIs('documentations.*'); @endphp
        <a href="{{ route('documentations.index') }}"
           class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-150
                  {{ $active ? 'text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}"
           style="{{ $active ? 'background:  #85488F, #7c3aed);' : '' }}">
            <svg class="w-5 h-5 shrink-0 {{ $active ? '' : 'text-gray-400' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            {{ __('dashboard.nav_kelola_dokumentasi') }}
        </a>

        @php $active = request()->routeIs('testi.*'); @endphp
        <a href="{{ route('testi.index') }}"
           class="flex items-center gap-3.5 px-4 py-3.5 rounded-2xl text-sm font-medium transition-all duration-150
                  {{ $active ? 'text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}"
           style="{{ $active ? 'background: linear-gradient(135deg, #85488F, #7c3aed);' : '' }}">
            <svg class="w-5 h-5 shrink-0 {{ $active ? '' : 'text-gray-400' }}"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
            </svg>
            {{ __('dashboard.nav_kelola_testimoni') }}
        </a>

    </nav>

    <div class="px-4 py-5 border-t border-gray-100">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="flex items-center gap-3.5 px-4 py-3 rounded-2xl text-sm font-medium
                  text-red-500 hover:bg-red-50 hover:text-red-600 transition-all duration-150">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            {{ __('dashboard.nav_logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</aside>
