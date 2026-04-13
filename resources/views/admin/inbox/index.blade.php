@extends('layouts.admin')

@section('title', 'Inbox - Admin PERISAI')
@section('page-title', 'Inbox Messages')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h3 class="text-3xl font-bold text-yellow-400">Messages</h3>
            <span class="text-sm text-gray-500">{{ $messages->total() }} total messages</span>
        </div>

        <!-- Messages Table -->
        <div class="bg-gray-900 rounded-xl border border-yellow-600 overflow-hidden">
            <table class="w-full">
                <thead class="bg-black border-b border-yellow-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">From</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Subject</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Date</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Status</th>
                        <th class="px-6 py-4 text-left text-yellow-400 font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr class="border-b border-gray-800 hover:bg-gray-800 transition">
                            <td class="px-6 py-4 text-white">{{ $message->name }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ Str::limit($message->subject, 40) }}</td>
                            <td class="px-6 py-4 text-gray-400 text-sm">{{ $message->created_at->format('d-m-Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold {{ $message->is_read ? 'bg-gray-600 text-white' : 'bg-yellow-400 text-black' }}">
                                    {{ $message->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.inbox.show', $message) }}"
                                    class="text-yellow-400 hover:text-yellow-300 mr-4">View</a>
                                <form action="{{ route('admin.inbox.destroy', $message) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400"
                                        onclick="return confirm('Sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">No messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($messages->hasPages())
            <div class="flex justify-center">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection
