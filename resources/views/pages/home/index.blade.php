@extends('layouts.app')

@section('title', 'Beranda - PERISAI UMI')

@section('content')
    @include('sections.home.hero')
    @include('sections.home.news')
    @include('sections.home.statistics')
@endsection