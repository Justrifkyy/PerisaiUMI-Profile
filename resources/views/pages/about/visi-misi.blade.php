@extends('layouts.app')

@section('title', 'Visi & Misi - PERISAI UMI')

@section('content')
    {{-- Hero Section --}}
    @include('sections.about.visi-misi.hero')

    {{-- Main Content --}}
    @include('sections.about.visi-misi.content')
@endsection