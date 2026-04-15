    {{-- Footer --}}
    <footer class="bg-[#8b5a8c] text-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-20 mb-20">

            <div class="md:col-span-1">
                <div class="mb-8">
                    <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo" class="h-16 w-auto">
                </div>
                <p class="text-sm mb-6 opacity-90">Get updates on competitions, training tips, and club news.</p>

                <form action="#" class="flex gap-2">
                    <input type="email" placeholder="Your email"
                        class="w-full px-4 py-3 text-black text-sm focus:outline-none rounded-sm">
                    <button type="submit"
                        class="bg-[#e24a43] hover:bg-red-700 px-6 py-3 font-bold transition rounded-sm text-sm">
                        Subscribe
                    </button>
                </form>
                <p class="text-[10px] mt-4 opacity-70 leading-relaxed">
                    By subscribing you agree to our Privacy Policy and consent to receive updates from the Archery Club Organization.
                </p>
            </div>

            <div>
                <h4 class="font-bold mb-8">About us</h4>
                <ul class="space-y-4 text-sm opacity-90">
                    <li><a href="#" class="hover:underline">Our story</a></li>
                    <li><a href="#" class="hover:underline">Athletes</a></li>
                    <li><a href="#" class="hover:underline">Training</a></li>
                    <li><a href="#" class="hover:underline">Events</a></li>
                    <li><a href="#" class="hover:underline">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-8">Resources</h4>
                <ul class="space-y-4 text-sm opacity-90">
                    <li><a href="#" class="hover:underline">Membership</a></li>
                    <li><a href="#" class="hover:underline">Facilities</a></li>
                    <li><a href="#" class="hover:underline">Coaching</a></li>
                    <li><a href="#" class="hover:underline">Schedule</a></li>
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold mb-8">Follow us</h4>
                <ul class="space-y-4 text-sm opacity-90">
                    <li class="flex items-center gap-3">
                        <i class="fab fa-facebook text-lg"></i> <a href="#" class="hover:underline">Facebook</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-instagram text-lg"></i> <a href="#" class="hover:underline">Instagram</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-x-twitter text-lg"></i> <a href="#" class="hover:underline">X</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-linkedin text-lg"></i> <a href="#" class="hover:underline">LinkedIn</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fab fa-youtube text-lg"></i> <a href="#" class="hover:underline">YouTube</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/20 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs opacity-80">
            <p>© 2025 Archery Club Organization. All rights reserved.</p>
            <div class="flex gap-6">
                <a href="#" class="hover:underline">Privacy Policy</a>
                <a href="#" class="hover:underline">Terms of Service</a>
                <a href="#" class="hover:underline">Cookies Settings</a>
            </div>
        </div>
    </div>
</footer>