@extends('layouts.admin')

@section('title', 'Competitions - Admin PERISAI')
@section('page-title', 'Competitions')

@section('content')
    <div class="space-y-6">
        <!-- Header with Create Button -->
        <div class="flex justify-between items-center">
            <h3 class="text-3xl font-bold text-yellow-400">All Competitions</h3>
            <a href="{{ route('admin.competitions.create') }}"
                class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-black font-bold rounded-lg transition">
                + Create Competition
            </a>
        </div>

        <!-- Competitions Table -->
        <div class="bg-gray-900 rounded-xl border border-yellow-600 overflow-hidden">
            <table class="w-full">
                <thead class="bg-black border-b border-yellow-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Title</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Category</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Deadline</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Status</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($competitions as $competition)
                        <tr class="border-b border-gray-800 hover:bg-gray-800 transition">
                            <td class="px-6 py-4 text-white">{{ $competition->title }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $competition->category }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $competition->deadline->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold {{ $competition->is_active ? 'bg-green-500 text-black' : 'bg-red-500 text-white' }}">
                                    {{ $competition->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.competitions.edit', $competition) }}"
                                    class="text-yellow-400 hover:text-yellow-300 mr-4">Edit</a>
                                <form action="{{ route('admin.competitions.destroy', $competition) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400"
                                        onclick="return confirm('Sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">No competitions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($competitions->hasPages())
            <div class="flex justify-center">
                {{ $competitions->links() }}
            </div>
        @endif
    </div>
@endsection
