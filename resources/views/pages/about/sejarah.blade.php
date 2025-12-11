@extends('layouts.app')

@section('title', 'Sejarah - PERISAI UMI')

@section('content')
    {{-- Hero Section --}}
    @include('sections.about.sejarah.hero')

    {{-- Main Content --}}
    @include('sections.about.sejarah.content')
@endsection