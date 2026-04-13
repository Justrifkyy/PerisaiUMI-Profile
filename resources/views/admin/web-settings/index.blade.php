@extends('layouts.admin')

@section('title', 'Web Settings - Admin PERISAI')
@section('page-title', 'Web Settings')

@section('content')
    <div class="space-y-6">
        <h3 class="text-3xl font-bold text-yellow-400">Website Settings</h3>

        <!-- Settings Form -->
        <div class="bg-gray-900 rounded-xl border border-yellow-600 p-8">
            @if ($setting)
                <form action="{{ route('admin.web-settings.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Email -->
                    <div>
                        <label class="block text-yellow-400 font-bold mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ $setting->email ?? '' }}"
                            class="w-full px-4 py-2 bg-black border border-yellow-600 rounded text-white" required>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-yellow-400 font-bold mb-2">WhatsApp Number</label>
                        <input type="text" name="whatsapp_number" value="{{ $setting->whatsapp_number ?? '' }}"
                            class="w-full px-4 py-2 bg-black border border-yellow-600 rounded text-white">
                    </div>

                    <!-- Address -->
                    <div>
                        <label class="block text-yellow-400 font-bold mb-2">Address</label>
                        <textarea name="address" rows="3"
                            class="w-full px-4 py-2 bg-black border border-yellow-600 rounded text-white">{{ $setting->address ?? '' }}</textarea>
                    </div>

                    <!-- Company Name -->
                    <div>
                        <label class="block text-yellow-400 font-bold mb-2">Organization Name</label>
                        <input type="text" name="organization_name" value="{{ $setting->organization_name ?? '' }}"
                            class="w-full px-4 py-2 bg-black border border-yellow-600 rounded text-white">
                    </div>

                    <!-- Logo URL -->
                    <div>
                        <label class="block text-yellow-400 font-bold mb-2">Logo URL</label>
                        <input type="text" name="logo_url" value="{{ $setting->logo_url ?? '' }}"
                            class="w-full px-4 py-2 bg-black border border-yellow-600 rounded text-white">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-black font-bold rounded-lg transition">
                        Save Settings
                    </button>
                </form>
            @else
                <p class="text-gray-400">No settings found. Please create one first.</p>
            @endif
        </div>
    </div>
@endsection
