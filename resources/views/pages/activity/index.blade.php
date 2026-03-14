@extends('layouts.app')

@section('title', 'Activity - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    
    /* Bintang & Glow dari Home */
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden">
    
    <div class="deco-star lg twinkle-2" style="top: 250px; right: 15%;"></div>
    <div class="deco-star sm twinkle-1" style="top: 400px; left: 10%;"></div>
    <div class="deco-star base twinkle-3" style="bottom: 300px; right: 8%;"></div>
    <div class="absolute top-[400px] left-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[150px] opacity-5 pointer-events-none z-0"></div>

    <div class="relative w-full h-[400px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">ACTIVITY</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase drop-shadow-md">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-8">
        
        <div class="mb-24" data-aos="fade-up">
            <div class="flex justify-between items-end mb-8 border-b border-gray-800 pb-4">
                <h2 class="font-bebas text-4xl md:text-5xl text-white tracking-wide">PROGRAM <span class="text-[#FFC107]">KERJA</span></h2>
                <a href="{{ route('activity.proker') }}" class="text-[#FFC107] hover:text-white font-bold text-sm transition-colors flex items-center">Lihat Semua <span class="ml-1">→</span></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 3; $i++)
                <div class="bg-[#111] border border-gray-800 rounded-2xl overflow-hidden group hover:border-[#FFC107] hover:-translate-y-2 transition-all duration-300 flex flex-col shadow-[0_0_20px_rgba(0,0,0,0.5)]">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="https://via.placeholder.com/600x600.png?text=Proker+{{$i}}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Proker">
                        <div class="absolute top-4 left-4 bg-[#FFC107] text-black text-xs font-extrabold px-3 py-1 rounded-md uppercase tracking-wider">Proker</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-[#FFC107] transition-colors line-clamp-2">Focus Group Discussion (FGD) Vol {{ $i }}</h3>
                        <p class="text-gray-400 text-sm mb-6 line-clamp-3 flex-grow">Kegiatan diskusi interaktif yang diselenggarakan oleh departemen penalaran untuk membahas isu-isu riset terkini di kalangan mahasiswa.</p>
                        <a href="{{ route('activity.detailproker') }}" class="inline-block text-center w-full bg-transparent border-2 border-[#FFC107] text-[#FFC107] hover:bg-[#FFC107] hover:text-black font-bold py-2.5 rounded-xl transition-colors">Lihat Detail</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div data-aos="fade-up">
            <div class="flex justify-between items-end mb-8 border-b border-gray-800 pb-4">
                <h2 class="font-bebas text-4xl md:text-5xl text-white tracking-wide">BERITA & <span class="text-[#FFC107]">KEGIATAN</span></h2>
                <a href="{{ route('activity.news') }}" class="text-[#FFC107] hover:text-white font-bold text-sm transition-colors flex items-center">Lihat Semua <span class="ml-1">→</span></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 3; $i++)
                <div class="bg-[#111] border border-gray-800 rounded-2xl overflow-hidden group hover:border-[#FFC107] hover:-translate-y-2 transition-all duration-300 flex flex-col shadow-[0_0_20px_rgba(0,0,0,0.5)]">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="https://via.placeholder.com/600x600.png?text=Berita+{{$i}}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="Berita">
                        <div class="absolute top-4 left-4 bg-[#FFC107] text-black text-xs font-extrabold px-3 py-1 rounded-md uppercase tracking-wider">Prestasi</div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-[#FFC107] transition-colors line-clamp-2">Delegasi UMI Raih Juara {{ $i }} Nasional</h3>
                        <p class="text-gray-400 text-sm mb-6 line-clamp-3 flex-grow">Kabar gembira datang dari tim riset Perisai UMI yang sukses memenangkan ajang lomba karya tulis ilmiah tingkat nasional di Universitas Brawijaya.</p>
                        <a href="{{ route('activity.detailnews') }}" class="inline-block text-center w-full bg-transparent border-2 border-[#FFC107] text-[#FFC107] hover:bg-[#FFC107] hover:text-black font-bold py-2.5 rounded-xl transition-colors">Lihat Detail</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection