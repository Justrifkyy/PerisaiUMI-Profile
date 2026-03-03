@extends('layouts.admin')

@section('title', 'Edit Department - Admin PERISAI')
@section('page-title', 'Edit Department')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.departments.index') }}"
                class="inline-flex items-center text-gray-400 hover:text-yellow-400">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Departments
            </a>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Department</h2>

            <form action="{{ route('admin.departments.update', $department) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $department->name) }}" required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                    <input type="text" name="full_name" id="full_name"
                        value="{{ old('full_name', $department->full_name) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">{{ old('description', $department->description) }}</textarea>
                </div>

                @if ($department->icon)
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Current Icon</label>
                        <img src="{{ asset('storage/' . $department->icon) }}" alt="{{ $department->name }}"
                            class="w-24 h-24 object-contain">
                    </div>
                @endif

                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-300 mb-2">
                        {{ $department->icon ? 'Change Icon' : 'Upload Icon' }}
                    </label>
                    <input type="file" name="icon" id="icon" accept="image/*"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-400 file:text-gray-900">
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-300 mb-2">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $department->order ?? 0) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                        {{ old('is_active', $department->is_active) ? 'checked' : '' }}
                        class="w-5 h-5 bg-gray-700 border-gray-600 rounded text-yellow-400">
                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-300">Active</label>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg">Update
                        Department</button>
                    <a href="{{ route('admin.departments.index') }}"
                        class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
