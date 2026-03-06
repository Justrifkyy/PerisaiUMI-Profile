@extends('layouts.app')

@section('title', 'Kegiatan & Aktivitas - PERISAI UMI')

@section('content')
    <section class="bg-black py-16 md:py-24 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                KEGIATAN & <span class="text-yellow-400">AKTIVITAS</span>
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                PERISAI UMI aktif menyelenggarakan berbagai kegiatan yang mendukung pengembangan riset, inovasi, dan prestasi mahasiswa. Dari workshop, seminar, hingga program pengabdian masyarakat.
            </p>
        </div>
    </section>

    <section class="bg-zinc-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($activities as $activity)
                    <div class="bg-black border border-gray-800 rounded-xl overflow-hidden group hover:border-yellow-400 transition duration-300">
                        <div class="aspect-video overflow-hidden">
                            <img src="{{ asset('storage/' . $activity->image) }}" alt="{{ $activity->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-yellow-400 font-bold mb-2">{{ \Carbon\Carbon::parse($activity->published_at)->format('d F Y') }}</div>
                            <h3 class="text-xl font-bold text-white mb-3 group-hover:text-yellow-400 transition">{{ $activity->title }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-3">{{ $activity->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        Belum ada data kegiatan yang dipublikasikan.
                    </div>
                @endforelse
            </div>

            <div class="mt-12 flex justify-center">
                {{ $activities->links() }}
            </div>
        </div>
    </section>
@endsection