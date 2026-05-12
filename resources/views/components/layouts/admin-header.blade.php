<style>
/* ── Dashboard Header CSS Variables (ikut sistem navbar) ── */
:root {
    --header-bg:          #F4F5F9;
    --header-border:      rgba(0,0,0,0.07);
    --header-input-bg:    #ffffff;
    --header-input-border:#e5e7eb;
    --header-input-text:  #374151;
    --header-input-placeholder: #d1d5db;
    --header-toggle-bg:   #ffffff;
    --header-toggle-border:#e5e7eb;
    --header-toggle-text: #6b7280;
    --header-lang-bg:     #ffffff;
    --header-lang-border: #e5e7eb;
    --header-lang-text:   #9ca3af;
}
[data-theme="dark"] {
    --header-bg:          #0a0f1e;
    --header-input-bg:    #1e293b;
    --header-input-border:#334155;
    --header-input-text:  #e2e8f0;
    --header-input-placeholder: #64748b;
    --header-toggle-bg:   #1e293b;
    --header-toggle-border:#334155;
    --header-toggle-text: #facc15;
    --header-lang-bg:     #1e293b;
    --header-lang-border: #334155;
    --header-lang-text:   #94a3b8;
}

#admin-header {
    background: var(--header-bg);
    border-bottom: 1px solid var(--header-border);
    transition: background 0.3s ease, border-color 0.3s ease;
}
#admin-header input {
    background: var(--header-input-bg);
    border-color: var(--header-input-border);
    color: var(--header-input-text);
    transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}
#admin-header input::placeholder {
    color: var(--header-input-placeholder);
}
#admin-header input:focus {
    border-color: #85488F;
    outline: none;
    box-shadow: none;
}
.admin-lang-wrap {
    background: var(--header-lang-bg);
    border-color: var(--header-lang-border);
    transition: background 0.3s ease, border-color 0.3s ease;
}
.admin-lang-link {
    color: var(--header-lang-text);
    transition: color 0.2s;
}
.admin-lang-link:hover {
    color: #374151;
}
[data-theme="dark"] .admin-lang-link:hover {
    color: #e2e8f0;
}
#admin-theme-toggle {
    background: var(--header-toggle-bg);
    border-color: var(--header-toggle-border);
    color: var(--header-toggle-text);
    transition: background 0.3s ease, border-color 0.3s ease, color 0.3s ease;
}
#admin-theme-toggle:hover {
    background: var(--header-lang-bg);
    filter: brightness(0.95);
}

/* Icon sun/moon ikut data-theme */
#admin-theme-toggle .icon-sun  { display: none; }
#admin-theme-toggle .icon-moon { display: block; }
[data-theme="dark"] #admin-theme-toggle .icon-sun  { display: block; }
[data-theme="dark"] #admin-theme-toggle .icon-moon { display: none; }
</style>

<header id="admin-header" class="h-[90px] px-8 flex items-center justify-between">

    <div class="relative">
        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35" />
                <circle cx="11" cy="11" r="6" />
            </svg>
        </div>
        <input
            type="text"
            placeholder="Search..."
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35" />

                <circle cx="11" cy="11" r="6" />
            </svg>
        </div>

        {{-- INPUT --}}
        <input type="text" placeholder="Search..."
            class="
                w-[700px] h-[56px]
                border pl-14 pr-5
                text-sm
                shadow-[0_4px_14px_rgba(0,0,0,0.05)]
                transition-all
            ">
    </div>

    <div class="flex items-center gap-4">

        {{-- LANGUAGE SWITCHER --}}
        <div class="admin-lang-wrap flex items-center p-1 border rounded-2xl shadow-[0_4px_14px_rgba(0,0,0,0.05)]">
        <div
            class="
            flex
            items-center
            p-1
            bg-white
            border
            border-gray-200
            rounded-2xl
            shadow-[0_4px_14px_rgba(0,0,0,0.05)]
        ">
            @foreach (['id', 'en'] as $lang)
                @php $isActive = app()->getLocale() === $lang; @endphp
                <a href="{{ route('lang.switch', $lang) }}"
                   class="
                        px-4 py-2 rounded-xl
                        text-[11px] font-bold tracking-[2px] uppercase
                        transition-all duration-200
                        {{ $isActive
                            ? 'bg-[#85488F] text-white shadow-sm'
                            : 'admin-lang-link'
                        }}
                    class="
                        px-4
                        py-2
                        rounded-xl
                        text-[11px]
                        font-bold
                        tracking-[2px]
                        uppercase
                        transition-all
                        duration-200
                        {{ $isActive ? 'bg-[#85488F] text-white shadow-sm' : 'text-gray-400 hover:text-gray-700' }}
                   ">
                    {{ strtoupper($lang) }}
                </a>
            @endforeach
        </div>

        {{-- DARKMODE --}}
        <button id="admin-theme-toggle"
            class="w-[44px] h-[44px] flex items-center justify-center border rounded-2xl shadow-[0_4px_14px_rgba(0,0,0,0.05)]">
        <button id="theme-toggle"
            class="
                w-[44px]
                h-[44px]
                flex
                items-center
                justify-center
                bg-white
                dark:bg-slate-800
                border
                border-gray-200
                dark:border-slate-700
                rounded-2xl
                text-gray-500
                dark:text-yellow-400
                shadow-[0_4px_14px_rgba(0,0,0,0.05)]
                hover:bg-gray-50
                dark:hover:bg-slate-700
                transition-all
                duration-200
            ">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

            {{-- SUN : muncul saat dark mode --}}
            <svg class="icon-sun w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="4"></circle>
                <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
            </svg>

            {{-- MOON : muncul saat light mode --}}
            <svg class="icon-moon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
            </svg>
        </button>

    </div>
</header>

<script>
(function () {
    // Pakai key yang sama dengan navbar: 'ga-theme'
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('ga-theme', theme);
    }

    function toggleTheme() {
        const cur = document.documentElement.getAttribute('data-theme');
        applyTheme(cur === 'dark' ? 'light' : 'dark');
    }

    document.getElementById('admin-theme-toggle')?.addEventListener('click', toggleTheme);
})();
</script>
