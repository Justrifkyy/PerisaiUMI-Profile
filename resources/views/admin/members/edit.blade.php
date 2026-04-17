@extends('layouts.admin')

@section('title', 'Edit Member - Admin PERISAI')
@section('page-title', 'Edit Member')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.members.index') }}"
                class="inline-flex items-center text-gray-400 hover:text-yellow-400">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Members
            </a>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Member</h2>

            <form action="{{ route('admin.members.update', $member) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
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
                    <input type="text" name="position" id="position" value="{{ old('position', $member->position) }}" required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('position')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hierarchy" class="block text-sm font-medium text-gray-300 mb-2">Hierarchy *</label>
                    <select name="hierarchy" id="hierarchy" required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                        <option value="">-- Select Hierarchy --</option>
                        @foreach($hierarchies as $value => $label)
                            <option value="{{ $value }}" {{ old('hierarchy', $member->hierarchy) === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('hierarchy')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="department_id" class="block text-sm font-medium text-gray-300 mb-2">Department</label>
                    <select name="department_id" id="department_id"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                        <option value="">-- Select Department --</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ old('department_id', $member->department_id) == $dept->id ? 'selected' : '' }}>
                                {{ $dept->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-300 mb-2">Photo (3:4 Ratio)</label>
                    @if($member->photo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-32 h-auto rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="photo" id="photo" accept="image/*"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-yellow-400 file:text-gray-900">
                    @error('photo')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="linkedin_url" class="block text-sm font-medium text-gray-300 mb-2">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $member->linkedin_url) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('linkedin_url')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-300 mb-2">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $member->order) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('order')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                        {{ old('is_active', $member->is_active) ? 'checked' : '' }}
                        class="w-5 h-5 bg-gray-700 border-gray-600 rounded text-yellow-400">
                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-300">Active</label>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg">Update
                        Member</button>
                    <a href="{{ route('admin.members.index') }}"
                        class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
