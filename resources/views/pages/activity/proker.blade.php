@extends('layouts.app')

@section('title', 'Semua Proker - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden">
    
    <div class="relative w-full h-[300px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-5xl md:text-7xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">SEMUA PROKER</h1>
            <h2 class="text-white font-bold text-lg md:text-2xl tracking-[0.1em] uppercase drop-shadow-md">PROGRAM KERJA PERISAI UMI</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-16">
            @forelse($workPrograms as $program)
            <div class="bg-[#111] border border-gray-800 rounded-2xl overflow-hidden group hover:border-[#FFC107] hover:-translate-y-2 transition-all duration-300 flex flex-col shadow-[0_0_20px_rgba(0,0,0,0.5)]">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="{{ asset('storage/' . $program->cover_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $program->title }}">
                    <div class="absolute top-4 left-4 bg-[#FFC107] text-black text-xs font-extrabold px-3 py-1 rounded-md uppercase tracking-wider">{{ $program->department->name ?? 'Proker' }}</div>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-[#FFC107] transition-colors line-clamp-2">{{ $program->title }}</h3>
                    <p class="text-gray-400 text-sm mb-6 line-clamp-3 flex-grow">{{ Str::limit($program->description, 100) }}</p>
                    <a href="{{ route('activity.detail-proker', $program->slug) }}" class="inline-block text-center w-full bg-transparent border-2 border-[#FFC107] text-[#FFC107] hover:bg-[#FFC107] hover:text-black font-bold py-2.5 rounded-xl transition-colors">Lihat Detail</a>
                </div>
            </div>
            @empty
            <p class="text-gray-400 col-span-full text-center py-8">Belum ada program kerja tersedia.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $workPrograms->links() }}
        </div>

    </div>
</div>
@endsection