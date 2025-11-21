<div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl {{ $card['shadow'] }} transition-all duration-300">
    <div class="aspect-video bg-gradient-to-br {{ $card['gradient'] }} relative">
        {{-- Uncomment to use actual image:
        <img 
            src="{{ asset($card['image']) }}" 
            alt="{{ $card['title'] }}" 
            class="w-full h-full object-cover"
        >
        --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        
        <!-- Overlay Content -->
        <div class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
            <h3 class="text-2xl font-bold text-white mb-2">{{ $card['title'] }}</h3>
            <p class="text-gray-200 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                {{ $card['description'] }}
            </p>
        </div>
    </div>
</div>