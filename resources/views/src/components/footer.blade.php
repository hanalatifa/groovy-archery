    {{-- ═══════════════════════ FOOTER ═══════════════════════ --}}
    <footer class="gradient-animated text-white pt-16 pb-8 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 mb-14">

                {{-- Brand --}}
                <div class="col-span-2 md:col-span-1">
                    <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-12 mb-4 brightness-0 invert">
                    <p class="text-white/60 text-sm leading-relaxed mb-6 max-w-xs">
                        Get updates on competitions, training tips, and club news.
                    </p>
                    <div class="flex gap-0">
                        <input type="email" placeholder="Your email"
                               class="flex-1 px-4 py-2.5 text-sm bg-white/10 border border-white/20 text-white placeholder-white/40 focus:outline-none focus:border-white/50 transition-colors">
                        <button class="px-4 py-2.5 bg-white text-[#2b459a] text-xs font-bold uppercase tracking-wide hover:bg-gray-100 transition-colors whitespace-nowrap">
                            Subscribe
                        </button>
                    </div>
                    <p class="text-white/30 text-[10px] mt-2 leading-relaxed">
                        By subscribing, you agree to our Privacy Policy and consent to receive updates from Groovy Archery.
                    </p>
                </div>

                {{-- About us --}}
                <div>
                    <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">About us</p>
                    <ul class="space-y-3">
                        @foreach(['Our story','Athletes','Training','Coaches','Contact'] as $item)
                        <li><a href="#" class="text-white/70 text-sm hover:text-white transition-colors">{{ $item }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Resources --}}
                <div>
                    <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">Resources</p>
                    <ul class="space-y-3">
                        @foreach(['Membership','Partners','Coaching','Schedule','FAQ'] as $item)
                        <li><a href="#" class="text-white/70 text-sm hover:text-white transition-colors">{{ $item }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Follow us --}}
                <div>
                    <p class="font-bold text-xs uppercase tracking-[3px] text-white/50 mb-5">Follow us</p>
                    <ul class="space-y-3">
                        @foreach([
                            ['Facebook', 'M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z'],
                            ['Instagram', 'M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01'],
                            ['X / Twitter', 'M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z'],
                            ['LinkedIn', 'M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z M4 6a2 2 0 100-4 2 2 0 000 4z'],
                            ['YouTube', 'M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58A2.78 2.78 0 003.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z'],
                        ] as [$name, $iconPath])
                        <li>
                            <a href="#" class="flex items-center gap-2.5 text-white/70 text-sm hover:text-white transition-colors group">
                                <svg class="w-4 h-4 opacity-60 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                                </svg>
                                {{ $name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="border-t border-white/15 pt-7 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-white/40 text-xs">© 2024 Groovy Club Organization. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    @foreach(['Privacy Policy','Terms of Service','Cookie Settings'] as $link)
                    <a href="#" class="text-white/40 text-xs hover:text-white/70 transition-colors">{{ $link }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </footer>