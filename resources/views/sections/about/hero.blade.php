<section class="relative bg-black h-[60vh] md:h-[70vh] flex items-center justify-start overflow-hidden">
    {{-- Background Image with Overlay --}}
    <div class="absolute inset-0">
        {{-- Uncomment untuk menggunakan gambar asli --}}
        {{-- <img 
            src="{{ asset($backgroundImage) }}" 
            alt="{{ $title }}" 
            class="w-full h-full object-cover"
        > --}}
        
        {{-- Placeholder gradient background --}}
        <div class="w-full h-full bg-black"></div>
        
        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 text-left px-4 sm:px-6 lg:px-8 ml-12 md:ml-20">
        {{-- Main Title --}}
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-yellow-400 mb-6 animate-fade-in">
            {{ $title }}
        </h1>

        {{-- Subtitle Lines --}}
        <div class="space-y-2 animate-slide-up">
            @foreach($subtitle as $line)
                <p class="text-lg md:text-xl lg:text-2xl font-semibold text-white">
                    {{ $line }}
                </p>
            @endforeach
        </div>
    </div>

    {{-- Decorative Bottom Wave (Optional) --}}
    <div class="absolute bottom-0 left-0 right-0">
        {{-- <svg class="w-full h-16 md:h-24 text-gray-900" preserveAspectRatio="none" viewBox="0 0 1200 120" fill="currentColor">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg> --}}
    </div>
</section>