<header class="h-[90px] px-8 flex items-center justify-between">

    <div class="relative">

        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M21 21l-4.35-4.35" />

                <circle cx="11" cy="11" r="6" />
            </svg>
        </div>

        <input
            type="text"
            placeholder="Search..."
            class="
                w-[700px]
                h-[56px]
                bg-white
                border
                border-gray-200
                pl-14
                pr-5
                text-sm
                text-gray-700
                placeholder:text-gray-300
                shadow-[0_4px_14px_rgba(0,0,0,0.05)]
                focus:outline-none
                focus:ring-0
                focus:border-[#85488F]
                transition-all
            ">
    </div>
    <div class="flex items-center gap-4">

a        <div class="
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
                @php
                    $isActive = app()->getLocale() === $lang;
                @endphp
                <a href="{{ route('lang.switch', $lang) }}"
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
                        {{ $isActive
                            ? 'bg-[#85488F] text-white shadow-sm'
                            : 'text-gray-400 hover:text-gray-700'
                        }}
                   ">
                    {{ strtoupper($lang) }}
                </a>

            <div class="relative w-80">
                <input ... placeholder="{{ __('dashboard.search_placeholder') }}" class="w-full bg-gray-100 border border-gray-200 rounded-xl px-5 py-3 text-sm focus:outline-none focus:border-purple-500">
            </div>

            <div class="inline-flex items-center p-1 bg-gray-100 border border-gray-200 rounded-[20px] gap-0.5">
                @foreach (['id', 'en'] as $lang)
                    @php $isActive = app()->getLocale() === $lang; @endphp
                    <a href="{{ route('lang.switch', $lang) }}"
                       class="px-3 py-1.5 rounded-[14px] text-xs font-bold tracking-widest uppercase transition-all duration-200
                              {{ $isActive ? 'text-white shadow-sm' : 'text-gray-400 hover:text-gray-600' }}"
                       style="{{ $isActive ? 'background: #85488F;' : '' }}">
                        {{ strtoupper($lang) }}
                    </a>
                @endforeach
            </div>

            <button id="theme-toggle"
                class="p-3 bg-gray-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-[20px] text-gray-500 dark:text-yellow-400 hover:bg-gray-200 dark:hover:bg-slate-700 transition-all duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 2v2"></path>
                    <path d="M12 20v2"></path>
                    <path d="M4.93 4.93l1.41 1.41"></path>
                    <path d="M17.66 17.66l1.41 1.41"></path>
                    <path d="M2 12h2"></path>
                    <path d="M20 12h2"></path>
                    <path d="M6.34 17.66l-1.41 1.41"></path>
                    <path d="M19.07 4.93l-1.41 1.41"></path>
                </svg>
            </button>
            @endforeach

        </div>

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
