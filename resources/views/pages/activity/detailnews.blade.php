@extends('layouts.app')

@section('title', 'Detail Berita - PERISAI UMI')

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden pt-10">
    <div class="max-w-[1000px] mx-auto px-6 md:px-12">
        
        <div class="mb-8" data-aos="fade-up">
            <a href="{{ route('activity.news') }}" class="text-[#FFC107] hover:text-white flex items-center text-sm font-bold mb-6 transition-colors">
                <span class="mr-2">←</span> Kembali ke Semua Berita
            </a>
            <div class="inline-block bg-[#FFC107] text-black font-bold px-3 py-1 rounded-md text-xs uppercase tracking-wider mb-4">Prestasi</div>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight">Delegasi UMI Raih Juara 1 Nasional di UI</h1>
            <p class="text-gray-400 text-sm">Ditulis oleh Admin | <span class="text-white">10 November 2026</span></p>
        </div>

        <div class="w-full aspect-[16/9] rounded-2xl overflow-hidden mb-10 border border-gray-800" data-aos="fade-up">
            <img src="https://via.placeholder.com/1200x675.png?text=Foto+Utama+Berita" class="w-full h-full object-cover" alt="Berita Main">
        </div>

        <div class="prose prose-invert max-w-none mb-16 text-gray-300 leading-relaxed text-lg" data-aos="fade-up">
            <p>Delegasi dari UKM Perisai UMI berhasil mengharumkan nama almamater Universitas Muslim Indonesia di kancah nasional. Tim yang terdiri dari 3 mahasiswa Fakultas Teknik ini berhasil menyabet juara pertama pada ajang Lomba Karya Tulis Ilmiah (LKTI) tingkat nasional yang diselenggarakan di Universitas Indonesia.</p>
            <p>Karya tulis inovatif yang mereka presentasikan berfokus pada pemanfaatan limbah organik menjadi energi terbarukan. Hal ini mendapat apresiasi yang sangat tinggi dari para dewan juri.</p>
            <blockquote class="border-l-4 border-[#FFC107] pl-4 my-6 italic text-gray-200">
                "Ini adalah bukti nyata bahwa mahasiswa UMI mampu bersaing di level nasional dan memberikan solusi konkret bagi bangsa." - Ketua Umum Perisai UMI.
            </blockquote>
        </div>

        <div data-aos="fade-up">
            <h3 class="text-2xl font-bold text-[#FFC107] mb-6 border-b border-gray-800 pb-3">Galeri Kegiatan</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @for ($i = 1; $i <= 3; $i++)
                <div class="w-full aspect-square rounded-xl overflow-hidden border border-gray-800 cursor-pointer hover:border-[#FFC107] transition-colors">
                    <img src="https://via.placeholder.com/600x600.png?text=Foto+{{$i}}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500" alt="Galeri">
                </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection