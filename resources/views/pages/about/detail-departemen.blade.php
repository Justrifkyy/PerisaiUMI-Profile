@extends('layouts.app')

@section('title', '{{ $department->name }} - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    .badge-yellow { background-color: #FFC107; color: #000; font-weight: 800; padding: 6px 14px; border-radius: 8px; display: inline-block; font-size: 0.9rem; margin-bottom: 12px; }
    .text-content { color: #d1d5db; font-size: 1rem; line-height: 1.7; font-weight: 400; margin-bottom: 24px; }
    
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden">
    
    <div class="deco-star lg twinkle-2" style="top: 280px; right: 10%;"></div>
    <div class="deco-star sm twinkle-1" style="top: 500px; left: 8%;"></div>
    <div class="deco-star base twinkle-3" style="bottom: 200px; right: 15%;"></div>
    <div class="absolute top-[400px] right-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[150px] opacity-5 pointer-events-none z-0"></div>

    <div class="relative w-full h-[400px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-4xl md:text-7xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">{{ strtoupper($department->name) }}</h1>
            <h2 class="text-white font-bold text-lg md:text-2xl tracking-[0.1em] uppercase drop-shadow-md">{{ $department->slug }}</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-8">
        
        <div class="mb-12" data-aos="fade-up">
            <a href="{{ route('about.sumberdaya') }}" class="text-[#FFC107] hover:text-white flex items-center text-sm font-bold transition-colors">
                <span class="mr-2">←</span> Kembali ke Sumber Daya
            </a>
        </div>

        <!-- DESKRIPSI & FOTO GRUP -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-20">
            
            <div class="lg:col-span-2" data-aos="fade-right">
                <div>
                    <span class="badge-yellow">TENTANG DEPARTEMEN</span>
                    <p class="text-content">{{ $department->description ?? 'Departemen ' . $department->name . ' adalah bagian integral dari PERISAI UMI yang berperan aktif dalam pengembangan riset dan inovasi.' }}</p>
                </div>

                @if($department->vision)
                <div class="mt-10">
                    <span class="badge-yellow">VISI</span>
                    <p class="text-content">{{ $department->vision }}</p>
                </div>
                @endif

                @if($department->mission)
                <div class="mt-10">
                    <span class="badge-yellow">MISI</span>
                    <p class="text-content">{{ $department->mission }}</p>
                </div>
                @endif
            </div>

            <div data-aos="fade-left">
                @if($department->group_photo)
                <div class="w-full rounded-2xl overflow-hidden border border-gray-800 shadow-[0_0_30px_rgba(255,193,7,0.15)]">
                    <img src="{{ asset('storage/' . $department->group_photo) }}" alt="{{ $department->name }}" class="w-full h-auto object-cover">
                </div>
                @else
                <div class="w-full aspect-square rounded-2xl overflow-hidden border border-gray-800 shadow-[0_0_30px_rgba(255,193,7,0.15)] flex items-center justify-center bg-gradient-to-br from-gray-900 to-gray-800">
                    <p class="text-gray-500">Belum ada foto grup</p>
                </div>
                @endif
            </div>

        </div>

        <!-- ANGGOTA DEPARTEMEN -->
        @if($members && count($members) > 0)
        <div class="mb-20" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-10 border-b border-gray-800 pb-4">Anggota Departemen</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($members as $member)
                <div class="bg-[#111] border border-gray-800 rounded-xl overflow-hidden group hover:border-[#FFC107] hover:-translate-y-2 transition-all duration-300">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold text-sm line-clamp-2">{{ $member->name }}</h3>
                        <p class="text-[#FFC107] text-xs font-semibold mt-1 uppercase">{{ $member->position ?? 'Anggota' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- PROGRAM KERJA DEPARTEMEN -->
        @if($workPrograms && count($workPrograms) > 0)
        <div data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-10 border-b border-gray-800 pb-4">Program Kerja</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($workPrograms as $program)
                <a href="{{ route('activity.detail-proker', $program->slug) }}" class="bg-[#111] border border-gray-800 rounded-2xl overflow-hidden group hover:border-[#FFC107] hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="relative w-full aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $program->cover_image) }}" alt="{{ $program->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-white font-bold text-lg mb-2 group-hover:text-[#FFC107] transition-colors line-clamp-2">{{ $program->name }}</h3>
                        <p class="text-gray-400 text-sm line-clamp-2 flex-grow">{{ Str::limit($program->short_description ?? $program->content, 80) }}</p>
                        <span class="text-[#FFC107] text-sm font-semibold mt-4">Lihat Detail →</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
