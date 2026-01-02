@extends('layouts.admin')

@section('title', 'Statistics Management - Admin PERISAI')
@section('page-title', 'Statistics Management')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Website Statistics</h1>
                <p class="text-gray-400 mt-1">Manage statistics displayed on homepage</p>
            </div>
            <a href="{{ route('admin.statistics.create') }}"
                class="flex items-center px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg transition shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Statistic
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-600 text-white px-6 py-4 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-900">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Label</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Period</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Number</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase">Order</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-400 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($statistics as $stat)
                        <tr class="hover:bg-gray-700 transition">
                            <td class="px-6 py-4 text-white font-medium">{{ $stat->label }}</td>
                            <td class="px-6 py-4 text-gray-400">{!! $stat->period !!}</td>
                            <td class="px-6 py-4 text-yellow-400 text-2xl font-bold">{{ $stat->number }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 text-xs font-semibold rounded-full {{ $stat->is_active ? 'bg-green-600' : 'bg-gray-600' }} text-white">
                                    {{ $stat->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-400">{{ $stat->order ?? 0 }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.statistics.edit', $stat) }}"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg">Edit</a>
                                    <form action="{{ route('admin.statistics.destroy', $stat) }}" method="POST"
                                        onsubmit="return confirm('Delete this statistic?');">
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
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">No statistics found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($statistics->hasPages())
                <div class="px-6 py-4 bg-gray-900">{{ $statistics->links() }}</div>
            @endif
        </div>
    </div>
@endsection