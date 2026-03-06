@extends('layouts.app')

@section('title', 'Hubungi Kami - PERISAI UMI')

@section('content')
    <section class="bg-black py-16 md:py-24 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                HUBUNGI <span class="text-yellow-400">KAMI</span>
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Kami siap membantu Anda! Hubungi kami untuk informasi lebih lanjut tentang PERISAI UMI, program kegiatan, atau kerjasama. Tim kami akan merespons pertanyaan Anda dengan cepat.
            </p>
        </div>
    </section>

    <section class="bg-zinc-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <div class="bg-black border border-gray-800 rounded-2xl p-8">
                    <h2 class="text-yellow-400 text-2xl font-bold mb-6">Kirim Pesan</h2>

                    @if (session('success'))
                        <div class="bg-green-500/10 border border-green-500 text-green-500 px-4 py-3 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-white text-sm font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-yellow-400" placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div>
                            <label for="email" class="block text-white text-sm font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-yellow-400" placeholder="nama@email.com">
                        </div>
                        <div>
                            <label for="subject" class="block text-white text-sm font-medium mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-yellow-400" placeholder="Subjek pesan Anda">
                        </div>
                        <div>
                            <label for="message" class="block text-white text-sm font-medium mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" required class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white focus:outline-none focus:border-yellow-400 resize-none" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-yellow-400 text-black font-bold py-3 px-6 rounded-lg hover:bg-yellow-500 transition duration-300">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <div class="space-y-6">
                    <h2 class="text-yellow-400 text-2xl font-bold mb-6">Informasi Kontak</h2>

                    <div class="bg-black rounded-lg p-6 border border-gray-800 flex items-start space-x-4">
                        <div class="text-yellow-400 mt-1">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-white text-lg font-bold mb-1">Email</h3>
                            <p class="text-yellow-400 font-semibold mb-1">perisai@umi.ac.id</p>
                            <p class="text-gray-400 text-sm">Kirim email untuk pertanyaan atau kerjasama</p>
                        </div>
                    </div>

                    <div class="bg-black rounded-lg p-6 border border-gray-800 flex items-start space-x-4">
                        <div class="text-yellow-400 mt-1">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-white text-lg font-bold mb-1">Telepon</h3>
                            <p class="text-yellow-400 font-semibold mb-1">+62 812-3456-7890</p>
                            <p class="text-gray-400 text-sm">Hubungi kami melalui telepon</p>
                        </div>
                    </div>

                    <div class="bg-black rounded-lg p-6 border border-gray-800 flex items-start space-x-4">
                        <div class="text-yellow-400 mt-1">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <h3 class="text-white text-lg font-bold mb-1">Alamat</h3>
                            <p class="text-yellow-400 font-semibold mb-1">Universitas Muslim Indonesia</p>
                            <p class="text-gray-400 text-sm">Jl. Urip Sumoharjo KM.5, Makassar, Sulawesi Selatan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection