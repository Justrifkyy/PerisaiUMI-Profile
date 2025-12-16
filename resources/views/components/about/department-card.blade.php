{{-- Department Position Card Component --}}
<div
    class="bg-gray-400 rounded-lg aspect-square flex items-center justify-center hover:bg-gray-300 transition-colors duration-200">
    <div class="text-center text-gray-600 px-2">
        <svg class="w-12 h-12 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        @if(isset($name))
            <p class="text-xs font-semibold">{{ $name }}</p>
        @endif
    </div>
</div>