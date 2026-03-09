@extends('layouts.app')

@section('title', 'Detail Proker - PERISAI UMI')

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden pt-10">
    <div class="max-w-[1000px] mx-auto px-6 md:px-12">
        
        <div class="mb-8" data-aos="fade-up">
            <a href="{{ route('activity.proker') }}" class="text-[#FFC107] hover:text-white flex items-center text-sm font-bold mb-6 transition-colors">
                <span class="mr-2">←</span> Kembali ke Semua Proker
            </a>
            <div class="inline-block bg-[#FFC107] text-black font-bold px-3 py-1 rounded-md text-xs uppercase tracking-wider mb-4">Proker</div>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight">Focus Group Discussion (FGD) Vol 1</h1>
            <p class="text-gray-400 text-sm">Dipublikasikan pada: <span class="text-white">25 Oktober 2026</span></p>
        </div>

        <div class="w-full aspect-[16/9] rounded-2xl overflow-hidden mb-10 border border-gray-800" data-aos="fade-up">
            <img src="https://via.placeholder.com/1200x675.png?text=Foto+Utama+Proker" class="w-full h-full object-cover" alt="Proker Main">
        </div>

        <div class="prose prose-invert max-w-none mb-16 text-gray-300 leading-relaxed text-lg" data-aos="fade-up">
            <p>Ini adalah halaman detail untuk menjelaskan program kerja secara komprehensif. Admin dapat menginput paragraf panjang melalui CMS.</p>
            <p>Focus Group Discussion (FGD) adalah forum diskusi sistematis yang diadakan untuk mengkaji isu-isu strategis seputar dunia riset, inovasi, dan teknologi. Melalui kegiatan ini, mahasiswa diajak berpikir kritis dan menyampaikan gagasan mereka di ruang publik.</p>
            <h3 class="text-white font-bold text-2xl mt-8 mb-4">Tujuan Kegiatan</h3>
            <ul class="list-disc pl-6 space-y-2">
                <li>Meningkatkan kemampuan berpikir kritis mahasiswa UMI.</li>
                <li>Menemukan solusi kolaboratif dari permasalahan sosial melalui pendekatan riset.</li>
                <li>Membangun iklim akademik yang kompetitif.</li>
            </ul>
        </div>

        <div data-aos="fade-up">
            <h3 class="text-2xl font-bold text-[#FFC107] mb-6 border-b border-gray-800 pb-3">Galeri Dokumentasi</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @for ($i = 1; $i <= 6; $i++)
                <div class="w-full aspect-square rounded-xl overflow-hidden border border-gray-800 cursor-pointer hover:border-[#FFC107] transition-colors">
                    <img src="https://via.placeholder.com/600x600.png?text=Dokumentasi+{{$i}}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500" alt="Dokumentasi">
                </div>
                @endfor
            </div>
        </div>

    </div>
</div>
@endsection