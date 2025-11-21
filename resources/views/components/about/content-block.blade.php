<div class="bg-gray-800 rounded-lg p-6 md:p-8 border border-gray-700 hover:border-yellow-400/50 transition-all duration-300">
    {{-- Section Title --}}
    <h2 class="text-xl md:text-2xl font-bold text-yellow-400 mb-4 pb-3 border-b border-gray-700">
        {{ $data['title'] }}
    </h2>

    {{-- Content Based on Type --}}
    @if($data['type'] === 'paragraph')
        {{-- Simple Paragraph --}}
        <p class="text-gray-300 leading-relaxed text-justify">
            {{ $data['content'] }}
        </p>

    @elseif($data['type'] === 'mixed')
        {{-- Mixed Content: Intro + List + Closing --}}
        
        {{-- Intro Text --}}
        @if(isset($data['intro']))
            <p class="text-gray-300 leading-relaxed mb-4 text-justify">
                {{ $data['intro'] }}
            </p>
        @endif

        {{-- List Items --}}
        @if(isset($data['items']))
            <ul class="space-y-2 mb-4">
                @foreach($data['items'] as $item)
                    <li class="flex items-start text-gray-300">
                        <svg class="w-5 h-5 text-yellow-400 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- Sections with Text --}}
        @if(isset($data['sections']))
            <ul class="space-y-2 mb-4">
                @foreach($data['sections'] as $section)
                    <li class="flex items-start text-gray-300">
                        <svg class="w-5 h-5 text-yellow-400 mr-3 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ $section['text'] }}</span>
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- Closing Text --}}
        @if(isset($data['closing']))
            <p class="text-gray-300 leading-relaxed text-justify">
                {{ $data['closing'] }}
            </p>
        @endif
    @endif
</div>