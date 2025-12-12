@php

    $hasNewFormat = isset($title['title1']) || isset($title['title2']);
@endphp

<div class="space-y-2">
    @if($hasNewFormat)

        @if(isset($title['title1']))
            <h1 class="{{ $title['title1_class'] ?? 'text-lg md:text-lg lg:text-lg' }} font-bold text-yellow-400">
                {{ $title['title1'] }}
            </h1>
        @endif

        @if(isset($title['subtitle1']))
            <p class="{{ $title['subtitle1_class'] ?? 'text-base md:text-lg' }} font-semibold text-white">
                {{ $title['subtitle1'] }}
            </p>
        @endif

        @if(isset($title['title2']))
            <h2 class="{{ $title['title2_class'] ?? 'text-3xl md:text-4xl lg:text-5xl' }} font-bold text-yellow-400">
                {{ $title['title2'] }}
            </h2>
        @endif

        @if(isset($title['subtitle2']))
            <p class="{{ $title['subtitle2_class'] ?? 'text-base md:text-lg' }} font-semibold text-white">
                {{ $title['subtitle2'] }}
            </p>
        @endif
    @else
        {{-- Old Format: line1, line2, line3, line4 --}}
        <h1 class="text-4xl md:text-1xl lg:text-3xl font-bold leading-tight">
            <span class="text">{{ $title['line1'] }}</span>
            <span class="text-yellow-400 block mt-2 text-5xl md:text-6xl lg:text-6xl">{{ $title['line2'] }}</span>
            <span class="text block mt-2">{{ $title['line3'] }}</span>
            @if(isset($title['line4']))
                <span class="text block mt-2">{{ $title['line4'] }}</span>
            @endif
        </h1>
    @endif
</div>