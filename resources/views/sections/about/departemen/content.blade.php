@php
    $sections = [
        [
            'name' => 'PENGURUS INTI',
            'full_name' => 'Pengurus Inti',
            'type' => 'core',
            'staff_count' => 3,
        ],
        [
            'name' => 'PSDM',
            'full_name' => 'Pengembangan Sumber Daya Manusia',
            'type' => 'department',
            'head_count' => 1,
            'staff_count' => 3,
        ],
        [
            'name' => 'RISTEK',
            'full_name' => 'Riset dan Teknologi',
            'type' => 'department',
            'head_count' => 1,
            'staff_count' => 6,
        ],
        [
            'name' => 'KOMPRES',
            'full_name' => 'Kompetisi dan Prestasi',
            'type' => 'department',
            'head_count' => 1,
            'staff_count' => 6,
        ],
        [
            'name' => 'MEDIA',
            'full_name' => 'Media dan Publikasi',
            'type' => 'department',
            'head_count' => 1,
            'staff_count' => 6,
        ],
        [
            'name' => 'HUMAS',
            'full_name' => 'Hubungan Masyarakat',
            'type' => 'department',
            'head_count' => 1,
            'staff_count' => 6,
        ],
        [
            'name' => 'PENALARAN',
            'full_name' => 'Penalaran Ilmiah',
            'type' => 'department',
            'head_count' => 1,
            'staff_count' => 6,
        ],
    ];
@endphp

<section id="content" class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach($sections as $index => $section)
            {{-- Section Container --}}
            <div class="{{ $index > 0 ? 'mt-16' : '' }}">
                {{-- Section Title --}}
                <h2 class="text-yellow-400 text-2xl md:text-3xl font-bold mb-8 text-center">
                    @if($section['type'] === 'core')
                        {{ $section['name'] }}
                    @else
                        DEPARTEMEN {{ $section['name'] }}
                    @endif
                </h2>

                @if($section['type'] === 'department')
                    {{-- Kepala Departemen (Centered) --}}
                    <div class="grid grid-cols-3 gap-4 max-w-3xl mx-auto mb-6">
                        <div></div>
                        @include('components.about.department-card')
                        <div></div>
                    </div>
                @endif

                {{-- Staff Grid (3 columns for all sections) --}}
                <div class="grid grid-cols-3 gap-4 max-w-3xl mx-auto">
                    @for($i = 0; $i < $section['staff_count']; $i++)
                        @include('components.about.department-card')
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
</section>