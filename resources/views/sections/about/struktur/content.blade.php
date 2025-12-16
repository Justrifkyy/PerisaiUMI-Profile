@php
    $positions = [
        'Pembina :',
        'Ketua Umum :',
        'Sekretaris Umum :',
        'Bendahara Umum :',
        '',
        'Kepala Departemen',
        'Kepala Departemen PSDM :',
        'Kepala Departemen RISTEK :',
        'Kepala Departemen KOMPRES :',
        'Kepala Departemen MEDIA :',
        'Kepala Departemen HUMAS :',
        'Kepala Departemen PENALARAN :',
    ];
@endphp

<section id="content" class="bg-black py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Positions List at Top --}}
        <div class="mb-8">
            <div class="space-y-3">
                @foreach($positions as $position)
                    @if($position === '')
                        <div class="my-4"></div>
                    @elseif($position === 'Kepala Departemen')
                        <p class="text-white font-bold text-base md:text-lg">{{ $position }}</p>
                    @else
                        <p class="text-white text-sm md:text-base">{{ $position }}</p>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Large Organizational Chart Placeholder Below --}}
        <div class="w-full">
            <div class="bg-gray-400 rounded-lg w-full aspect-[16/9] flex items-center justify-center">
                <div class="text-center text-gray-600 px-4">
                    <svg class="w-20 h-20 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="font-semibold text-xl">Organizational Chart</p>
                    <p class="text-base mt-2">Diagram struktur organisasi akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
    </div>
</section>