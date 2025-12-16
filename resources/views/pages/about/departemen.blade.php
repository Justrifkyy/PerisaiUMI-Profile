@extends('layouts.app')

@section('title', 'Departemen - PERISAI UMI')

@section('content')
    {{-- Hero Section --}}
    @include('sections.about.departemen.hero')

    {{-- Main Content --}}
    @include('sections.about.departemen.content')
@endsection