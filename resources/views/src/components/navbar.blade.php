{{-- ═══════════════════════ NAVBAR ═══════════════════════ --}}
<style>
/* ── CSS Variables ── */
:root {
    --body-bg: #ffffff;
    --body-text: #1f2937;
    --nav-bg:        #ffffff;
    --nav-border:    rgba(0,0,0,0.07);
    --nav-text:      #374151;
    --nav-text-hover:#2b459a;
    --nav-hover-bg:  #eff6ff;
    --nav-shadow:    0 4px 24px rgba(0,0,0,0.08);
    --toggle-bg:     #f3f4f6;
    --toggle-icon:   #6b7280;
    --drawer-bg:     #ffffff;
}
[data-theme="dark"] {
    --body-bg: #0f172a;
    --body-text: #f1f5f9;
    --nav-bg:        #0f172a;
    --nav-border:    rgba(255,255,255,0.08);
    --nav-text:      #e2e8f0;
    --nav-text-hover:#93c5fd;
    --nav-hover-bg:  rgba(147,197,253,0.08);
    --nav-shadow:    0 4px 24px rgba(0,0,0,0.4);
    --toggle-bg:     rgba(255,255,255,0.07);
    --toggle-icon:   #94a3b8;
    --drawer-bg:     #1e293b;
}

body {
    background-color: var(--body-bg);
    color: var(--body-text);
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* ── Nav base ── */
#gaNav {
    background: var(--nav-bg);
    border-bottom: 1px solid var(--nav-border);
    transition: background 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}
#gaNav.scrolled {
    box-shadow: var(--nav-shadow);
}

/* ── Logo ── */
.ga-logo { display:flex; align-items:center; gap:10px; text-decoration:none; flex-shrink:0; }
.ga-logo-img { height:36px; width:auto; object-fit:contain; border-radius:6px; display:block; transition:opacity 0.2s; }
.ga-logo:hover .ga-logo-img { opacity:0.85; }
.ga-logo-name { font-family:'Montserrat',sans-serif; font-weight:700; font-size:13px; color:var(--nav-text); letter-spacing:0.2px; display:block; transition:color 0.25s; }
.ga-logo-sub  { font-family:'Montserrat',sans-serif; font-size:9px; font-weight:600; letter-spacing:2.5px; text-transform:uppercase; color:var(--toggle-icon); display:block; margin-top:2px; transition:color 0.25s; }

/* ── Nav links ── */
.ga-link {
    position:relative; padding:8px 16px; font-size:14px; font-weight:500;
    color:var(--nav-text); border-radius:6px;
    transition:color 0.2s, background 0.2s;
    text-decoration:none;
}
.ga-link::after {
    content:''; position:absolute; bottom:4px; left:16px; right:16px;
    height:2px; background:#2b459a; border-radius:99px;
    transform:scaleX(0); transform-origin:left;
    transition:transform 0.3s ease;
}
.ga-link:hover { color:var(--nav-text-hover); background:var(--nav-hover-bg); }
.ga-link:hover::after { transform:scaleX(1); }

/* ── Dark mode toggle ── */
.ga-toggle {
    width:36px; height:36px; border-radius:9px;
    background:var(--toggle-bg); border:1px solid var(--nav-border);
    color:var(--toggle-icon); display:flex; align-items:center; justify-content:center;
    cursor:pointer; transition:all 0.25s; flex-shrink:0;
}
.ga-toggle:hover { background:var(--nav-hover-bg); color:var(--nav-text-hover); transform:rotate(15deg); }
.icon-sun  { display:none; }
.icon-moon { display:block; }
[data-theme="dark"] .icon-sun  { display:block; }
[data-theme="dark"] .icon-moon { display:none; }

/* ── Ham lines ── */
.ham-line { display:block; width:20px; height:2px; background:var(--nav-text); border-radius:99px; transition:all 0.3s; }

/* ── Drawer dark mode ── */
#menuDrawer { background:var(--drawer-bg); }
.drawer-link { color:var(--nav-text); transition:color 0.2s, background 0.2s; }
.drawer-link:hover { color:var(--nav-text-hover); background:var(--nav-hover-bg); }
.drawer-section-label { color:var(--toggle-icon); }
</style>

