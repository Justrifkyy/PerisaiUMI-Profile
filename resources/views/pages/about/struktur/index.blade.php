@extends('layouts.app')

@section('title', 'Sumber Daya - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    .title-yellow { font-family: 'Bebas Neue', sans-serif; color: #FFC107; font-size: 2.5rem; letter-spacing: 0.05em; text-align: center; margin-bottom: 20px; }
    
    /* Card Profile Style */
    .profile-card {
        background: linear-gradient(to top, #111 0%, #222 100%);
        border: 1px solid #333;
        border-radius: 16px;
        overflow: hidden;
        aspect-ratio: 3/4;
        position: relative;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .profile-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(255,193,7,0.15); border-color: #FFC107; }
    .profile-overlay {
        position: absolute; bottom: 0; left: 0; right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, transparent 100%);
        padding: 20px 10px 10px; text-align: center;
    }
    .profile-name { color: #FFC107; font-weight: 700; font-size: 1.1rem; }
    .profile-role { color: #fff; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; }

    /* Department Card */
    .dept-card {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #333;
        position: relative;
        aspect-ratio: 16/10;
        transition: transform 0.3s;
    }
    .dept-card:hover { transform: scale(1.02); border-color: #FFC107; }
    .dept-title {
        position: absolute; top: 10px; left: 10px;
        font-family: 'Bebas Neue', sans-serif;
        font-size: 3rem; color: transparent;
        -webkit-text-stroke: 1px #FFC107;
        opacity: 0.8;
    }
    .btn-pelajari {
        position: absolute; bottom: 10px; right: 10px;
        background: #FFC107; color: #000; font-weight: 800;
        font-size: 0.75rem; padding: 6px 16px; border-radius: 6px;
    }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-20">
    
    <div class="relative w-full h-[300px] flex items-center justify-center overflow-hidden border-b border-gray-800">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover" alt="Background UMI">
            <div class="absolute inset-0 bg-black/80 backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-5xl md:text-7xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">SUMBER DAYA</h1>
            <h2 class="text-white font-bold text-lg md:text-2xl tracking-[0.1em] uppercase">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-16">
        
        @include('pages.about.sumberdaya.inti')
        @include('pages.about.sumberdaya.kadep')
        @include('pages.about.sumberdaya.staff')
        @include('pages.about.sumberdaya.departemen')

    </div>
</div>
@endsection