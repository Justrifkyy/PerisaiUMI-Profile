@extends('layouts.admin')

@section('title', 'Gallery Management - Admin PERISAI')
@section('page-title', 'Gallery Management')

@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-white">Gallery</h1>
                <p class="text-gray-400 mt-1">Manage gallery images</p>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-600 text-white px-6 py-4 rounded-lg">{{ session('success') }}</div>
        @endif

        <!-- Upload Form -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            <h2 class="text-xl font-bold text-white mb-4">Upload Images</h2>
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="images" class="block text-sm font-medium text-gray-300 mb-2">Select Images *</label>
                    <input type="file" name="images[]" id="images" accept="image/*" multiple required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-400 file:text-gray-900">
                    <p class="mt-1 text-xs text-gray-400">You can select multiple images</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                        <input type="text" name="description" id="description"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    </div>
                </div>

                <button type="submit"
                    class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg">
                    Upload Images
                </button>
            </form>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($galleries as $gallery)
                <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg group relative">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}"
                        class="w-full h-48 object-cover">

                    <div class="p-4">
                        @if ($gallery->title)
                            <h3 class="text-white font-medium text-sm">{{ $gallery->title }}</h3>
                        @endif
                        @if ($gallery->description)
                            <p class="text-gray-400 text-xs mt-1">{{ $gallery->description }}</p>
                        @endif
                    </div>

                    <!-- Delete Button -->
                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST"
                            onsubmit="return confirm('Delete this image?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-lg shadow-lg">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-gray-400 text-lg">No images in gallery</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($galleries->hasPages())
            <div class="flex justify-center">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
@endsection