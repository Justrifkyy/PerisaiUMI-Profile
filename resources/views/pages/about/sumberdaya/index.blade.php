@extends('layouts.app')

@section('title', 'Sumber Daya - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    .title-yellow { font-family: 'Bebas Neue', sans-serif; color: #FFC107; font-size: 2.5rem; letter-spacing: 0.05em; text-align: center; margin-bottom: 24px; }
    
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }

    /* --- STYLE KARTU PROFIL & LINKEDIN --- */
    .profile-card { background-color: #111; border-radius: 16px; overflow: hidden; aspect-ratio: 3/4; position: relative; transition: transform 0.4s ease, box-shadow 0.4s ease; border: 1px solid #333; z-index: 10; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
    .profile-card:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(255,193,7,0.25); border-color: #FFC107; }
    .profile-img { width: 100%; height: 100%; object-fit: cover; opacity: 0.85; transition: transform 0.5s ease; }
    .profile-card:hover .profile-img { transform: scale(1.08); opacity: 1; }
    /* Area Overlay ditinggikan sedikit agar tombol LinkedIn muat */
    .profile-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, #FFC107 0%, rgba(255,193,7,0.95) 45%, transparent 100%); padding: 50px 10px 20px; text-align: center; }
    .profile-name { color: #000; font-weight: 900; font-size: 1.1rem; line-height: 1.2; text-shadow: 0 2px 4px rgba(255,255,255,0.3); }
    .profile-role { color: #222; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 8px; }
    
    /* Tombol LinkedIn (Hitam ke Biru) */
    .profile-linkedin { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: #111; color: #FFC107; border-radius: 50%; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.3); }
    .profile-linkedin:hover { background: #0a66c2; color: #fff; transform: scale(1.15) translateY(-2px); box-shadow: 0 8px 15px rgba(10,102,194,0.4); }

    /* --- MARQUEE SCROLL (ANIMASI KE KIRI) --- */
    .marquee-wrapper { overflow: hidden; width: 100%; padding: 20px 0; position: relative; }
    .marquee-wrapper::before, .marquee-wrapper::after { content: ""; position: absolute; top: 0; bottom: 0; width: 80px; z-index: 20; pointer-events: none; }
    .marquee-wrapper::before { left: 0; background: linear-gradient(to right, #050505, transparent); }
    .marquee-wrapper::after { right: 0; background: linear-gradient(to left, #050505, transparent); }
    .marquee-content { display: flex; width: max-content; gap: 24px; animation: scroll-left 25s linear infinite; padding-left: 24px; }
    .marquee-wrapper:hover .marquee-content { animation-play-state: paused; }
    @keyframes scroll-left { 0% { transform: translateX(0); } 100% { transform: translateX(calc(-50% - 12px)); } }

    /* --- STYLE KARTU DEPARTEMEN --- */
    .dept-card { background-color: #111; border-radius: 20px; overflow: hidden; border: 1px solid #333; position: relative; aspect-ratio: 16/10; transition: all 0.4s ease; z-index: 10; box-shadow: 0 10px 30px rgba(0,0,0,0.5); cursor: pointer; }
    .dept-card:hover { transform: scale(1.03); border-color: #FFC107; box-shadow: 0 15px 40px rgba(255,193,7,0.2); }
    .dept-title { position: absolute; top: 15px; left: 20px; font-family: 'Bebas Neue', sans-serif; font-size: 3.5rem; color: transparent; -webkit-text-stroke: 1.2px #FFC107; opacity: 0.9; z-index: 1; line-height: 1; transition: opacity 0.3s; }
    .dept-card:hover .dept-title { opacity: 1; text-shadow: 0 0 20px rgba(255,193,7,0.4); }
    .dept-img { position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); height: 85%; width: auto; max-width: 95%; object-fit: contain; object-position: bottom; z-index: 2; transition: transform 0.5s ease; filter: drop-shadow(0 -10px 20px rgba(0,0,0,0.5)); }
    .dept-card:hover .dept-img { transform: translateX(-50%) scale(1.05); }
    .btn-pelajari { position: absolute; bottom: 15px; right: 15px; background: #FFC107; color: #000; font-weight: 800; font-size: 0.8rem; padding: 6px 20px; border-radius: 8px; z-index: 3; transition: all 0.3s ease; }
    .dept-card:hover .btn-pelajari { background: #fff; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(255,255,255,0.3); }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-20 relative overflow-hidden">
    
    <div class="deco-star lg twinkle-1" style="top: 350px; left: 8%;"></div>
    <div class="deco-star sm twinkle-2" style="top: 600px; right: 10%;"></div>
    <div class="deco-star base twinkle-3" style="top: 1200px; left: 12%;"></div>
    <div class="deco-star lg twinkle-2" style="bottom: 400px; right: 5%;"></div>
    <div class="absolute top-[600px] right-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[150px] opacity-[0.05] pointer-events-none z-0"></div>
    <div class="absolute bottom-[200px] left-[-150px] w-[600px] h-[600px] bg-[#FFC107] rounded-full blur-[200px] opacity-[0.05] pointer-events-none z-0"></div>

    <div class="relative w-full h-[400px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">SUMBER DAYA</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase drop-shadow-md">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="relative z-10 mx-auto pt-8">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24">
            @include('pages.about.sumberdaya.inti')
        </div>
        
        @include('pages.about.sumberdaya.kadep')
        @include('pages.about.sumberdaya.staff')
        
        <div class="max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24">
            @include('pages.about.sumberdaya.departemen')
        </div>
    </div>
</div>
@endsection