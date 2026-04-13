@extends('layouts.app')

@section('title', 'Struktur Organisasi - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
    
    .org-container { background: linear-gradient(135deg, #111 0%, #0a0a0a 100%); border-radius: 20px; padding: 40px; border: 1px solid #333; }
    .org-level { margin-bottom: 40px; }
    .org-title { color: #FFC107; font-size: 1.3rem; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 20px; text-align: center; }
    .member-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
    .member-card { background: #1a1a1a; border: 1px solid #333; border-radius: 12px; padding: 15px; text-align: center; transition: all 0.3s ease; }
    .member-card:hover { border-color: #FFC107; box-shadow: 0 0 20px rgba(255, 193, 7, 0.2); transform: translateY(-4px); }
    .member-name { color: white; font-weight: bold; font-size: 1rem; margin-bottom: 5px; }
    .member-position { color: #FFC107; font-size: 0.85rem; text-transform: uppercase; font-weight: 700; }
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
        
        <div class="org-container" data-aos="fade-up">
            
            <!-- PEMBINA -->
            @if($pembina && count($pembina) > 0)
            <div class="org-level">
                <div class="org-title">🎓 Pembina</div>
                <div class="member-grid">
                    @foreach($pembina as $member)
                    <div class="member-card">
                        <div class="member-name">{{ $member->name }}</div>
                        <div class="member-position">{{ $member->position ?? 'Pembina' }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <hr class="border-gray-800 my-8">

            <!-- PENGURUS INTI -->
            @if($inti && count($inti) > 0)
            <div class="org-level">
                <div class="org-title">⭐ Pengurus Inti</div>
                <div class="member-grid">
                    @foreach($inti as $member)
                    <div class="member-card">
                        <div class="member-name">{{ $member->name }}</div>
                        <div class="member-position">{{ $member->position ?? 'Pengurus Inti' }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <hr class="border-gray-800 my-8">

            <!-- KEPALA DEPARTEMEN -->
            @if($kadep && count($kadep) > 0)
            <div class="org-level">
                <div class="org-title">📊 Kepala Departemen</div>
                <div class="member-grid">
                    @foreach($kadep as $member)
                    <div class="member-card">
                        <div class="member-name">{{ $member->name }}</div>
                        <div class="member-position">{{ $member->department?->name ?? 'Departemen' }}</div>
                        <p class="text-gray-500 text-xs mt-2 pt-2 border-t border-gray-700">{{ $member->position ?? 'Kadep' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <hr class="border-gray-800 my-8">

            <!-- STAF AHLI -->
            @if($staf && count($staf) > 0)
            <div class="org-level">
                <div class="org-title">👥 Staf Ahli</div>
                <div class="member-grid">
                    @foreach($staf->take(12) as $member)
                    <div class="member-card">
                        <div class="member-name text-sm">{{ $member->name }}</div>
                        <div class="member-position text-xs">{{ $member->position ?? 'Staf' }}</div>
                    </div>
                    @endforeach
                </div>
                @if($staf->count() > 12)
                <p class="text-gray-500 text-center mt-6 text-sm">...dan {{ $staf->count() - 12 }} staf ahli lainnya</p>
                @endif
            </div>
            @endif

        </div>

    </div>
</div>
@endsection
