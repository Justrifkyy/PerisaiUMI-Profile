<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - PERISAI UMI')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-72 bg-black transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 border-r border-yellow-600">
            <div class="flex flex-col h-full">
                <!-- Logo Section -->
                <div class="flex items-center justify-between h-20 px-6 bg-black border-b border-yellow-600">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-yellow-400 flex items-center justify-center font-bold text-black">
                            P
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-yellow-400">
                                PERISAI
                            </h1>
                            <p class="text-xs text-gray-500">Administration</p>
                        </div>
                    </div>
                    <button id="closeSidebar" class="lg:hidden text-gray-400 hover:text-yellow-400 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="text-sm font-medium">Dashboard</span>
                    </a>

                    <!-- Content Section -->
                    <div class="pt-2">
                        <p class="px-4 py-2 text-xs font-semibold text-gray-600 uppercase tracking-wider">📝 Content</p>
                        
                        <a href="{{ route('admin.news.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.news.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">News</span>
                        </a>

                        <a href="{{ route('admin.work-programs.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.work-programs.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Work Programs</span>
                        </a>

                        <a href="{{ route('admin.competitions.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.competitions.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Competitions</span>
                        </a>

                        <a href="{{ route('admin.gallery.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.gallery.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Gallery</span>
                        </a>
                    </div>

                    <!-- Organization Section -->
                    <div class="pt-2">
                        <p class="px-4 py-2 text-xs font-semibold text-gray-600 uppercase tracking-wider">👥 Organization</p>
                        
                        <a href="{{ route('admin.departments.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.departments.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Departments</span>
                        </a>

                        <a href="{{ route('admin.members.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.members.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Members</span>
                        </a>
                    </div>

                    <!-- Settings Section -->
                    <div class="pt-2">
                        <p class="px-4 py-2 text-xs font-semibold text-gray-600 uppercase tracking-wider">⚙️ Settings</p>
                        
                        <a href="{{ route('admin.statistics.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.statistics.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Statistics</span>
                        </a>

                        <a href="{{ route('admin.web-settings.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.web-settings.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Web Settings</span>
                        </a>

                        <a href="{{ route('admin.inbox.index') }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.inbox.*') ? 'bg-yellow-400 text-black border-l-4 border-yellow-400' : 'text-gray-400 hover:text-yellow-400 hover:bg-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Inbox</span>
                        </a>
                    </div>
                </nav>

                <!-- User Info & Logout -->
                <div class="p-4 border-t border-yellow-600 bg-gray-900">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-10 h-10 rounded-lg bg-yellow-400 flex items-center justify-center text-black font-bold text-sm">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black rounded-lg transition-all duration-200 text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-gradient-to-r from-black via-gray-900 to-black border-b border-yellow-600 h-20 flex items-center justify-between px-8 shadow-lg">
                <div class="flex items-center gap-6 flex-1">
                    <button id="openSidebar" class="lg:hidden text-gray-400 hover:text-yellow-400 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div>
                        <h2 class="text-2xl font-bold text-yellow-400">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-xs text-gray-500 mt-1">Manage your PERISAI UMI content</p>
                    </div>
                </div>

                <!-- Header Right Side -->
                <div class="flex items-center gap-4">
                    <a href="/" target="_blank"
                        class="hidden sm:flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-900 hover:bg-gray-800 transition border border-yellow-600 text-sm text-yellow-400 hover:text-yellow-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4m-4-6l6-6m0 0l-6 6m6-6v8">
                            </path>
                        </svg>
                        View Website
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-black p-8">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 lg:hidden hidden"></div>

    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
    </script>

    @stack('scripts')
</body>

</html>