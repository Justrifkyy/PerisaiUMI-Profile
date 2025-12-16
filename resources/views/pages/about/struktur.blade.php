@extends('layouts.app')

@section('title', 'Struktur Organisasi - PERISAI UMI')

@section('content')
    {{-- Hero Section --}}
    @include('sections.about.struktur.hero')

    {{-- Main Content --}}
    @include('sections.about.struktur.content')
@endsection