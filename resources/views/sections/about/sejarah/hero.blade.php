@php
    $heroData = [
        'title' => [
            'title1' => 'SEJARAH',
            'title1_class' => 'text-5xl md:text-6xl lg:text-7xl',
            'subtitle1' => 'UNIT KEGIATAN MAHASISWA',
            'subtitle1_class' => 'text-sm md:text-base lg:text-lg',
            'title2' => 'PUSAT PENGEMBANGAN RISET MAHASISWA',
            'title2_class' => 'text-2xl md:text-3xl lg:text-4xl',
            'subtitle2' => 'UNIVERSITAS MUSLIM INDONESIA',
            'subtitle2_class' => 'text-sm md:text-base lg:text-lg'
        ],
        'description' => 'PERISAI UMI merupakan Unit Kegiatan Mahasiswa (UKM) resmi Universitas Muslim Indonesia yang berfokus pada pengembangan penelitian, riset, inovasi, dan kompetisi ilmiah.',
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
                @include('components.home.cta-button', ['cta' => $heroData['cta']])
            </div>

            <!-- Right Content - Illustration -->
            @include('components.home.hero-illustration')
        </div>
    </div>
</section>