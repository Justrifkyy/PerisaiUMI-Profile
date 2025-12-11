@php
    $statsData = [
        'title' => 'Lebih dari <span class="text-yellow-400">150+</span> Inovator<br class="hidden sm:block"> Telah Bergabung',
        'boxes' => [
            [
                'label' => 'ALUMNI',
                'period' => 'UKM PERISAI UMI 2014 - 2024',
                'number' => '100',
                'bgClass' => 'bg-zinc-800',
                'textClass' => 'text-gray-400',
                'periodClass' => 'text-gray-300',
                'numberClass' => 'text-yellow-400',
                'linkClass' => 'text-yellow-400 hover:text-yellow-500',
                'borderClass' => 'border-gray-700',
                'shadowClass' => 'hover:shadow-yellow-400/20',
            ],
            [
                'label' => 'PENGURUS',
                'period' => 'UKM PERISAI UMI 2025/2026',
                'number' => '58',
                'bgClass' => 'bg-yellow-400',
                'textClass' => 'text-gray-800',
                'periodClass' => 'text-gray-700',
                'numberClass' => 'text-black',
                'linkClass' => 'text-black hover:text-gray-800',
                'borderClass' => '',
                'shadowClass' => 'hover:shadow-yellow-400/50',
            ],
        ],
    ];
@endphp

<section class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Title -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white">
                {!! $statsData['title'] !!}
            </h2>
        </div>

        <!-- Stat Boxes -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($statsData['boxes'] as $box)
                @include('components.home.stat-box', ['box' => $box])
            @endforeach
        </div>
    </div>
</section>