@extends('layouts.admin')

@section('title', 'Dashboard - Admin PERISAI')
@section('page-title', 'Dashboard')

@section('content')
    <div class="space-y-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-lg p-6 shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ auth()->user()->name }}! 👋</h1>
            <p class="text-gray-800 mt-2">Here's what's happening with your PERISAI website today.</p>
        </div>

        <!-- Statistics Section (Landing Page Style) -->
        @if(isset($statBoxes) && count($statBoxes) > 0)
            <div class="bg-black rounded-lg p-8">
                <!-- Section Title -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-semibold text-white">
                        Website <span class="text-yellow-400">Statistics</span>
                    </h2>
                </div>

                <!-- Stat Boxes -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($statBoxes as $box)
                        @include('components.home.stat-box', ['box' => $box])
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Management Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- News Card -->
            <div
                class="bg-gray-800 rounded-2xl p-8 border border-gray-700 hover:border-yellow-400 transition-all duration-300 shadow-xl hover:shadow-2xl">
                <div class="mb-6">
                    <div class="inline-block bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg font-bold text-sm mb-4">
                        TOTAL NEWS
                    </div>
                    <div class="text-7xl font-bold text-yellow-400 mb-4">
                        {{ $stats['news_count'] }}
                    </div>
                </div>
                <a href="#" class="inline-flex items-center text-yellow-400 hover:text-yellow-500 font-medium transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                    Manage News
                </a>
            </div>

            <!-- Departments Card -->
            <div
                class="bg-yellow-400 rounded-2xl p-8 transition-all duration-300 shadow-xl hover:shadow-2xl hover:shadow-yellow-400/50">
                <div class="mb-6">
                    <div class="inline-block bg-gray-900 text-yellow-400 px-4 py-2 rounded-lg font-bold text-sm mb-4">
                        DEPARTMENTS
                    </div>
                    <div class="text-7xl font-bold text-gray-900 mb-4">
                        {{ $stats['department_count'] }}
                    </div>
                </div>
                <a href="#" class="inline-flex items-center text-gray-900 hover:text-gray-800 font-medium transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                    Manage Departments
                </a>
            </div>

            <!-- Statistics Card -->
            <div
                class="bg-gray-800 rounded-2xl p-8 border border-gray-700 hover:border-yellow-400 transition-all duration-300 shadow-xl hover:shadow-2xl">
                <div class="mb-6">
                    <div class="inline-block bg-yellow-400 text-gray-900 px-4 py-2 rounded-lg font-bold text-sm mb-4">
                        STATISTICS ITEMS
                    </div>
                    <div class="text-7xl font-bold text-yellow-400 mb-4">
                        {{ $stats['statistic_count'] }}
                    </div>
                </div>
                <a href="#" class="inline-flex items-center text-yellow-400 hover:text-yellow-500 font-medium transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6">
                        </path>
                    </svg>
                    Manage Statistics
                </a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700 shadow-lg">
            <h2 class="text-xl font-bold text-white mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <button
                    class="flex items-center justify-center px-6 py-4 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg transition shadow-lg hover:shadow-yellow-400/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add News
                </button>

                <button
                    class="flex items-center justify-center px-6 py-4 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Department
                </button>

                <button
                    class="flex items-center justify-center px-6 py-4 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Add Statistic
                </button>

                <a href="{{ url('/') }}" target="_blank"
                    class="flex items-center justify-center px-6 py-4 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    View Website
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-gray-800 rounded-lg p-6 border border-gray-700 shadow-lg">
            <h2 class="text-xl font-bold text-white mb-4">Recent Activity</h2>
            <div class="space-y-3">
                <div class="flex items-center p-3 bg-gray-700 rounded-lg">
                    <div class="w-2 h-2 bg-yellow-400 rounded-full mr-3"></div>
                    <p class="text-gray-300 text-sm">Dashboard updated with statistics section</p>
                    <span class="ml-auto text-gray-500 text-xs">Just now</span>
                </div>
                <div class="flex items-center p-3 bg-gray-700 rounded-lg">
                    <div class="w-2 h-2 bg-green-400 rounded-full mr-3"></div>
                    <p class="text-gray-300 text-sm">Admin dashboard redesigned</p>
                    <span class="ml-auto text-gray-500 text-xs">Today</span>
                </div>
            </div>
        </div>
    </div>
@endsection