{{-- ── NAV ── --}}
<nav id="gaNav" class="flex items-center justify-between px-6 md:px-10 py-4 sticky top-0 z-50 transition-colors">
    <a href="{{ url('/') }}" class="ga-logo">
        <img src="{{ asset('assets/Logo.jpeg') }}" alt="Groovy Archery" class="ga-logo-img">
        <div>
            <span class="ga-logo-name">Groovy Archery</span>
            <span class="ga-logo-sub">Jakarta Utara</span>
        </div>
    </a>

    <div class="hidden md:flex items-center gap-1">
        <a href="{{ route('welcome') }}"    class="ga-link">Home</a>
        <a href="/athletes"   class="ga-link">Athletes</a>
        <a href="{{ route('achievements') }}" class="ga-link">Achievement</a>

        <div class="relative group">
            <button class="ga-link flex items-center gap-1">
                More
                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="absolute top-full left-0 mt-2 w-44 bg-white dark:bg-slate-800 border border-gray-100 dark:border-slate-700 rounded-xl shadow-lg py-1.5 px-1.5 z-50 opacity-0 pointer-events-none -translate-y-1 group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0 transition-all duration-200">
                <a href="{{ route('gallery') }}" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 rounded-lg hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-[#2b459a] dark:hover:text-blue-300">Gallery</a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 rounded-lg hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-[#2b459a] dark:hover:text-blue-300">Schedule</a>
                <a href="#contact" class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-200 rounded-lg hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-[#2b459a] dark:hover:text-blue-300">Contact Us</a>
            </div>
        </div>

        <button class="ga-toggle ml-1" id="themeToggleDesktop">
            <svg class="icon-sun w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            <svg class="icon-moon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
        </button>
        
        <a href="{{ route('login') }}" class="ml-1 px-6 py-2.5 bg-[#2b459a] text-white text-sm font-bold hover:bg-[#1e3278] transition-colors rounded-sm">Login as Admin</a>
    </div>
</nav>

{{-- Mobile Drawer --}}
<div id="mobileMenu" class="fixed inset-0 z-40 pointer-events-none md:hidden">
    <div id="menuBackdrop" class="absolute inset-0 bg-black/40 opacity-0 transition-opacity duration-300"></div>
    <div id="menuDrawer"
         class="absolute top-0 right-0 h-full w-72 shadow-2xl
                translate-x-full transition-transform duration-300 ease-out flex flex-col">

        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
            <img src="{{ asset('assets/Logo.jpeg') }}" alt="Logo" class="h-9 object-fit-cover rounded-2">
            <button id="closeMenuBtn" aria-label="Tutup menu"
                    class="w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Links --}}
        <div class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
            <a href="{{ route('welcome') }}" class="drawer-link flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Home
            </a>
            <a href="/athletes" class="drawer-link flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Athletes
            </a>
            <a href="{{ route('achievements') }}" class="drawer-link flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                Achievement
            </a>

            <div class="pt-3">
                <p class="drawer-section-label px-4 text-[10px] font-bold uppercase tracking-widest mb-2">More</p>
                <a href="{{ route('gallery') }}"  class="drawer-link flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl">Gallery</a>
                <a href="#" class="drawer-link flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl">Schedule</a>
                <a href="#contact"                class="drawer-link flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl">Contact Us</a>
            </div>
        </div>

        {{-- Footer --}}
        <div class="px-4 pb-8 pt-4 border-t border-gray-100">
            <a href="{{ route('login') }}"
               class="flex items-center justify-center w-full px-6 py-3.5
                      bg-[#2b459a] text-white text-sm font-bold
                      hover:bg-[#1e3278] transition-colors duration-200 rounded-xl">
                Login as Admin
            </a>
        </div>
    </div>
</div>

<script>
(function () {
    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        localStorage.setItem('ga-theme', theme);
    }

    function toggleTheme() {
        const cur = document.documentElement.getAttribute('data-theme');
        applyTheme(cur === 'dark' ? 'light' : 'dark');
    }

    document.getElementById('themeToggleDesktop')?.addEventListener('click', toggleTheme);
    document.getElementById('themeToggleMobile')?.addEventListener('click', toggleTheme);
    
    // (Tambahkan script scroll & hamburger kamu di sini seperti biasa)
})();
</script>