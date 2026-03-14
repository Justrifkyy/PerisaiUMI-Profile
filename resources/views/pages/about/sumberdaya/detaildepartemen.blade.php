@extends('layouts.app')

@section('title', 'Detail Departemen - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }

    /* Kartu Profil Kadep & Staf */
    .profile-card { background-color: #111; border-radius: 16px; overflow: hidden; aspect-ratio: 3/4; position: relative; transition: transform 0.4s, box-shadow 0.4s; border: 1px solid #333; z-index: 10; width: 100%; max-width: 320px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
    .profile-card:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(255,193,7,0.25); border-color: #FFC107; }
    .profile-img { width: 100%; height: 100%; object-fit: cover; opacity: 0.85; transition: transform 0.5s ease; }
    .profile-card:hover .profile-img { transform: scale(1.08); opacity: 1; }
    .profile-overlay { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, #FFC107 0%, rgba(255,193,7,0.95) 45%, transparent 100%); padding: 50px 10px 20px; text-align: center; }
    .profile-name { color: #000; font-weight: 900; font-size: 1.1rem; line-height: 1.2; text-shadow: 0 2px 4px rgba(255,255,255,0.3); }
    .profile-role { color: #222; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 8px; }
    .profile-linkedin { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: #111; color: #FFC107; border-radius: 50%; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0,0,0,0.3); }
    .profile-linkedin:hover { background: #0a66c2; color: #fff; transform: scale(1.15) translateY(-2px); box-shadow: 0 8px 15px rgba(10,102,194,0.4); }

    /* CSS 3D FLIP CARD UNTUK PROKER */
    .flip-card { background-color: transparent; aspect-ratio: 1 / 1; perspective: 1000px; cursor: pointer; }
    .flip-card-inner { position: relative; width: 100%; height: 100%; text-align: center; transition: transform 0.8s cubic-bezier(0.4, 0.2, 0.2, 1); transform-style: preserve-3d; }
    .flip-card:hover .flip-card-inner { transform: rotateY(180deg); }
    .flip-card-front, .flip-card-back { position: absolute; width: 100%; height: 100%; -webkit-backface-visibility: hidden; backface-visibility: hidden; border-radius: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
    .flip-card-front { background-color: #111; border: 2px solid #333; color: white; }
    .flip-card:hover .flip-card-front { border-color: #FFC107; }
    .flip-card-back { background: linear-gradient(135deg, #FFC107 0%, #e6ac00 100%); color: #000; transform: rotateY(180deg); border: 2px solid #FFC107; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden">
    
    <div class="deco-star lg twinkle-2" style="top: 300px; left: 10%;"></div>
    <div class="deco-star sm twinkle-1" style="top: 500px; right: 15%;"></div>
    <div class="absolute top-[250px] right-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[180px] opacity-[0.05] pointer-events-none z-0"></div>

    <div class="relative w-full h-[350px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h2 class="text-white font-bold text-xl md:text-2xl tracking-[0.2em] uppercase mb-2 drop-shadow-md">DEPARTEMEN</h2>
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">RISTEK</h1>
        </div>
    </div>

    <div class="relative z-10 max-w-[1200px] mx-auto px-6 md:px-12 pt-8">
        
        <div class="mb-12" data-aos="fade-right">
            <a href="{{ route('about.sumberdaya') }}" class="text-[#FFC107] hover:text-white flex items-center text-sm font-bold transition-colors w-fit">
                <span class="mr-2">←</span> Kembali ke Sumber Daya
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-16 items-start mb-24">
            <div class="md:col-span-4 lg:col-span-4" data-aos="fade-up">
                <h3 class="text-center text-gray-400 font-bold text-sm tracking-widest uppercase mb-4">Kepala Departemen</h3>
                <div class="profile-card">
                    <img src="https://via.placeholder.com/500x650.png?text=Foto+Kadep" alt="Kepala Departemen" class="profile-img">
                    <div class="profile-overlay">
                        <div class="profile-name">Nama Lengkap Kadep</div>
                        <span class="profile-role">KADEP RISTEK</span>
                        <a href="https://linkedin.com/in/username" target="_blank" class="profile-linkedin" title="Kunjungi LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="md:col-span-8 lg:col-span-8" data-aos="fade-left">
                <h3 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Tentang <span class="text-[#FFC107]">Departemen</span></h3>
                <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed text-lg mb-10">
                    <p>Departemen Riset dan Teknologi (RISTEK) adalah jantung dari inovasi di UKM Perisai UMI. Kami berfokus pada pengembangan purwarupa, riset terapan, teknologi tepat guna, dan inovasi digital yang mampu memberikan solusi nyata bagi permasalahan di masyarakat.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div>
                        <h4 class="text-[#FFC107] font-bold text-2xl mb-3 tracking-widest uppercase">Visi</h4>
                        <p class="text-gray-300 leading-relaxed text-base">Mewujudkan RISTEK sebagai pusat inovasi dan riset mahasiswa terdepan yang adaptif, solutif, dan berdampak nyata bagi almamater dan masyarakat.</p>
                    </div>
                    <div>
                        <h4 class="text-[#FFC107] font-bold text-2xl mb-3 tracking-widest uppercase">Misi</h4>
                        <ul class="list-disc pl-5 text-gray-300 space-y-2 marker:text-[#FFC107] text-base leading-relaxed">
                            <li>Mengembangkan kompetensi anggota dalam penulisan ilmiah dan penelitian.</li>
                            <li>Menciptakan inovasi teknologi tepat guna secara berkelanjutan.</li>
                            <li>Menjalin kolaborasi riset lintas fakultas.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-32" data-aos="fade-up">
            <div class="text-center mb-10">
                <h3 class="font-bebas text-4xl md:text-5xl text-white tracking-wide">PROGRAM KERJA <span class="text-[#FFC107]">UNGGULAN</span></h3>
                <p class="text-gray-400 mt-2 text-lg">Arahkan kursor ke kartu untuk melihat deskripsi</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @for($i=1; $i<=4; $i++)
                <div class="flip-card" data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="w-16 h-16 bg-[#1a1a1a] rounded-full flex items-center justify-center text-[#FFC107] mb-4 border border-gray-700">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                            </div>
                            <h4 class="text-2xl font-bold text-center leading-tight mb-2">Pekan Riset Mahasiswa {{$i}}</h4>
                            <span class="bg-[#1a1a1a] px-3 py-1 rounded-md text-[#FFC107] text-xs font-bold uppercase tracking-widest mt-2">RISTEK</span>
                        </div>
                        <div class="flip-card-back">
                            <h4 class="text-xl font-black mb-3 border-b border-black/20 pb-2">Deskripsi Proker</h4>
                            <p class="font-semibold text-sm leading-relaxed text-black/80">
                                Ini adalah deskripsi dari Program Kerja. Kegiatan ini bertujuan untuk mewadahi inovasi dan pameran hasil karya mahasiswa UMI untuk meningkatkan daya saing nasional.
                            </p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div data-aos="fade-up">
            <div class="text-center mb-12">
                <h3 class="font-bebas text-4xl md:text-5xl text-white tracking-wide">STAF AHLI <span class="text-[#FFC107]">DEPARTEMEN</span></h3>
                <p class="text-gray-400 mt-2 text-lg">Keluarga Besar Inovator Penggerak Departemen RISTEK</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @for($i=1; $i<=8; $i++)
                <div class="profile-card" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    <img src="https://via.placeholder.com/400x500.png?text=Staf+{{$i}}" alt="Staf Departemen" class="profile-img">
                    <div class="profile-overlay">
                        <div class="profile-name">Nama Staf {{$i}}</div>
                        <span class="profile-role">STAF AHLI RISTEK</span>
                        <a href="https://linkedin.com/in/username" target="_blank" class="profile-linkedin" title="Kunjungi LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection