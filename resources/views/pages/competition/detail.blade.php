@extends('layouts.app')

@section('title', '{{ $competition->title }} - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    
    /* Menyembunyikan Scrollbar Bawaan untuk Carousel */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    /* Carousel Interaktif */
    .carousel-container { display: flex; overflow-x: auto; scroll-snap-type: x mandatory; scroll-behavior: smooth; }
    .carousel-item { flex: none; width: 100%; scroll-snap-align: start; aspect-ratio: 1/1; position: relative; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 pt-24 relative overflow-hidden">
    
    <div class="absolute top-[200px] right-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[150px] opacity-5 pointer-events-none z-0"></div>

    <div class="relative z-10 max-w-[1200px] mx-auto px-6 md:px-12 pt-8">
        
        <div class="mb-8" data-aos="fade-right">
            <a href="{{ route('competition.index') }}" class="text-[#FFC107] hover:text-white flex items-center text-sm font-bold transition-colors">
                <span class="mr-2">←</span> Kembali ke Semua Kompetisi
            </a>
        </div>

        <div class="bg-[#111] border border-gray-800 rounded-3xl overflow-hidden shadow-[0_0_40px_rgba(0,0,0,0.8)]" data-aos="fade-up">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                
                <div class="relative w-full aspect-square bg-[#0a0a0a] border-r border-gray-800 flex flex-col justify-center">
                    
                    <div id="compCarousel" class="carousel-container no-scrollbar w-full h-full">
                        @forelse($competition->poster_images as $image)
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover" alt="Poster {{ $loop->index + 1 }}">
                        </div>
                        @empty
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x800.png?text=Poster+Lomba" class="w-full h-full object-cover" alt="No Poster">
                        </div>
                        @endforelse
                    </div>

                    <button onclick="scrollSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/60 hover:bg-[#FFC107] text-white hover:text-black rounded-full flex items-center justify-center backdrop-blur-md transition-all z-10 shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button onclick="scrollSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/60 hover:bg-[#FFC107] text-white hover:text-black rounded-full flex items-center justify-center backdrop-blur-md transition-all z-10 shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2 z-10" id="carouselIndicators">
                        @if($competition->poster_images && count($competition->poster_images) > 0)
                            @foreach($competition->poster_images as $image)
                            <div class="w-2 h-2 rounded-full {{ $loop->first ? 'bg-[#FFC107]' : 'bg-white/40' }} transition-all duration-300 dot"></div>
                            @endforeach
                        @else
                        <div class="w-2 h-2 rounded-full bg-[#FFC107] transition-all duration-300 dot"></div>
                        @endif
                    </div>
                </div>

                <div class="p-8 md:p-10 flex flex-col h-full justify-between">
                    
                    <div>
                        <div class="flex flex-wrap items-center gap-3 mb-6">
                            @php
                                $isUpcoming = $competition->deadline->isFuture();
                                $deadlineText = $competition->deadline->locale('id')->format('d M Y');
                            @endphp
                            @if($isUpcoming)
                                <span class="bg-green-500/20 text-green-400 border border-green-500/30 text-xs font-bold px-3 py-1.5 rounded-md tracking-wider">Pendaftaran Dibuka: {{ $deadlineText }}</span>
                            @else
                                <span class="bg-red-500/20 text-red-400 border border-red-500/30 text-xs font-bold px-3 py-1.5 rounded-md tracking-wider">Deadline: {{ $deadlineText }}</span>
                            @endif
                            <span class="bg-gray-800 text-gray-300 text-xs font-bold px-3 py-1.5 rounded-md">{{ $competition->category }}</span>
                        </div>

                        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-6 leading-tight">{{ $competition->title }}</h1>
                        
                        <div class="prose prose-invert prose-sm md:prose-base text-gray-400 mb-8 max-h-[300px] overflow-y-auto pr-2 custom-scrollbar">
                            {!! nl2br(e($competition->description)) !!}
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-800">
                        <p class="text-sm text-gray-500 mb-4">*Silakan baca panduan lengkap pada tautan pendaftaran di bawah ini.</p>
                        
                        <a href="{{ $competition->registration_link }}" target="_blank" class="block text-center w-full bg-[#FFC107] text-black font-extrabold text-lg py-4 rounded-xl hover:bg-yellow-500 transition-all shadow-[0_0_20px_rgba(255,193,7,0.3)] hover:-translate-y-1">
                            Daftar Sekarang
                        </a>
                    </div>

                </div>

            </div>
        </div>

        @if($relatedCompetitions && count($relatedCompetitions) > 0)
        <div class="mt-20" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-8">Kompetisi Serupa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($relatedCompetitions as $related)
                <a href="{{ route('competition.detail', $related->slug) }}" class="bg-[#111] border border-gray-800 rounded-2xl overflow-hidden group hover:border-[#FFC107] hover:-translate-y-2 transition-all duration-300">
                    <div class="relative w-full aspect-square overflow-hidden">
                        @if($related->poster_images && count($related->poster_images) > 0)
                            <img src="{{ asset('storage/' . $related->poster_images[0]) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $related->title }}">
                        @else
                            <img src="https://via.placeholder.com/400x400.png?text=Poster" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $related->title }}">
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold text-lg group-hover:text-[#FFC107] transition-colors line-clamp-2 mb-2">{{ $related->title }}</h3>
                        <p class="text-gray-400 text-sm">{{ $related->category }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
    // JS Untuk Carousel Foto ala Instagram
    const carousel = document.getElementById('compCarousel');
    const dots = document.querySelectorAll('.dot');
    
    function scrollSlide(direction) {
        const slideWidth = carousel.clientWidth;
        carousel.scrollBy({ left: direction * slideWidth, behavior: 'smooth' });
    }

    // Update warna titik saat di-scroll
    carousel.addEventListener('scroll', () => {
        const slideIndex = Math.round(carousel.scrollLeft / carousel.clientWidth);
        dots.forEach((dot, index) => {
            if(index === slideIndex) {
                dot.classList.remove('bg-white/40');
                dot.classList.add('bg-[#FFC107]');
            } else {
                dot.classList.remove('bg-[#FFC107]');
                dot.classList.add('bg-white/40');
            }
        });
    });
</script>
@endpush
@endsection
