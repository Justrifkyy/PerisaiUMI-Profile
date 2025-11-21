@php
    $heroData = [
        'title' => [
            'line1' => 'UNIT KEGIATAN MAHASISWA',
            'line2' => 'PUSAT PENGEMBANGAN RISET MAHASISWA',
            'line3' => 'UNIVERSITAS MUSLIM INDONESIA',
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