@extends('layouts.admin')

@section('title', 'Manage Members - ' . $department->name)
@section('page-title', 'Manage Members - ' . $department->name)

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <a href="{{ route('admin.departments.index') }}"
                    class="inline-flex items-center text-gray-400 hover:text-yellow-400 mb-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Departments
                </a>
                <h1 class="text-2xl font-bold text-white">{{ $department->name }} Members</h1>
                <p class="text-gray-400 mt-1">Manage members of {{ $department->full_name ?? $department->name }}</p>
            </div>
            <a href="{{ route('admin.departments.members.create', $department) }}"
                class="flex items-center px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg transition shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Member
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-600 text-white px-6 py-4 rounded-lg">{{ session('success') }}</div>
        @endif

        <!-- Members Grid (Card Layout like in the image) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @forelse($members as $member)
                <div
                    class="bg-gray-800 rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 group">
                    <!-- Photo -->
                    <div class="relative aspect-[3/4] overflow-hidden">
                        @if ($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-700 flex items-center justify-center">
                                <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif

                        <!-- Hover Actions -->
                        <div
                            class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-2">
                            <a href="{{ route('admin.departments.members.edit', [$department, $member]) }}"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg">
                                Edit
                            </a>
                            <form action="{{ route('admin.departments.members.destroy', [$department, $member]) }}"
                                method="POST" onsubmit="return confirm('Delete this member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Info Card (Yellow gradient like in the image) -->
                    <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 p-4">
                        <h3 class="text-gray-900 font-bold text-lg">{{ $member->name }}</h3>
                        <p class="text-gray-800 text-sm">{{ $member->position }}</p>
                        @if ($member->period)
                            <p class="text-gray-700 text-xs mt-1">{{ $member->period }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <p class="text-gray-400 text-lg">No members yet</p>
                    <p class="text-gray-500 text-sm mt-2">Add members to this department</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($members->hasPages())
            <div class="flex justify-center mt-8">
                {{ $members->links() }}
            </div>
        @endif
    </div>
@endsection