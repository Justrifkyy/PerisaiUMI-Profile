@extends('layouts.admin')

@section('title', 'Department Management - Admin PERISAI')
@section('page-title', 'Department Management')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">All Departments</h1>
                <p class="text-gray-400 mt-1">Manage organization departments</p>
            </div>
            <a href="{{ route('admin.departments.create') }}"
                class="flex items-center px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg transition shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Department
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-600 text-white px-6 py-4 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-900">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Icon</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Full Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Order</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-400 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($departments as $dept)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-6 py-4">
                                @if ($dept->icon)
                                    <img src="{{ asset('storage/' . $dept->icon) }}" alt="{{ $dept->name }}"
                                        class="w-12 h-12 object-contain">
                                @else
                                    <div class="w-12 h-12 bg-gray-700 rounded flex items-center justify-center text-gray-500">
                                        N/A
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-white font-medium">{{ $dept->name }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $dept->full_name ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full {{ $dept->is_active ? 'bg-green-600 text-white' : 'bg-gray-600 text-white' }}">
                                    {{ $dept->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-400">{{ $dept->order ?? 0 }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.departments.members.index', $dept) }}"
                                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm rounded-lg">Members</a>
                                    <a href="{{ route('admin.departments.edit', $dept) }}"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg">Edit</a>
                                    <form action="{{ route('admin.departments.destroy', $dept) }}" method="POST"
                                        onsubmit="return confirm('Delete this department?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">No departments found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($departments->hasPages())
                <div class="px-6 py-4 bg-gray-900">{{ $departments->links() }}</div>
            @endif
        </div>
    </div>
@endsection