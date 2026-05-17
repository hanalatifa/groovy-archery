<footer class="gradient-animated text-white pt-16 pb-8 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 mb-14">

            <div class="col-span-2 md:col-span-1 md:pr-8">
                <img src="{{ asset('assets/logo_groovy.png') }}" alt="Logo" class="h-16 mb-4">
                <p class="text-white/60 text-sm leading-relaxed max-w-xs">
                    {{ __('footer.description') }}
                </p>
            </div>

            <div>
                <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">
                    {{ __('footer.information') }}
                </p>
                <ul class="space-y-3">
                    <li><a href="{{ url('/#about-us') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.about_us') }}</a></li>
                    <li><a href="{{ url('/#visi-misi') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.vision_mission') }}</a></li>
                    <li><a href="{{ url('/#values') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.values') }}</a></li>
                    <li><a href="{{ url('/#faq') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.faq') }}</a></li>
                    <li><a href="{{ url('/#contacts') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.contact') }}</a></li>
                </ul>
            </div>

            <div>
                <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">
                    Program
                </p>
                <ul class="space-y-3">
                    <li><a href="{{ route('schedule') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.schedule') }}</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.gallery') }}</a></li>
                    <li><a href="{{ route('achievements') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.achievements') }}</a></li>
                    <li><a href="{{ route('athletes') }}" class="text-white/70 text-sm hover:text-white transition-colors">{{ __('footer.athletes') }}</a></li>
                </ul>
            </div>

            <div>
                <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">
                    {{ __('footer.follow_us') }}
                </p>
                <ul class="space-y-3">
                    @foreach([
                        [
                            __('footer.instagram'), 
                            'M16 3H8C5.23858 3 3 5.23858 3 8V16C3 18.7614 5.23858 21 8 21H16C18.7614 21 21 18.7614 21 16V8C21 5.23858 18.7614 3 16 3Z M12 15.5C10.067 15.5 8.5 13.933 8.5 12C8.5 10.067 10.067 8.5 12 8.5C13.933 8.5 15.5 10.067 15.5 12C15.5 13.933 13.933 15.5 12 15.5Z M17.5 7.5a.5.5 0 11-1 0 .5.5 0 011 0z', 
                            'https://www.instagram.com/groovy_archery/'
                        ],
                        [
                            __('footer.facebook'), 
                            'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z', 
                            'https://www.facebook.com/groovyarcheryclub/'
                        ],
                    ] as [$name, $iconPath, $link])
                
                    <li>
                        <a href="{{ $link }}" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="flex items-center gap-2.5 text-white/70 text-sm hover:text-white transition-colors group">
                            
                            <svg class="w-4 h-4 opacity-60 group-hover:opacity-100 transition-opacity" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 stroke-width="2.5"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                            </svg>
                
                            {{ $name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Bottom Footer (Copyright) --}}
        <div class="border-t border-white/15 pt-7 flex flex-col md:flex-row items-center justify-center gap-4">
            <p class="text-white/40 text-xs text-center">
                © {{ date('Y') }} {{ __('footer.copyright') }}
            </p>
        </div>
    </div>
</footer>