@php
    $departments = [
        [
            'name' => 'PSDM',
            'full_name' => 'Pengembangan Sumber Daya Manusia',
            'head_count' => 1,
            'staff_count' => 8,
        ],
        [
            'name' => 'RISTEK',
            'full_name' => 'Riset dan Teknologi',
            'head_count' => 1,
            'staff_count' => 8,
        ],
        [
            'name' => 'KOMPRES',
            'full_name' => 'Kompetisi dan Prestasi',
            'head_count' => 1,
            'staff_count' => 8,
        ],
        [
            'name' => 'HUMAS',
            'full_name' => 'Hubungan Masyarakat',
            'head_count' => 1,
            'staff_count' => 8,
        ],
        [
            'name' => 'MEDIA',
            'full_name' => 'Media dan Publikasi',
            'head_count' => 1,
            'staff_count' => 8,
        ],
        [
            'name' => 'PENALARAN',
            'full_name' => 'Penalaran Ilmiah',
            'head_count' => 1,
            'staff_count' => 8,
        ],
    ];
@endphp

<section id="content" class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach($departments as $index => $dept)
            {{-- Department Section --}}
            <div class="{{ $index > 0 ? 'mt-16' : '' }}">
                {{-- Department Title --}}
                <h2 class="text-yellow-400 text-2xl md:text-3xl font-bold mb-8 text-center">
                    DEPARTEMEN {{ $dept['name'] }}
                </h2>

                {{-- Kepala Departemen (Centered) --}}
                <div class="flex justify-center mb-6">
                    <div class="w-32 md:w-40">
                        @include('components.about.department-card')
                    </div>
                </div>

                {{-- Staff Grid --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                    @for($i = 0; $i < $dept['staff_count']; $i++)
                        @include('components.about.department-card')
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
</section>