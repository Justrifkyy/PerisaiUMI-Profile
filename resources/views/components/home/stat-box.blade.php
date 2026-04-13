<div class="group overflow-hidden rounded-2xl shadow-xl backdrop-blur-xl border border-gray-700 hover:border-yellow-400 transition-all duration-300 hover:shadow-2xl {{ $box['bgClass'] }} bg-opacity-10">
    <!-- Background gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    
    <!-- Content -->
    <div class="relative p-8 h-full flex flex-col justify-between">
        <!-- Header with gradient text -->
        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-white/80 group-hover:text-white transition-colors duration-300">
                    {{ $box['label'] }}
                </h3>
                <div class="w-12 h-12 rounded-full {{ $box['bgClass'] }} opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
            </div>
        </div>

        <!-- Value -->
        <div class="mb-4">
            <div class="text-5xl md:text-6xl font-bold text-white mb-2">
                {{ number_format((int)$box['value']) }}
            </div>
            @if(isset($box['description']) && $box['description'])
                <p class="text-sm text-white/60 group-hover:text-white/80 transition-colors duration-300 line-clamp-2">
                    {{ $box['description'] }}
                </p>
            @endif
        </div>

        <!-- Accent line -->
        <div class="h-1 bg-gradient-to-r {{ $box['bgClass'] }} rounded-full w-0 group-hover:w-full transition-all duration-300"></div>
    </div>
</div>
