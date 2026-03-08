@php
    $currentRoute = request()->path();

    // 1. DESAIN KOTAK KUNING (Sesuai Gambar: Padding kiri-kanan lebar, atas-bawah pas, rounded-xl)
    $activeClass = 'bg-[#FFC107] text-black px-8 py-2.5 rounded-xl font-bold';
    
    // 2. DESAIN MENU BIASA (Teks Abu-abu terang, hover jadi kuning)
    $inactiveClass = 'text-gray-200 hover:text-[#FFC107] px-2 py-2.5 font-semibold';

    // Gaya untuk menu Mobile
    $mobileActiveClass = 'bg-[#FFC107] text-black font-bold';
    $mobileInactiveClass = 'text-gray-300 hover:bg-gray-800 hover:text-[#FFC107] font-semibold';
@endphp

<nav class="bg-[#0a0a0a]/80 backdrop-blur-xl border-b border-gray-800/50 sticky top-0 z-50 w-full transition-all duration-300">
    <div class="max-w-[1440px] w-full mx-auto px-6 md:px-12 flex justify-between items-center h-16 md:h-20">
        
        <a href="/" class="flex-shrink-0 flex items-center z-50">
            <img src="{{ asset('assets/logo-dengan-tulisan.png') }}" alt="PERISAI UMI" class="h-8 md:h-10 lg:h-11 w-auto object-contain">
        </a>

        <div class="hidden md:flex flex-1 justify-end items-center space-x-6 lg:space-x-10 z-20">
            
            <a href="/" class="{{ $currentRoute == '/' ? $activeClass : $inactiveClass }} text-[15px] transition-all duration-300">
                Home
            </a>

            {{-- About dengan Dropdown --}}
            <div class="relative group">
                <button class="{{ str_starts_with($currentRoute, 'about') ? $activeClass : $inactiveClass }} text-[15px] flex items-center transition-all duration-300">
                    About
                    <svg class="ml-1.5 h-4 w-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div class="absolute left-1/2 -translate-x-1/2 mt-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 -translate-y-2 z-50">
                    <div class="rounded-2xl shadow-2xl p-2 bg-[#111]/90 backdrop-blur-lg border border-gray-800/60">
                        <a href="{{ route('about.sejarah') }}" class="block px-4 py-2 text-[14px] rounded-xl mb-1 {{ $currentRoute == 'about/sejarah' ? 'bg-[#FFC107] text-black font-bold' : 'text-gray-300 hover:bg-[#FFC107] hover:text-black font-semibold' }} transition-colors">Sejarah Perisai</a>
                        <a href="{{ route('about.visi-misi') }}" class="block px-4 py-2 text-[14px] rounded-xl mb-1 {{ $currentRoute == 'about/visi-misi' ? 'bg-[#FFC107] text-black font-bold' : 'text-gray-300 hover:bg-[#FFC107] hover:text-black font-semibold' }} transition-colors">Visi, Misi, & Tujuan</a>
                        <a href="{{ route('about.struktur') }}" class="block px-4 py-2 text-[14px] rounded-xl mb-1 {{ $currentRoute == 'about/struktur' ? 'bg-[#FFC107] text-black font-bold' : 'text-gray-300 hover:bg-[#FFC107] hover:text-black font-semibold' }} transition-colors">Struktur Organisasi</a>
                        <a href="{{ route('about.departemen') }}" class="block px-4 py-2 text-[14px] rounded-xl {{ $currentRoute == 'about/departemen' ? 'bg-[#FFC107] text-black font-bold' : 'text-gray-300 hover:bg-[#FFC107] hover:text-black font-semibold' }} transition-colors">Sumber Daya</a>
                    </div>
                </div>
            </div>

            <a href="{{ route('activity') }}" class="{{ $currentRoute == 'activity' ? $activeClass : $inactiveClass }} text-[15px] transition-all duration-300">
                Activity
            </a>
            
            <a href="{{ route('competition') }}" class="{{ $currentRoute == 'competition' ? $activeClass : $inactiveClass }} text-[15px] transition-all duration-300">
                Competition
            </a>
            
            <a href="{{ route('contact') }}" class="{{ $currentRoute == 'contact' ? $activeClass : $inactiveClass }} text-[15px] transition-all duration-300">
                Contact Us
            </a>
        </div>

        <div class="md:hidden flex items-center z-50">
            <button type="button" id="mobile-menu-button" class="text-gray-300 hover:text-[#FFC107] focus:outline-none transition-colors p-1">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-[#0a0a0a]/90 backdrop-blur-xl border-t border-gray-800/50 absolute w-full left-0 top-full shadow-2xl transition-all duration-300">
        <div class="px-6 pt-4 pb-8 space-y-2 max-h-[75vh] overflow-y-auto">
            
            <a href="/" class="block px-4 py-2.5 rounded-xl text-[15px] {{ $currentRoute == '/' ? $mobileActiveClass : $mobileInactiveClass }}">Home</a>
            
            <div>
                <button id="mobile-about-button" class="w-full text-left px-4 py-2.5 rounded-xl text-[15px] flex justify-between items-center {{ str_starts_with($currentRoute, 'about') ? $mobileActiveClass : $mobileInactiveClass }}">
                    About
                    <svg id="mobile-about-icon" class="h-4 w-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div id="mobile-about-dropdown" class="hidden pl-6 pr-4 py-2 space-y-1 bg-[#111]/40 rounded-xl mt-1 mx-2 border border-gray-800/50">
                    <a href="{{ route('about.sejarah') }}" class="block px-4 py-2 rounded-lg text-[13px] font-semibold {{ $currentRoute == 'about/sejarah' ? 'text-[#FFC107]' : 'text-gray-400 hover:bg-gray-800 hover:text-[#FFC107]' }}">Sejarah Perisai</a>
                    <a href="{{ route('about.visi-misi') }}" class="block px-4 py-2 rounded-lg text-[13px] font-semibold {{ $currentRoute == 'about/visi-misi' ? 'text-[#FFC107]' : 'text-gray-400 hover:bg-gray-800 hover:text-[#FFC107]' }}">Visi, Misi, & Tujuan</a>
                    <a href="{{ route('about.struktur') }}" class="block px-4 py-2 rounded-lg text-[13px] font-semibold {{ $currentRoute == 'about/struktur' ? 'text-[#FFC107]' : 'text-gray-400 hover:bg-gray-800 hover:text-[#FFC107]' }}">Struktur Organisasi</a>
                    <a href="{{ route('about.departemen') }}" class="block px-4 py-2 rounded-lg text-[13px] font-semibold {{ $currentRoute == 'about/departemen' ? 'text-[#FFC107]' : 'text-gray-400 hover:bg-gray-800 hover:text-[#FFC107]' }}">Departemen Perisai</a>
                </div>
            </div>
            
            <a href="{{ route('activity') }}" class="block px-4 py-2.5 rounded-xl text-[15px] {{ $currentRoute == 'activity' ? $mobileActiveClass : $mobileInactiveClass }}">Activity</a>
            <a href="{{ route('competition') }}" class="block px-4 py-2.5 rounded-xl text-[15px] {{ $currentRoute == 'competition' ? $mobileActiveClass : $mobileInactiveClass }}">Competition</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 rounded-xl text-[15px] {{ $currentRoute == 'contact' ? $mobileActiveClass : $mobileInactiveClass }}">Contact Us</a>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if(mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            const mobileAboutBtn = document.getElementById('mobile-about-button');
            const mobileAboutDropdown = document.getElementById('mobile-about-dropdown');
            const mobileAboutIcon = document.getElementById('mobile-about-icon');

            if(mobileAboutBtn && mobileAboutDropdown && mobileAboutIcon) {
                mobileAboutBtn.addEventListener('click', function() {
                    mobileAboutDropdown.classList.toggle('hidden');
                    mobileAboutIcon.classList.toggle('rotate-180');
                });
            }
        });
    </script>
@endpush