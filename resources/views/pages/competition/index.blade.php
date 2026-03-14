@extends('layouts.app')

@section('title', 'Kompetisi - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    
    /* Efek Bintang Dekorasi */
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden">
    
    <div class="deco-star lg twinkle-2" style="top: 250px; left: 15%;"></div>
    <div class="deco-star sm twinkle-1" style="top: 450px; right: 10%;"></div>
    <div class="deco-star base twinkle-3" style="bottom: 300px; left: 8%;"></div>
    <div class="absolute top-[300px] right-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[150px] opacity-5 pointer-events-none z-0"></div>

    <div class="relative w-full h-[400px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">KOMPETISI</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase drop-shadow-md">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-8">
        
        <div class="flex flex-wrap justify-center gap-3 mb-12" data-aos="fade-up">
            <button class="px-6 py-2 bg-[#FFC107] text-black font-bold rounded-full text-sm shadow-[0_0_15px_rgba(255,193,7,0.3)] hover:-translate-y-1 transition-transform">
                Semua
            </button>
            
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                Internasional
            </button>
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                Nasional
            </button>
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                Dikti
            </button>
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                KTI / Essay
            </button>
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                Poster
            </button>
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                Debat
            </button>
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                Business Plan
            </button>
            <button class="px-6 py-2 bg-[#111] text-gray-300 hover:text-[#FFC107] font-semibold rounded-full border border-gray-800 text-sm hover:-translate-y-1 hover:border-[#FFC107] transition-all">
                Video Editing
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-16">
            
            @for ($i = 1; $i <= 8; $i++)
            <div class="bg-[#111] border border-gray-800 rounded-2xl overflow-hidden group hover:border-[#FFC107] hover:-translate-y-2 transition-all duration-300 flex flex-col shadow-[0_0_20px_rgba(0,0,0,0.5)]" data-aos="zoom-in" data-aos-delay="{{ $i * 50 }}">
                
                <div class="relative w-full aspect-square overflow-hidden border-b border-gray-800">
                    <img src="https://via.placeholder.com/600x600.png?text=Poster+Lomba+{{ $i }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Poster Lomba">
                    
                    @if($i % 3 == 0)
                        <div class="absolute top-4 left-4 bg-green-500/90 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-lg tracking-wider">Pendaftaran Buka!</div>
                    @else
                        <div class="absolute top-4 left-4 bg-red-500/90 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-md shadow-lg tracking-wider">Deadline: 25 Nov 2026</div>
                    @endif
                </div>

                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="text-white font-bold text-lg mb-2 leading-tight group-hover:text-[#FFC107] transition-colors line-clamp-2">Lomba Esai Mahasiswa Nasional (LEMNAS) Vol {{ $i }}</h3>
                    <p class="text-gray-400 text-sm line-clamp-3 mb-6 flex-grow">Universitas Gadjah Mada mengadakan lomba esai tingkat nasional dengan tema "Transisi Energi Era Digital". Total hadiah puluhan juta rupiah!</p>
                    
                    <a href="{{ route('competition.show') }}" class="inline-block text-center w-full bg-transparent border-2 border-[#FFC107] text-[#FFC107] hover:bg-[#FFC107] hover:text-black font-bold py-2.5 rounded-xl transition-colors">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endfor
            
        </div>

        <div class="flex justify-center items-center space-x-2" data-aos="fade-up">
            <a href="#" class="px-4 py-2 bg-[#111] text-gray-400 border border-gray-800 rounded-lg hover:text-[#FFC107] hover:border-[#FFC107] transition font-semibold">Prev</a>
            <a href="#" class="px-4 py-2 bg-[#FFC107] text-black font-extrabold border border-[#FFC107] rounded-lg">1</a>
            <a href="#" class="px-4 py-2 bg-[#111] text-gray-400 border border-gray-800 rounded-lg hover:text-[#FFC107] hover:border-[#FFC107] transition font-semibold">2</a>
            <a href="#" class="px-4 py-2 bg-[#111] text-gray-400 border border-gray-800 rounded-lg hover:text-[#FFC107] hover:border-[#FFC107] transition font-semibold">3</a>
            <span class="px-2 text-gray-500">...</span>
            <a href="#" class="px-4 py-2 bg-[#111] text-gray-400 border border-gray-800 rounded-lg hover:text-[#FFC107] hover:border-[#FFC107] transition font-semibold">Next</a>
        </div>

    </div>
</div>
@endsection