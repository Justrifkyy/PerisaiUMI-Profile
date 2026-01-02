@extends('layouts.admin')

@section('title', 'Edit Member - ' . $department->name)
@section('page-title', 'Edit Member')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.departments.members.index', $department) }}"
                class="inline-flex items-center text-gray-400 hover:text-yellow-400">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to {{ $department->name }} Members
            </a>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Member</h2>

            <form action="{{ route('admin.departments.members.update', [$department, $member]) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="position" class="block text-sm font-medium text-gray-300 mb-2">Position *</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $member->position) }}"
                        required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('position')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                @if ($member->photo)
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Current Photo</label>
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                            class="w-48 h-64 object-cover rounded-lg">
                    </div>
                @endif

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-300 mb-2">
                        {{ $member->photo ? 'Change Photo' : 'Upload Photo' }}
                    </label>
                    <input type="file" name="photo" id="photo" accept="image/*"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-400 file:text-gray-900">
                    <p class="mt-1 text-xs text-gray-400">Recommended: Portrait photo with 3:4 aspect ratio</p>
                    @error('photo')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="period" class="block text-sm font-medium text-gray-300 mb-2">Period</label>
                    <input type="text" name="period" id="period" value="{{ old('period', $member->period) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-300 mb-2">Level</label>
                        <input type="number" name="level" id="level" value="{{ old('level', $member->level ?? 0) }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-300 mb-2">Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $member->order ?? 0) }}"
                            class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                        {{ old('is_active', $member->is_active) ? 'checked' : '' }}
                        class="w-5 h-5 bg-gray-700 border-gray-600 rounded text-yellow-400">
                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-300">Active</label>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg">
                        Update Member
                    </button>
                    <a href="{{ route('admin.departments.members.index', $department) }}"
                        class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
