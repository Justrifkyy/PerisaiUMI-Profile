@php
    $contactInfo = [
        ['label' => 'Email', 'value' => 'perisai@umi.ac.id'],
        ['label' => 'Address', 'value' => 'Universitas Muslim Indonesia, Makassar'],
    ];
@endphp

<div class="space-y-2 text-gray-400 text-sm">
    @foreach($contactInfo as $info)
        <p>
            <span class="font-semibold">{{ $info['label'] }}:</span> 
            {{ $info['value'] }}
        </p>
    @endforeach
</div>  