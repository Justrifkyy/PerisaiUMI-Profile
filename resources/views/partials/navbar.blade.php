@php
    $currentRoute = request()->path();
@endphp

<nav class="bg-black border-b border-black sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="PERISAI UMI" class="h-10 w-10 mr-3">
                <a href="/" class="text-xl font-bold text-yellow-400">
                    PERISAI UMI
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-4">
                    {{-- Home --}}
                    <a href="/"
                        class="px-3 py-2 rounded-md text-sm font-medium {{ $currentRoute == '/' ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800 hover:text-yellow-400' }} transition duration-300">
                        Home
                    </a>

                    {{-- About with Dropdown --}}
                    <div class="relative group">
                        <button
                            class="px-4 py-2 rounded-md text-sm font-medium {{ str_starts_with($currentRoute, 'about') && $currentRoute != 'about/activity' ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:text-yellow-400' }} transition duration-300 flex items-center">
                            About
                            <svg class="ml-1 h-4 w-4 transition-transform group-hover:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div
                            class="absolute left-0 mt-1 w-44 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform group-hover:translate-y-0 -translate-y-2">
                            <div class="rounded-xl shadow-2xl p-2 mt-1">
                                <a href="{{ route('about.sejarah') }}"
                                    class="block px-3 py-1 text-sm rounded-md mb-1 {{ $currentRoute == 'about/sejarah' ? 'bg-yellow-400 text-black font-semibold' : 'bg-white text-black hover:bg-yellow-400 hover:text-black' }} transition duration-150">
                                    Sejarah Perisai
                                </a>
                                <a href="{{ route('about.visi-misi') }}"
                                    class="block px-3 py-1 text-sm rounded-md mb-1 {{ $currentRoute == 'about/visi-misi' ? 'bg-yellow-400 text-black font-semibold' : 'bg-white text-black hover:bg-yellow-400 hover:text-black' }} transition duration-150">
                                    Visi, Misi, dan Tujuan
                                </a>
                                <a href="{{ route('about.struktur') }}"
                                    class="block px-3 py-1 text-sm rounded-md mb-1 {{ $currentRoute == 'about/struktur' ? 'bg-yellow-400 text-black font-semibold' : 'bg-white text-black hover:bg-yellow-400 hover:text-black' }} transition duration-150">
                                    Struktur Organisasi
                                </a>
                                <a href="{{ route('about.departemen') }}"
                                    class="block px-3 py-1 text-sm rounded-md {{ $currentRoute == 'about/departemen' ? 'bg-yellow-400 text-black font-semibold' : 'bg-white text-black hover:bg-yellow-400 hover:text-black' }} transition duration-150">
                                    Departemen Perisai
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Activity --}}
                    <a href="{{ route('about.activity') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium {{ $currentRoute == 'about/activity' ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800 hover:text-yellow-400' }} transition duration-300">
                        Activity
                    </a>

                    {{-- Competition --}}
                    <a href="#competition"
                        class="px-3 py-2 rounded-md text-sm font-medium {{ $currentRoute == 'competition' ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800 hover:text-yellow-400' }} transition duration-300">
                        Competition
                    </a>

                    {{-- Contact Us --}}
                    <a href="#contact"
                        class="px-3 py-2 rounded-md text-sm font-medium {{ $currentRoute == 'contact' ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800 hover:text-yellow-400' }} transition duration-300">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" id="mobile-menu-button" class="text-gray-400 hover:text-white focus:outline-none"
                    aria-expanded="false" aria-controls="mobile-menu">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-gray-900">
            <a href="/"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-800 hover:text-yellow-400">
                Home
            </a>

            <!-- Mobile About Dropdown -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-800 hover:text-yellow-400 flex justify-between items-center">
                    About
                    <svg class="h-5 w-5" :class="{'rotate-180': open}" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="pl-4 space-y-1">
                    <a href="{{ route('about.sejarah') }}"
                        class="block px-3 py-2 rounded-md text-sm text-gray-400 hover:bg-gray-800 hover:text-yellow-400">
                        Sejarah Perisai
                    </a>
                    <a href="{{ route('about.visi-misi') }}"
                        class="block px-3 py-2 rounded-md text-sm text-gray-400 hover:bg-gray-800 hover:text-yellow-400">
                        Visi, Misi, dan Tujuan
                    </a>
                    <a href="{{ route('about.struktur') }}"
                        class="block px-3 py-2 rounded-md text-sm text-gray-400 hover:bg-gray-800 hover:text-yellow-400">
                        Struktur Organisasi
                    </a>
                    <a href="{{ route('about.departemen') }}"
                        class="block px-3 py-2 rounded-md text-sm text-gray-400 hover:bg-gray-800 hover:text-yellow-400">
                        Departemen Perisai
                    </a>
                </div>
            </div>

            <a href="{{ route('about.activity') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-800 hover:text-yellow-400">
                Activity
            </a>
            <a href="#competition"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-800 hover:text-yellow-400">
                Competition
            </a>
            <a href="#contact"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-800 hover:text-yellow-400">
                Contact Us
            </a>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
@endpush