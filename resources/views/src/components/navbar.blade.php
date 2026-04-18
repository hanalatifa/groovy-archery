 {{-- navbar section --}}
 <nav class="flex items-center justify-between px-10 py-6 bg-white sticky top-0 z-50 border-b border-gray-100">

    {{-- Logo --}}
    <div class="flex items-center">
        <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-10">
    </div>

    {{-- Menu --}}
    <div class="hidden md:flex items-center gap-1">

        <a href="{{ route('welcome') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                           after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                           after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                           after:transition-transform after:duration-300
                           hover:after:scale-x-100">
            Home
        </a>

        <a href="{{ route('athletes') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                           after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                           after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                           after:transition-transform after:duration-300
                           hover:after:scale-x-100">
            Athletes
        </a>

        <a href="{{ route('achievements') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                           after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                           after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                           after:transition-transform after:duration-300
                           hover:after:scale-x-100">
            Achievement
        </a>

        {{-- Dropdown More --}}
        <div class="relative group">
            <button class="relative flex items-center gap-1 px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                           hover:text-[#2b459a] hover:bg-blue-50 transition-all duration-200
                           after:absolute after:bottom-1 after:left-4 after:right-4 after:h-0.5
                           after:bg-[#2b459a] after:rounded-full after:scale-x-0 after:origin-left
                           after:transition-transform after:duration-300
                           hover:after:scale-x-100">
                More
                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            {{-- Dropdown Panel --}}
            <div class="absolute top-full left-0 mt-2 w-44 bg-white border border-gray-100 rounded-xl shadow-lg
                        py-1.5 px-1.5 z-50
                        opacity-0 pointer-events-none -translate-y-1
                        group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0
                        transition-all duration-200">
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-150">Gallery</a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-150">Schedule</a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-150">Contact Us</a>
                <a href="#" class="block px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-blue-50 hover:text-[#2b459a] transition-colors duration-150">About</a>
            </div>
        </div>

        {{-- Tombol Admin --}}
        <form id="force-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
        <a href="#" 
           onclick="event.preventDefault(); document.getElementById('force-logout').submit();"
           class="ml-2 px-6 py-2.5 bg-[#2b459a] text-white text-sm font-medium
                  hover:bg-[#1e3278] transition-colors duration-200">
            Login as Admin
        </a>
    </div>
</nav>