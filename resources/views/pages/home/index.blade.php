@extends('layouts.app')

@section('title', 'Beranda - PERISAI UMI')

@section('content')
    <section id="home" class="bg-black py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white tracking-tight">
                        UNIT KEGIATAN MAHASISWA<br>
                        <span class="text-yellow-400 text-2xl md:text-3xl lg:text-4xl block mt-2">PUSAT PENGEMBANGAN RISET MAHASISWA</span>
                        <span class="text-gray-400 text-lg md:text-xl font-normal block mt-1">UNIVERSITAS MUSLIM INDONESIA</span>
                    </h1>
                    <p class="text-gray-400 text-lg max-w-xl leading-relaxed">
                        PERISAI UMI adalah unit kegiatan mahasiswa yang berfokus pada pengembangan riset dan inovasi. Kami memberdayakan mahasiswa untuk mengembangkan potensi akademik dan penelitian melalui berbagai program dan kegiatan yang inspiratif.
                    </p>
                    <div class="pt-4">
                        <a href="{{ route('contact') }}" class="inline-block px-8 py-4 bg-yellow-400 text-black font-bold rounded-lg hover:bg-yellow-500 transition duration-300">
                            Contact Us
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block relative">
                    <div class="absolute inset-0 bg-yellow-400 rounded-full blur-3xl opacity-20"></div>
                    <img src="{{ asset('images/logo.png') }}" alt="Perisai Illustration" class="relative w-full max-w-md mx-auto">
                </div>
            </div>
        </div>
    </section>

    <section id="news" class="bg-zinc-900 py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-yellow-400 text-3xl font-bold mb-8 text-center">PERISAI NEWS</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($latestNews as $news)
                    <div class="group relative overflow-hidden rounded-2xl bg-black border border-gray-800 transition-all hover:border-yellow-400 shadow-lg">
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-xs text-yellow-400 mb-3 font-semibold">
                                <span>{{ $news->category ?? 'Berita' }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">{{ $news->title }}</h3>
                            <p class="text-gray-400 line-clamp-3">{{ $news->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-2">Belum ada berita terbaru.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="statistics" class="bg-black py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-semibold text-white">
                    Lebih dari <span class="text-yellow-400">150+</span> Inovator Telah Bergabung
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($statistics as $stat)
                    <div class="{{ $stat->bg_class ?? 'bg-zinc-800' }} rounded-2xl p-8 border border-gray-800 transition transform hover:-translate-y-2">
                        <div class="text-sm font-bold {{ $stat->text_class ?? 'text-gray-400' }} tracking-widest">{{ $stat->label }}</div>
                        <div class="text-xs text-gray-400 mt-1 mb-6">{!! $stat->period !!}</div>
                        <div class="text-7xl font-bold {{ $stat->number_class ?? 'text-yellow-400' }}">{{ $stat->number }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection