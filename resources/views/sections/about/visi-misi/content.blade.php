@php
    $visiMisiData = [
        [
            'title' => 'VISI PERISAI UMI',
            'type' => 'paragraph',
            'content' => 'Menjadi organisasi mahasiswa yang unggul dalam riset, inovasi, dan pengembangan penalaran ilmiah untuk mencetak generasi kompeten, berdaya saing tingkat nasional maupun internasional.'
        ],
        [
            'title' => 'MISI PERISAI UMI',
            'type' => 'mixed',
            'intro' => 'Mengembangkan budaya ilmiah di lingkungan mahasiswa melalui pembinaan riset, penalaran, dan inovasi.',
            'items' => [
                'Menyelenggarakan pelatihan, workshop, dan program pembinaan berkelanjutan untuk meningkatkan kompetensi anggota.',
                'Mendorong mahasiswa aktif berpartisipasi pada kompetisi ilmiah seperti PKM, esai, debat, karya tulis, dan inovasi teknologi.',
                'Memfasilitasi kolaborasi antar departemen dan antar lembaga demi mencetak karya riset yang produktif dan bermanfaat.',
                'Menjaga komitmen dengan pihak eksternal maupun internal untuk menjamin kemitmen dengan pihak eksternal maupun internal untuk menjamin keberlangsungan organisasi.',
                'Menghadirkan lingkungan organisasi yang profesional, inklusif, dan berlandaskan nilai keilmuan.'
            ]
        ],
        [
            'title' => 'TUJUAN',
            'type' => 'mixed',
            'items' => [
                'Mencetak mahasiswa yang unggul dalam riset, PKM, dan inovasi teknologi.',
                'Menjadi wadah pembinaan bagi mahasiswa UMI untuk menghasilkan karya ilmiah tingkat regional, nasional, hingga internasional.',
                'Menghasilkan karya riset dan inovasi yang bermanfaat bagi masyarakat, kampus, dan pembangunan keilmuan.',
                'Mewujudkan kader-kader inovator untuk mengembangkan potensi akademik dan penelitian.',
                'Mengukuhkan reputasi UMI sebagai kampus yang aktif dalam pengembangan riset dan inovasi.'
            ]
        ]
    ];
@endphp

<section class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column - Main Content (2/3 width) --}}
            <div class="lg:col-span-2 space-y-8">
                @foreach($visiMisiData as $section)
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