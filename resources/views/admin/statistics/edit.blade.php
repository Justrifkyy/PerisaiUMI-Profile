@extends('layouts.admin')

@section('title', 'Edit Statistic - Admin PERISAI')
@section('page-title', 'Edit Statistic')

@section('content')
    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('admin.statistics.index') }}"
                class="inline-flex items-center text-gray-400 hover:text-yellow-400">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Statistics
            </a>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-xl p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Statistic</h2>

            <form action="{{ route('admin.statistics.update', $statistic) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="label" class="block text-sm font-medium text-gray-300 mb-2">Label *</label>
                    <input type="text" name="label" id="label" value="{{ old('label', $statistic->label) }}" required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('label')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="period" class="block text-sm font-medium text-gray-300 mb-2">Period</label>
                    <input type="text" name="period" id="period" value="{{ old('period', $statistic->period) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    <p class="mt-1 text-xs text-gray-400">Use &lt;br&gt; for line breaks</p>
                </div>

                <div>
                    <label for="number" class="block text-sm font-medium text-gray-300 mb-2">Number *</label>
                    <input type="number" name="number" id="number" value="{{ old('number', $statistic->number) }}"
                        required
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                    @error('number')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="bg_class" class="block text-sm font-medium text-gray-300 mb-2">Background Class</label>
                    <input type="text" name="bg_class" id="bg_class"
                        value="{{ old('bg_class', $statistic->bg_class) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                </div>

                <div>
                    <label for="text_class" class="block text-sm font-medium text-gray-300 mb-2">Text Class</label>
                    <input type="text" name="text_class" id="text_class"
                        value="{{ old('text_class', $statistic->text_class) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-300 mb-2">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $statistic->order ?? 0) }}"
                        class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-2 focus:ring-yellow-400">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                        {{ old('is_active', $statistic->is_active) ? 'checked' : '' }}
                        class="w-5 h-5 bg-gray-700 border-gray-600 rounded text-yellow-400">
                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-300">Active</label>
                </div>

                <div class="flex gap-4 pt-6">
                    <button type="submit"
                        class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold rounded-lg">Update
                        Statistic</button>
                    <a href="{{ route('admin.statistics.index') }}"
                        class="px-6 py-3 bg-gray-700 hover:bg-gray-600 text-white font-semibold rounded-lg">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
