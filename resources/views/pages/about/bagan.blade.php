@extends('layouts.app')

@section('title', 'Bagan Organisasi - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    /* Bintang */
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-20 relative overflow-hidden">
    
    <div class="deco-star sm twinkle-1" style="top: 300px; left: 15%;"></div>
    <div class="deco-star base twinkle-3" style="bottom: 300px; right: 10%;"></div>
    <div class="absolute top-[50%] left-[50%] translate-x-[-50%] w-[600px] h-[600px] bg-[#FFC107] rounded-full blur-[200px] opacity-5 pointer-events-none z-0"></div>

    <div class="relative w-full h-[400px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">STRUKTUR ORGANISASI</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase drop-shadow-md">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-12">
        <div class="w-full" data-aos="fade-up">
            
            <ol class="list-decimal pl-6 text-gray-300 text-lg md:text-xl font-medium space-y-4 mb-16 marker:text-[#FFC107] marker:font-bold">
                <li><strong class="text-white">Struktur PERISAI UMI terdiri dari:</strong> Pembina, Dewan Pertimbangan Organisasi, pengurus inti dan staf ahli</li>
                <li><strong class="text-white">Pembina</strong> adalah orang yang diamanahkan oleh birokrasi dalam hal ini Wakil Rektor III Universitas Muslim Indonesia</li>
                <li><strong class="text-white">Dewan Pertimbangan Organisasi</strong> adalah demisioner PERISAI UMI yang berjumlah 7 orang.</li>
                <li><strong class="text-white">Pengurus inti</strong> meliputi Ketua, Sekretaris, Bendahara dan Kepala Departemen</li>
                <li><strong class="text-white">Staf Ahli</strong> adalah semua pengurus selain pengurus inti</li>
                <li><strong class="text-white">Anggota biasa</strong> adalah generasi baru PERISAI UMI</li>
            </ol>

            <div class="w-full bg-[#111] rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-gray-800 p-6 md:p-10 group">
                <div class="relative w-full rounded-xl overflow-hidden">
                    <img src="https://via.placeholder.com/1400x700.png?text=Bagan+Struktur+Organisasi" alt="Bagan Struktur Organisasi" class="w-full h-auto object-contain transition-transform duration-500 group-hover:scale-[1.02]">
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection