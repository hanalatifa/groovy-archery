<style>
/* ── Sidebar Dark Mode Variables ── */
:root {
    --sidebar-bg:           #ffffff;
    --sidebar-border:       #e5e7eb;
    --sidebar-divider:      #f3f4f6;
    --sidebar-logo-title:   #111827;
    --sidebar-logo-sub:     #4b5563;
    --sidebar-user-name:    #1f2937;
    --sidebar-user-role:    #6b7280;
    --sidebar-nav-text:     #374151;
    --sidebar-nav-hover-bg: #f3f4f6;
    --sidebar-logout-hover: #fef2f2;
}
[data-theme="dark"] {
    --sidebar-bg:           #0f172a;
    --sidebar-border:       rgba(255,255,255,0.08);
    --sidebar-divider:      rgba(255,255,255,0.06);
    --sidebar-logo-title:   #f1f5f9;
    --sidebar-logo-sub:     #94a3b8;
    --sidebar-user-name:    #e2e8f0;
    --sidebar-user-role:    #64748b;
    --sidebar-nav-text:     #cbd5e1;
    --sidebar-nav-hover-bg: rgba(255,255,255,0.06);
    --sidebar-logout-hover: rgba(239,68,68,0.1);
}

#admin-sidebar {
    background: var(--sidebar-bg);
    border-right-color: var(--sidebar-border);
    transition: background 0.3s ease, border-color 0.3s ease;
}
#admin-sidebar .sidebar-divider {
    border-color: var(--sidebar-divider);
    transition: border-color 0.3s ease;
}
#admin-sidebar .sidebar-logo-title {
    color: var(--sidebar-logo-title);
    transition: color 0.3s ease;
}
#admin-sidebar .sidebar-logo-sub {
    color: var(--sidebar-logo-sub);
    transition: color 0.3s ease;
}
#admin-sidebar .sidebar-user-name {
    color: var(--sidebar-user-name);
    transition: color 0.3s ease;
}
#admin-sidebar .sidebar-user-role {
    color: var(--sidebar-user-role);
    transition: color 0.3s ease;
}
#admin-sidebar .sidebar-nav-link {
    color: var(--sidebar-nav-text);
    transition: color 0.2s ease, background 0.2s ease;
}
#admin-sidebar .sidebar-nav-link:hover {
    background: var(--sidebar-nav-hover-bg);
}
#admin-sidebar .sidebar-logout:hover {
    background: var(--sidebar-logout-hover);
}
</style>

<aside id="admin-sidebar" class="w-72 border-r h-screen flex flex-col">

    <div class="px-6 pt-8 pb-6 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/Logo.jpeg') }}"
                 class="h-12 w-12 object-contain" alt="Groovy Archery Logo">
            <div>
                <p class="text-2xl font-bold tracking-tight sidebar-logo-title">Groovy Archery</p>
                <p class="text-sm -mt-1 sidebar-logo-sub font-medium">Admin Panel</p>
            </div>
        </div>
    </div>

    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6B21A5&color=fff"
                 class="w-10 h-10 rounded-full object-cover shadow"
                 alt="{{ auth()->user()->name }}">
            <div>
                <p class="font-semibold sidebar-user-name">{{ auth()->user()->name }}</p>
                <p class="text-xs sidebar-user-role">{{ __('dashboard.sidebar_admin_role') }}</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-3 py-6 overflow-y-auto">
        <ul class="space-y-1">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('dashboard')
                              ? 'bg-[#85488F] text-white'
                              : 'sidebar-nav-link' }}">
                    <i class="fa-solid fa-house w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_dashboard') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('atlet.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('atlet.index')
                              ? 'bg-[#85488F] text-white'
                              : 'sidebar-nav-link' }}">
                    <i class="fa-solid fa-address-book w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_tambah_atlet') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('atlet.kelola') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('atlet.kelola')
                              ? 'bg-[#85488F] text-white'
                              : 'sidebar-nav-link' }}">
                    <i class="fa-solid fa-users w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_kelola_atlet') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('pertandingan.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('pertandingan.*')
                              ? 'bg-[#85488F] text-white'
                              : 'sidebar-nav-link' }}">
                    <i class="fa-solid fa-trophy w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_kelola_pertandingan') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('documentations.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('documentations.*')
                              ? 'bg-[#85488F] text-white'
                              : 'sidebar-nav-link' }}">
                    <i class="fa-solid fa-images w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_kelola_dokumentasi') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('testi.index') }}"
                   class="flex items-center gap-3 px-5 py-3.5 font-medium transition-colors
                          {{ request()->routeIs('testi.*')
                              ? 'bg-[#85488F] text-white'
                              : 'sidebar-nav-link' }}">
                    <i class="fa-solid fa-star w-5 text-center text-base"></i>
                    <span>{{ __('dashboard.nav_kelola_testimoni') }}</span>
                </a>
            </li>

        </ul>
    </nav>

    <div class="p-6 border-t border-gray-100 mt-auto">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="sidebar-logout flex items-center gap-3 px-5 py-3.5 text-red-500 rounded-2xl font-medium transition-colors">
            <i class="fa-solid fa-right-from-bracket w-5 text-center text-base"></i>
            <span>{{ __('dashboard.nav_logout') }}</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>

</aside>