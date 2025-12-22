@php
    $heroData = [
        'title' => [
            'title1' => 'VISI, MISI, DAN TUJUAN',
            'title1_class' => 'text-4xl md:text-5xl lg:text-6xl',
            'subtitle1' => 'UNIT KEGIATAN MAHASISWA',
            'subtitle1_class' => 'text-sm md:text-base lg:text-lg',
            'title2' => 'PUSAT PENGEMBANGAN RISET MAHASISWA',
            'title2_class' => 'text-2xl md:text-3xl lg:text-4xl',
            'subtitle2' => 'UNIVERSITAS MUSLIM INDONESIA',
            'subtitle2_class' => 'text-sm md:text-base lg:text-lg'
        ],
        'description' => 'PERISAI UMI adalah unit kegiatan mahasiswa yang berfokus pada pengembangan riset dan inovasi. Kami memberdayakan mahasiswa untuk mengembangkan potensi akademik dan penelitian melalui berbagai program dan kegiatan yang inspiratif.',
        'cta' => [
            'text' => 'Contact Us',
            'url' => '#contact',
        ],
    ];
@endphp

<section id="home" class="bg-black py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
            <!-- Left Content - Text (3/5 width) -->
            <div class="lg:col-span-3 space-y-6">
                @include('components.home.hero-title', ['title' => $heroData['title']])
                @include('components.home.hero-description', ['description' => $heroData['description']])
            </div>

            <!-- Right Content - Illustration (2/5 width) -->
            <div class="lg:col-span-2">
                @include('components.home.hero-illustration')
            </div>
        </div>
    </div>
</section>