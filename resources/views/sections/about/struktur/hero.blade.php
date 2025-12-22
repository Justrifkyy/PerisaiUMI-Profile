@php
    $heroData = [
        'title' => [
            'title1' => 'STRUKTUR ORGANISASI',
            'title1_class' => 'text-5xl md:text-6xl lg:text-7xl',
            'subtitle1' => 'UNIT KEGIATAN MAHASISWA',
            'subtitle1_class' => 'text-sm md:text-base lg:text-lg',
            'title2' => 'PUSAT PENGEMBANGAN RISET MAHASISWA',
            'title2_class' => 'text-2xl md:text-3xl lg:text-4xl',
            'subtitle2' => 'UNIVERSITAS MUSLIM INDONESIA',
            'subtitle2_class' => 'text-sm md:text-base lg:text-lg'
        ],
        'description' => 'Struktur organisasi PERISAI UMI dirancang untuk mendukung pengembangan riset dan inovasi mahasiswa melalui pembagian tugas yang jelas dan terkoordinasi.',
        'cta' => [
            'text' => 'Pelajari Lebih Lanjut',
            'url' => '#content',
        ],
    ];
@endphp

<section id="home" class="bg-black py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content - Text -->
            <div class="space-y-6">
                @include('components.home.hero-title', ['title' => $heroData['title']])
                @include('components.home.hero-description', ['description' => $heroData['description']])
            </div>

            <!-- Right Content - Illustration -->
            @include('components.home.hero-illustration')
        </div>
    </div>
</section>