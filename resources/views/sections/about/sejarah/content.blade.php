@php
    $contentData = [
        [
            'title' => 'Sejarah PERISAI UMI (Persatuan Riset dan Inovasi Universitas Muslim Indonesia)',
            'type' => 'paragraph',
            'content' => 'PERISAI UMI merupakan Unit Kegiatan Mahasiswa (UKM) resmi Universitas Muslim Indonesia yang berfokus pada pengembangan penelitian, riset, inovasi, dan kompetisi ilmiah. UKM ini lahir sebagai respon atas meningkatnya kebutuhan mahasiswa UMI untuk memiliki wadah pembinaan yang terarah dalam karya tulis ilmiah, PKM, penelitian, dan pengembangan teknologi.'
        ],
        [
            'title' => 'Awal Berdiri',
            'type' => 'mixed',
            'intro' => 'PERISAI UMI dibentuk oleh sekelompok mahasiswa yang aktif dalam kegiatan akademik dan riset, yang melihat bahwa UMI memerlukan komunitas formal untuk:',
            'items' => [
                'Meningkatkan budaya ilmiah,',
                'Mendorong mahasiswa ikut lomba tingkat regional hingga nasional,',
                'Mempersiapkan kader unggul menuju PIMNAS,',
                'Mengembangkan inovasi di bidang teknologi dan penelitian sosial.'
            ]
        ],
        [
            'title' => 'Perkembangan dan Kontribusi',
            'type' => 'mixed',
            'intro' => 'Sejak berdiri, PERISAI UMI terus berkembang melalui:',
            'sections' => [
                [
                    'text' => 'Pembentukan 6 departemen fungsional: PSDM, KOMPRES, HUMAS, RISTEK, Penalaran, dan Media,',
                ],
                [
                    'text' => 'Pembinaan intensif karya ilmiah, PKM, riset, dan teknologi,',
                ],
                [
                    'text' => 'Keterlibatan aktif dalam event nasional,',
                ],
                [
                    'text' => 'Pencapaian prestasi mahasiswa UMI di berbagai lomba dan kompetisi.',
                ]
            ],
            'closing' => 'PERISAI UMI juga menjadi rumah bagi para "Inovator" sebutan bagi anggotanya, untuk berkolaborasi, berkreasi, dan berkontribusi bagi kampus.'
        ],
        [
            'title' => 'Peran di UMI',
            'type' => 'mixed',
            'intro' => 'UKM ini kini menjadi garda terdepan dalam:',
            'items' => [
                'Pengembangan budaya akademik,',
                'Pembinaan mahasiswa berprestasi,',
                'Penguatan identitas UMI sebagai kampus riset dan inovasi,',
                'Membawa nama baik kampus melalui berbagai prestasi ilmiah.'
            ]
        ],
    ];
@endphp

<section class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column - Main Content (2/3 width) --}}
            <div class="lg:col-span-2 space-y-8">
                @foreach($contentData as $section)
                    @include('components.about.content-block', ['data' => $section])
                @endforeach
            </div>

            {{-- Right Column - Sidebar Images (1/3 width) --}}
            <div class="hidden lg:block space-y-6">
                {{-- Image 1 --}}
                <div class="bg-gray-400 rounded-lg overflow-hidden aspect-square">
                    <img src="{{ asset('images/placeholder-1.jpg') }}" alt="PERISAI Activity 1"
                        class="w-full h-full object-cover">
                </div>

                {{-- Image 2 --}}
                <div class="bg-gray-400 rounded-lg overflow-hidden aspect-square">
                    <img src="{{ asset('images/placeholder-2.jpg') }}" alt="PERISAI Activity 2"
                        class="w-full h-full object-cover">
                </div>

                {{-- Image 3 --}}
                <div class="bg-gray-400 rounded-lg overflow-hidden aspect-square">
                    <img src="{{ asset('images/placeholder-3.jpg') }}" alt="PERISAI Activity 3"
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>