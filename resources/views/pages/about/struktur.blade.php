@extends('layouts.app')

@section('title', 'Struktur Organisasi - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-20">
    
    <div class="relative w-full h-[400px] flex items-center justify-center overflow-hidden border-b border-gray-800">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover" alt="Background UMI">
            <div class="absolute inset-0 bg-black/80 backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">STRUKTUR ORGANISASI</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-16">
        <div class="w-full" data-aos="fade-up">
            
            <ol class="list-decimal pl-6 text-gray-200 text-lg md:text-xl line-height-[1.8] font-medium space-y-3 mb-12">
                <li><strong class="text-white">Struktur PERISAI UMI terdiri dari:</strong> Pembina, Dewan Pertimbangan Organisasi, pengurus inti dan staf ahli</li>
                <li><strong class="text-white">Pembina</strong> adalah orang yang diamanahkan oleh birokrasi dalam hal ini Wakil Rektor III Universitas Muslim Indonesia</li>
                <li><strong class="text-white">Dewan Pertimbangan Organisasi</strong> adalah demisioner PERISAI UMI yang berjumlah 7 orang.</li>
                <li><strong class="text-white">Pengurus inti</strong> meliputi Ketua, Sekretaris, Bendahara dan Kepala Departemen</li>
                <li><strong class="text-white">Staf Ahli</strong> adalah semua pengurus selain pengurus inti</li>
                <li><strong class="text-white">Anggota biasa</strong> adalah generasi baru PERISAI UMI</li>
            </ol>

            <div class="w-full bg-white rounded-xl overflow-hidden shadow-[0_0_30px_rgba(255,193,7,0.15)] p-4 md:p-8">
                <img src="https://via.placeholder.com/1200x600.png?text=Bagan+Struktur+Organisasi" alt="Bagan Struktur Organisasi" class="w-full h-auto object-contain">
            </div>

        </div>
    </div>
</div>
@endsection