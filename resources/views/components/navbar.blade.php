    {{-- Navbar Section --}}
<nav class="flex items-center justify-between px-10 py-6 bg-white sticky top-0 z-50 shadow-sm">
    <div class="flex items-center">
        <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-10">
    </div>

    <div class="hidden md:flex items-center space-x-8">
        <a href="{{ route('dashboard') }}" class="text-gray-700 font-medium hover:text-blue-600 transition">Home</a>
        <a href="{{ route('athletes') }}" class="text-gray-700 font-medium hover:text-blue-600 transition">Athletes</a>
        <a href="{{ route('achievements') }}" class="text-gray-700 font-medium hover:text-blue-600 transition">Achievement</a>

        <button class="flex items-center text-gray-700 font-medium hover:text-blue-600 transition">
            More
            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

        <a href="{{ route('login') }}" class="bg-[#2b459a] text-white px-6 py-2 rounded-md font-medium hover:bg-blue-800 transition">
            Login as Admin
        </a>
    </div>
</nav>
