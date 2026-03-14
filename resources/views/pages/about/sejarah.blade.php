@extends('layouts.app')

@section('title', 'Sejarah - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    /* Badge diperbagus dengan shadow */
    .badge-yellow { background-color: #FFC107; color: #000; font-weight: 800; padding: 6px 14px; border-radius: 8px; display: inline-block; font-size: 0.9rem; margin-bottom: 12px; shadow-[0_4px_15px_rgba(255,193,7,0.3)]; }
    .text-content { color: #d1d5db; font-size: 1rem; line-height: 1.7; font-weight: 400; margin-bottom: 32px; }

    /* Efek Bintang */
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-20 relative overflow-hidden">
    
    <div class="deco-star base twinkle-1" style="top: 250px; left: 8%;"></div>
    <div class="deco-star sm twinkle-2" style="top: 450px; right: 12%;"></div>
    <div class="deco-star lg twinkle-3" style="top: 700px; left: 5%;"></div>
    <div class="deco-star sm twinkle-1" style="bottom: 150px; right: 8%;"></div>
    <div class="deco-star base twinkle-2" style="bottom: 50px; left: 20%;"></div>

    <div class="absolute top-[300px] left-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[150px] opacity-5 pointer-events-none z-0"></div>
    <div class="absolute bottom-[100px] right-[-100px] w-[400px] h-[400px] bg-[#FFC107] rounded-full blur-[120px] opacity-5 pointer-events-none z-0"></div>

    <div class="relative w-full h-[400px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">SEJARAH</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase drop-shadow-md">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20">
            
            <div class="lg:col-span-8" data-aos="fade-right">
                <div>
                    <span class="badge-yellow">Sejarah PERISAI UMI (Pusat Pengembangan Riset Mahasiswa UMI)</span>
                    <p class="text-content">PERISAI UMI merupakan Unit Kegiatan Mahasiswa (UKM) resmi Universitas Muslim Indonesia yang berfokus pada pengembangan penalaran, riset, inovasi, dan kompetisi ilmiah. UKM ini lahir sebagai respon atas meningkatnya kebutuhan mahasiswa UMI untuk memiliki wadah pembinaan yang terarah dalam karya tulis ilmiah, PKM, penelitian, dan pengembangan teknologi.</p>
                </div>
                <div>
                    <span class="badge-yellow">Awal Berdiri</span>
                    <div class="text-content">PERISAI UMI dibentuk oleh sekelompok mahasiswa yang aktif dalam kegiatan akademik dan riset, yang melihat bahwa UMI memerlukan komunitas formal untuk:
                        <ul class="list-disc pl-6 mt-3 space-y-2 marker:text-[#FFC107]">
                            <li>Meningkatkan budaya ilmiah.</li>
                            <li>Mendorong mahasiswa ikut lomba tingkat regional hingga nasional.</li>
                            <li>Mempersiapkan kader unggul.</li>
                            <li>Mengembangkan inovasi di bidang teknologi dan penelitian sosial.</li>
                        </ul>
                        <p class="mt-3">Melalui dukungan pimpinan universitas dan semangat para pendiri, PERISAI UMI resmi disahkan sebagai UKM yang menaungi kegiatan riset dan inovasi mahasiswa.</p>
                    </div>
                </div>
                <div>
                    <span class="badge-yellow">Perkembangan dan Kontribusi</span>
                    <div class="text-content">Sejak berdiri, PERISAI UMI terus berkembang melalui:
                        <ul class="list-disc pl-6 mt-3 space-y-2 marker:text-[#FFC107]">
                            <li>Pembentukan 6 departemen fungsional: PSDM, KOMPRES, HUMAS, RISTEK, Penalaran, dan Media.</li>
                            <li>Pembinaan intensif karya ilmiah, PKM, riset, dan teknologi.</li>
                            <li>Keterlibatan aktif dalam event nasional.</li>
                            <li>Pencapaian prestasi mahasiswa UMI di berbagai lomba dan kompetisi.</li>
                        </ul>
                        <p class="mt-3">PERISAI UMI juga menjadi rumah bagi para "Inovator" sebutan bagi anggotanya, untuk berkolaborasi, berkreasi, dan berkontribusi bagi kampus.</p>
                    </div>
                </div>
                <div>
                    <span class="badge-yellow">Peran di UMI</span>
                    <div class="text-content">UKM ini kini menjadi garda terdepan dalam:
                        <ul class="list-disc pl-6 mt-3 space-y-2 marker:text-[#FFC107]">
                            <li>Pengembangan budaya akademik.</li>
                            <li>Pembinaan mahasiswa berprestasi.</li>
                            <li>Penguatan identitas UMI sebagai kampus riset dan inovasi.</li>
                            <li>Membawa nama baik kampus melalui berbagai prestasi ilmiah.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-8" data-aos="fade-left">
                <div class="w-full aspect-square rounded-2xl overflow-hidden shadow-[0_0_30px_rgba(255,193,7,0.1)] border border-gray-800 group">
                    <img src="https://via.placeholder.com/600x600.png?text=Dokumentasi+Sejarah+1" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Sejarah 1">
                </div>
                <div class="w-full aspect-square rounded-2xl overflow-hidden shadow-[0_0_30px_rgba(255,193,7,0.1)] border border-gray-800 group">
                    <img src="https://via.placeholder.com/600x600.png?text=Dokumentasi+Sejarah+2" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Sejarah 2">
                </div>
                <div class="w-full aspect-square rounded-2xl overflow-hidden shadow-[0_0_30px_rgba(255,193,7,0.1)] border border-gray-800 group">
                    <img src="https://via.placeholder.com/600x600.png?text=Dokumentasi+Sejarah+3" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Sejarah 3">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection