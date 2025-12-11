<div class="{{ $box['bgClass'] }} rounded-3xl p-8 md:p-10 shadow-xl hover:shadow-2xl {{ $box['shadowClass'] }} transition-all duration-300 {{ $box['borderClass'] ? 'border ' . $box['borderClass'] : '' }}">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <!-- Left Side: Label Boxes -->
        <div class="flex flex-col">
            <!-- Title Box -->
            <div class="inline-block {{ $box['bgClass'] === 'bg-yellow-400' ? 'bg-gray-900 text-yellow-400' : 'bg-yellow-400 text-gray-900' }} px-4 py-2 rounded-lg w-fit">
                <p class="text-sm md:text-base font-bold uppercase tracking-wide">
                    {{ $box['label'] }}
                </p>
            </div>
            <!-- Period Box -->
            <div class="inline-block {{ $box['bgClass'] === 'bg-yellow-400' ? 'bg-gray-900 text-yellow-400' : 'bg-yellow-400 text-gray-900' }} px-4 py-2 rounded-lg w-fit">
                <p class="text-sm md:text-base font-medium">
                    {{ $box['period'] }}
                </p>
            </div>
        </div>

        <!-- Right Side: Number -->
        <div class="text-8xl md:text-9xl font-bold {{ $box['numberClass'] }} leading-none">
            {{ $box['number'] }}
        </div>
    </div>

    <!-- Learn More Link at Bottom -->
    <div class="mt-6">
        <a href="#" class="inline-flex items-center {{ $box['linkClass'] }} transition duration-300 font-medium group">
            <svg class="w-5 h-5 mr-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
            Learn more
        </a>
    </div>
</div>