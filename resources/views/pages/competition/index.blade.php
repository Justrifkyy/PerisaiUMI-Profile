@extends('layouts.app')

@section('title', 'Prestasi & Kompetisi - PERISAI UMI')

@section('content')
    <section class="bg-black py-16 md:py-24 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                PRESTASI & <span class="text-yellow-400">KOMPETISI</span>
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Pencapaian gemilang dan rekam jejak juara kader PERISAI UMI dalam berbagai ajang kompetisi ilmiah, riset, dan inovasi di tingkat regional, nasional, hingga internasional.
            </p>
        </div>
    </section>

    <section class="bg-zinc-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($competitions as $competition)
                    <div class="bg-black border border-gray-800 rounded-xl overflow-hidden group hover:border-yellow-400 transition duration-300">
                        <div class="aspect-video overflow-hidden relative">
                            <div class="absolute top-4 right-4 bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full z-10">
                                WINNER
                            </div>
                            <img src="{{ asset('storage/' . $competition->image) }}" alt="{{ $competition->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-3 group-hover:text-yellow-400 transition">{{ $competition->title }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-3">{{ $competition->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        Belum ada data prestasi yang dipublikasikan.
                    </div>
                @endforelse
            </div>

            <div class="mt-12 flex justify-center">
                {{ $competitions->links() }}
            </div>
        </div>
    </section>
@endsection