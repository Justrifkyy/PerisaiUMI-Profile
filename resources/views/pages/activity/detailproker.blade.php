@extends('layouts.app')

@section('title', '{{ $workProgram->name }} - PERISAI UMI')

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden pt-10">
    <div class="max-w-[1000px] mx-auto px-6 md:px-12">
        
        <div class="mb-8" data-aos="fade-up">
            <a href="{{ route('activity.proker') }}" class="text-[#FFC107] hover:text-white flex items-center text-sm font-bold mb-6 transition-colors">
                <span class="mr-2">←</span> Kembali ke Semua Proker
            </a>
            <div class="inline-block bg-[#FFC107] text-black font-bold px-3 py-1 rounded-md text-xs uppercase tracking-wider mb-4">{{ $workProgram->department->name ?? 'Proker' }}</div>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight">{{ $workProgram->name }}</h1>
            <p class="text-gray-400 text-sm">Dipublikasikan pada: <span class="text-white">{{ $workProgram->created_at->locale('id')->format('d F Y') }}</span></p>
        </div>

        <div class="w-full aspect-[16/9] rounded-2xl overflow-hidden mb-10 border border-gray-800" data-aos="fade-up">
            <img src="{{ asset('storage/' . $workProgram->cover_image) }}" class="w-full h-full object-cover" alt="{{ $workProgram->name }}">
        </div>

        <div class="prose prose-invert max-w-none mb-16 text-gray-300 leading-relaxed text-lg" data-aos="fade-up">
            {!! nl2br(e($workProgram->content ?? $workProgram->short_description)) !!}
        </div>

        @if($workProgram->gallery_images && count($workProgram->gallery_images) > 0)
        <div data-aos="fade-up">
            <h3 class="text-2xl font-bold text-[#FFC107] mb-6 border-b border-gray-800 pb-3">Galeri Dokumentasi</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($workProgram->gallery_images as $image)
                <div class="w-full aspect-square rounded-xl overflow-hidden border border-gray-800 cursor-pointer hover:border-[#FFC107] transition-colors">
                    <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500" alt="Dokumentasi">
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection