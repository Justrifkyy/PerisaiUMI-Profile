@php
    $newsData = [
        'title' => 'PERISAI NEWS',
        'cards' => [
            [
                'title' => 'PERISAI HUMANITY',
                'description' => 'Program kemanusiaan dan pengabdian masyarakat yang dilakukan oleh anggota PERISAI UMI untuk memberikan dampak positif bagi lingkungan sekitar.',
                'gradient' => 'from-yellow-500 to-yellow-700',
                'shadow' => 'hover:shadow-yellow-400/30',
                'image' => 'images/prestasi.jpg',
            ],
            [
                'title' => 'PRESTASI PERISAI',
                'description' => 'Pencapaian dan penghargaan yang diraih oleh anggota PERISAI UMI dalam berbagai kompetisi riset dan inovasi tingkat nasional maupun internasional.',
                'gradient' => 'from-yellow-500 to-yellow-700',
                'shadow' => 'hover:shadow-yellow-400/30',
                'image' => 'images/prestasi.jpg',
            ],
        ],
    ];
@endphp

<section id="activity" class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Title -->
        @include('components.home.section-title', ['title' => $newsData['title']])

        <!-- News Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($newsData['cards'] as $card)
                @include('components.home.news-card', ['card' => $card])
            @endforeach
        </div>
    </div>
</section>