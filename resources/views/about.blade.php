@extends('layouts.app')

@section('title', 'Sejarah - PERISAI UMI')

@section('content')
    {{-- Hero Section --}}
    @include('sections.about.hero', [
        'title' => 'SEJARAH',
        'subtitle' => [
            'UNIT KEGIATAN MAHASISWA',
            'PUSAT PENGEMBANGAN RISET MAHASISWA',
            'UNIVERSITAS MUSLIM INDONESIA'
        ],
        'backgroundImage' => 'images/about-hero.jpg'
    ])

    {{-- Main Content --}}
    @include('sections.about.content')
@endsection