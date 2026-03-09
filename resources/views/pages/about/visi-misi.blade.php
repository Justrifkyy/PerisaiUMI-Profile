@extends('layouts.app')

@section('title', 'Visi & Misi - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    .badge-yellow { background-color: #FFC107; color: #000; font-weight: 800; padding: 4px 12px; border-radius: 6px; display: inline-block; font-size: 0.9rem; margin-bottom: 8px; }
    .text-content { color: #d1d5db; font-size: 1rem; line-height: 1.6; font-weight: 400; margin-bottom: 32px; }

    /* Bintang */
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-20 relative overflow-hidden">
    
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
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">VISI, MISI, DAN TUJUAN</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase drop-shadow-md">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
            <div class="lg:col-span-8" data-aos="fade-right">
                <div>
                    <span class="badge-yellow">VISI PERISAI UMI</span>
                    <p class="text-content">Menjadi organisasi mahasiswa yang unggul dalam riset, inovasi, dan pengembangan penalaran ilmiah untuk menciptakan generasi inovator yang kompeten, berintegritas, dan berdaya saing di tingkat nasional maupun internasional.</p>
                </div>
                <div>
                    <span class="badge-yellow">MISI PERISAI UMI</span>
                    <ol class="list-decimal pl-6 text-content space-y-2">
                        <li>Mengembangkan budaya ilmiah di lingkungan mahasiswa melalui pembinaan riset, penalaran, dan inovasi.</li>
                        <li>Menyelenggarakan pelatihan, workshop, dan program pembinaan berkelanjutan untuk meningkatkan kompetensi anggota.</li>
                        <li>Mendorong mahasiswa aktif berpartisipasi pada kompetisi ilmiah seperti PKM, esai, debat, karya tulis, dan inovasi teknologi.</li>
                        <li>Memfasilitasi kolaborasi antar departemen dan antar lembaga demi menciptakan karya riset yang produktif dan bermanfaat.</li>
                        <li>Menjalin kemitraan dengan pihak kampus maupun eksternal untuk memperluas peluang pengembangan inovasi.</li>
                        <li>Menghadirkan lingkungan organisasi yang profesional, inklusif, dan berlandaskan nilai keislaman.</li>
                    </ol>
                </div>
                <div>
                    <span class="badge-yellow">TUJUAN</span>
                    <ol class="list-decimal pl-6 text-content space-y-2">
                        <li>Mencetak mahasiswa yang unggul dalam riset, PKM, dan inovasi teknologi.</li>
                        <li>Menjadi wadah pembinaan bagi mahasiswa UMI untuk mencapai prestasi ilmiah tingkat regional, nasional, hingga internasional.</li>
                        <li>Menghasilkan karya riset dan inovasi yang bermanfaat bagi masyarakat, kampus, dan pengembangan keilmuan.</li>
                        <li>Mewadahi kader-kader inovator untuk mengembangkan potensi akademik dan kreativitas secara maksimal.</li>
                        <li>Menguatkan reputasi UMI sebagai kampus yang aktif dalam pengembangan riset dan inovasi.</li>
                    </ol>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-6" data-aos="fade-left">
                <div class="w-full aspect-square bg-[#111] rounded-xl shadow-[0_0_20px_rgba(255,193,7,0.05)] border border-gray-800"></div>
                <div class="w-full aspect-square bg-[#111] rounded-xl shadow-[0_0_20px_rgba(255,193,7,0.05)] border border-gray-800"></div>
            </div>
        </div>
    </div>
</div>
@endsection