@php
    $navLinks = [
        ['url' => '#home', 'label' => 'Home'],
        ['url' => '/about', 'label' => 'About'],
        ['url' => '#activity', 'label' => 'Activity'],
        ['url' => '#competition', 'label' => 'Competition'],
        ['url' => '#contact', 'label' => 'Contact Us'],
    ];
    $isMobile = isset($mobile) && $mobile;
    $linkClass = $isMobile 
        ? 'block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-yellow-400 hover:bg-gray-800 transition duration-300'
        : 'text-gray-300 hover:text-yellow-400 transition duration-300';
@endphp

@foreach($navLinks as $link)
    <a href="{{ $link['url'] }}" class="{{ $linkClass }}">
        {{ $link['label'] }}
    </a>
@endforeach