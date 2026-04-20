{{-- ═══════════════════════ NAVBAR ═══════════════════════ --}}
<nav class="flex items-center justify-between px-6 md:px-10 py-4 bg-white sticky top-0 z-50 border-b border-gray-100">

    {{-- Logo --}}
    <div class="flex items-center">
        <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-10">
    </div>

    {{-- Menu Desktop --}}
    <div class="hidden md:flex items-center gap-1">

        <a href="{{ route('welcome') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                           after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                           after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                           after:transition-transform after:duration-300 hover:after:scale-x-100">
            Home
        </a>

        <a href="{{ route('athletes') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                           after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                           after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                           after:transition-transform after:duration-300 hover:after:scale-x-100">
            Athletes
        </a>

        <a href="{{ route('achievements') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                           after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                           after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                           after:transition-transform after:duration-300 hover:after:scale-x-100">
            Achievement
        </a>

        {{-- Dropdown More --}}
        <div class="relative group">
            <button class="relative flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200">
                More
                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="absolute top-full left-0 mt-2 w-44 bg-white border border-gray-100 rounded-xl shadow-lg
                        py-1.5 px-1.5 z-50
                        opacity-0 pointer-events-none -translate-y-1
                        group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0
                        transition-all duration-200">
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors">Gallery</a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors">Schedule</a>
                <a href="#contact" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors">Contact Us</a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors">About</a>
            </div>
        </div>

        <a href="{{ route('login') }}"
           class="ml-2 px-6 py-2.5 bg-[#2b459a] text-white text-sm font-medium
                  hover:bg-[#1e3278] transition-colors duration-200">
            Login as Admin
        </a>
    </div>

    {{-- Hamburger Button (mobile only) --}}
    <button id="hamburgerBtn" aria-label="Buka menu"
            class="md:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 rounded-lg
                   hover:bg-gray-100 transition-colors duration-200">
        <span class="ham-line block w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300"></span>
        <span class="ham-line block w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300"></span>
        <span class="ham-line block w-5 h-0.5 bg-gray-700 rounded-full transition-all duration-300"></span>
    </button>
</nav>

{{-- Mobile Menu Drawer --}}
<div id="mobileMenu"
     class="fixed inset-0 z-40 pointer-events-none md:hidden">

    {{-- Backdrop --}}
    <div id="menuBackdrop"
         class="absolute inset-0 bg-black/40 opacity-0 transition-opacity duration-300"></div>

    {{-- Drawer --}}
    <div id="menuDrawer"
         class="absolute top-0 right-0 h-full w-72 bg-white shadow-2xl
                translate-x-full transition-transform duration-300 ease-out flex flex-col">

        {{-- Drawer Header --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
            <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-9">
            <button id="closeMenuBtn" aria-label="Tutup menu"
                    class="w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Drawer Links --}}
        <div class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
            <a href="{{ route('welcome') }}"
               class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-700
                      rounded-xl hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Home
            </a>
            <a href="{{ route('athletes') }}"
               class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-700
                      rounded-xl hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Athletes
            </a>
            <a href="{{ route('achievements') }}"
               class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-700
                      rounded-xl hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                Achievement
            </a>

            {{-- More Section --}}
            <div class="pt-2">
                <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">More</p>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-700
                          rounded-xl hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-200">
                    Gallery
                </a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-700
                          rounded-xl hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-200">
                    Schedule
                </a>
                <a href="#contact"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-700
                          rounded-xl hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-200">
                    Contact Us
                </a>
                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-gray-700
                          rounded-xl hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-200">
                    About
                </a>
            </div>
        </div>

        {{-- Drawer Footer --}}
        <div class="px-4 pb-8 pt-4 border-t border-gray-100">
            <a href="{{ route('login') }}"
               class="flex items-center justify-center gap-2 w-full px-6 py-3.5
                      bg-[#2b459a] text-white text-sm font-bold
                      hover:bg-[#1e3278] transition-colors duration-200 rounded-xl">
                Login as Admin
            </a>
        </div>

    </div>
</div>

<script>
(function () {
    const btn       = document.getElementById('hamburgerBtn');
    const closeBtn  = document.getElementById('closeMenuBtn');
    const menu      = document.getElementById('mobileMenu');
    const drawer    = document.getElementById('menuDrawer');
    const backdrop  = document.getElementById('menuBackdrop');
    const lines     = document.querySelectorAll('.ham-line');

    function openMenu() {
        menu.classList.remove('pointer-events-none');
        backdrop.classList.add('opacity-100');
        drawer.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';

        // Animasi hamburger → X
        lines[0].style.transform = 'translateY(8px) rotate(45deg)';
        lines[1].style.opacity   = '0';
        lines[2].style.transform = 'translateY(-8px) rotate(-45deg)';
    }

    function closeMenu() {
        menu.classList.add('pointer-events-none');
        backdrop.classList.remove('opacity-100');
        drawer.classList.add('translate-x-full');
        document.body.style.overflow = '';

        // Reset hamburger
        lines[0].style.transform = '';
        lines[1].style.opacity   = '1';
        lines[2].style.transform = '';
    }

    btn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    backdrop.addEventListener('click', closeMenu);
})();
</script>