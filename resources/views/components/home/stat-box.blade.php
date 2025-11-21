<div class="{{ $box['bgClass'] }} rounded-2xl p-8 shadow-xl hover:shadow-2xl {{ $box['shadowClass'] }} transition-all duration-300 {{ $box['borderClass'] ? 'border ' . $box['borderClass'] : '' }}">
    <div class="space-y-4">
        <p class="{{ $box['textClass'] }} text-sm uppercase tracking-wider {{ $box['bgClass'] === 'bg-yellow-400' ? 'font-semibold' : '' }}">
            {{ $box['label'] }}
        </p>
        <p class="{{ $box['periodClass'] }} text-base {{ $box['bgClass'] === 'bg-yellow-400' ? 'font-medium' : '' }}">
            {{ $box['period'] }}
        </p>
        <div class="text-6xl md:text-7xl font-bold {{ $box['bgClass'] === 'bg-yellow-400' ? 'text-gray-900' : 'text-yellow-400' }}">
            {{ $box['number'] }}
        </div>
        <a href="#" class="inline-flex items-center {{ $box['linkClass'] }} transition duration-300 {{ $box['bgClass'] === 'bg-yellow-400' ? 'font-bold' : 'font-semibold' }}">
            Learn {{ $box['bgClass'] === 'bg-yellow-400' ? 'more' : 'more' }}
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>
</div>