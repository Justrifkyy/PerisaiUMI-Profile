@php
    $activities = [
        [
            'title' => 'Workshop Penulisan Karya Ilmiah',
            'date' => '15 Januari 2024',
            'category' => 'Workshop',
            'description' => 'Pelatihan intensif penulisan karya ilmiah untuk persiapan PKM dan kompetisi riset tingkat nasional.',
            'image' => 'images/placeholder-1.jpg'
        ],
        [
            'title' => 'Seminar Nasional Riset & Inovasi',
            'date' => '20 Februari 2024',
            'category' => 'Seminar',
            'description' => 'Seminar nasional menghadirkan pembicara expert di bidang riset dan inovasi teknologi.',
            'image' => 'images/placeholder-2.jpg'
        ],
        [
            'title' => 'Kompetisi Inovasi Mahasiswa',
            'date' => '10 Maret 2024',
            'category' => 'Kompetisi',
            'description' => 'Ajang kompetisi inovasi untuk mahasiswa UMI dalam mengembangkan ide kreatif dan solusi inovatif.',
            'image' => 'images/placeholder-3.jpg'
        ],
        [
            'title' => 'PERISAI Humanity',
            'date' => '5 April 2024',
            'category' => 'Pengabdian',
            'description' => 'Program pengabdian masyarakat dan kemanusiaan untuk memberikan dampak positif bagi lingkungan sekitar.',
            'image' => 'images/placeholder-1.jpg'
        ],
        [
            'title' => 'Pelatihan Metodologi Penelitian',
            'date' => '18 Mei 2024',
            'category' => 'Pelatihan',
            'description' => 'Pelatihan metodologi penelitian kuantitatif dan kualitatif untuk mahasiswa yang akan melakukan riset.',
            'image' => 'images/placeholder-2.jpg'
        ],
        [
            'title' => 'Expo Riset & Inovasi UMI',
            'date' => '25 Juni 2024',
            'category' => 'Pameran',
            'description' => 'Pameran hasil riset dan inovasi mahasiswa UMI yang telah dikembangkan sepanjang tahun.',
            'image' => 'images/placeholder-3.jpg'
        ],
    ];
@endphp

<section id="content" class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Activities Grid - Full Width --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($activities as $activity)
                <div
                    class="bg-zinc-700 rounded-lg overflow-hidden border border-gray-800 hover:border-yellow-400 transition-all duration-300 group">
                    {{-- Activity Image --}}
                    <div class="relative aspect-video overflow-hidden">
                        <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">

                        {{-- Category Badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-xs font-bold">
                                {{ $activity['category'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Activity Content --}}
                    <div class="p-6 space-y-3">
                        {{-- Date --}}
                        <div class="flex items-center text-gray-400 text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $activity['date'] }}
                        </div>

                        {{-- Title --}}
                        <h3 class="text-white text-lg font-bold group-hover:text-yellow-400 transition-colors duration-300">
                            {{ $activity['title'] }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-gray-400 text-sm line-clamp-3">
                            {{ $activity['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>