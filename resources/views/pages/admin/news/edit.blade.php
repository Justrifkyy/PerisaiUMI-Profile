@extends('layouts.admin')

@section('title', 'Edit News - Admin PERISAI')
@section('page-title', 'Edit News')

@section('content')
    <div class="max-w-4xl">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.news.index') }}"
                class="inline-flex items-center text-gray-400 hover:text-yellow-400 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to News List
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit News Article</h2>

            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description *</label>
                    <textarea name="description" id="description" rows="6" required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">{{ old('description', $news->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if ($news->image)
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Current Image</label>
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}"
                            class="w-48 h-48 object-cover rounded-lg">
                    </div>
                @endif

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-300 mb-2">
                        {{ $news->image ? 'Change Image' : 'Upload Image' }}
                    </label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-400 file:text-gray-900 hover:file:bg-yellow-500">
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $news->category) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                    @error('category')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gradient -->
                <div>
                    <label for="gradient" class="block text-sm font-medium text-gray-300 mb-2">Gradient Class</label>
                    <input type="text" name="gradient" id="gradient" value="{{ old('gradient', $news->gradient) }}"
                        placeholder="e.g., from-blue-500 to-purple-600"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                    @error('gradient')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Published Date -->
                    <div>
                        <label for="published_at" class="block text-sm font-medium text-gray-300 mb-2">Published
                            Date</label>
                        <input type="datetime-local" name="published_at" id="published_at"
                            value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i')) }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                        @error('published_at')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Order -->
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-300 mb-2">Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $news->order ?? 0) }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent">
                        @error('order')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Published Status -->
                <div class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $news->is_published) ? 'checked' : '' }}
                        class="w-5 h-5 bg-gray-700 border-gray-600 rounded text-yellow-400 focus:ring-2 focus:ring-yellow-400">
                    <label for="is_published" class="ml-3 text-sm font-medium text-gray-300">Publish this news
                        article</label>
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg transition shadow-lg hover:shadow-yellow-400/50">
                        Update News
                    </button>
                    <a href="{{ route('admin.news.index') }}"
                        class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection