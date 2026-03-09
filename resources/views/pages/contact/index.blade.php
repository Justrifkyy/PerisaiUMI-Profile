@extends('layouts.app')

@section('title', 'Hubungi Kami - PERISAI UMI')

@push('styles')
<style>
    .font-bebas { font-family: 'Bebas Neue', sans-serif; }
    
    /* Efek Bintang Dekorasi Konsisten */
    .deco-star { position: absolute; background: #FFC107; clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); filter: drop-shadow(0 0 8px #FFC107); pointer-events: none; z-index: 0; }
    .deco-star.base { width: 14px; height: 14px; } .deco-star.sm { width: 8px; height: 8px; } .deco-star.lg { width: 20px; height: 20px; }
    @keyframes twinkle { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.3; transform: scale(0.6); } }
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; } .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; } .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }

    /* Form Styling */
    .input-field {
        width: 100%; background-color: #111; border: 1px solid #333; color: white;
        padding: 14px 20px; border-radius: 12px; font-size: 0.95rem;
        transition: all 0.3s ease; outline: none;
    }
    .input-field:focus { border-color: #FFC107; box-shadow: 0 0 15px rgba(255,193,7,0.15); background-color: #1a1a1a; }
</style>
@endpush

@section('content')
<div class="bg-[#050505] min-h-screen pb-24 relative overflow-hidden">
    
    <div class="deco-star lg twinkle-2" style="top: 250px; left: 15%;"></div>
    <div class="deco-star sm twinkle-1" style="top: 450px; right: 10%;"></div>
    <div class="deco-star base twinkle-3" style="bottom: 200px; left: 8%;"></div>
    <div class="absolute top-[300px] right-[-100px] w-[500px] h-[500px] bg-[#FFC107] rounded-full blur-[150px] opacity-5 pointer-events-none z-0"></div>
    <div class="absolute bottom-[-100px] left-[-100px] w-[400px] h-[400px] bg-[#FFC107] rounded-full blur-[150px] opacity-[0.03] pointer-events-none z-0"></div>

    <div class="relative w-full h-[400px] flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/gambarumi.png') }}" class="w-full h-full object-cover object-center" alt="Background UMI">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-[#050505] backdrop-blur-[2px]"></div>
        </div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            <h1 class="font-bebas text-6xl md:text-8xl text-[#FFC107] tracking-wider mb-2 drop-shadow-[0_0_15px_rgba(255,193,7,0.3)]">HUBUNGI KAMI</h1>
            <h2 class="text-white font-bold text-xl md:text-3xl tracking-[0.1em] uppercase drop-shadow-md">PUSAT PENGEMBANGAN RISET MAHASISWA</h2>
        </div>
    </div>

    <div class="relative z-10 max-w-[1440px] mx-auto px-6 md:px-12 xl:px-24 pt-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-start">
            
            <div data-aos="fade-right">
                
                <h3 class="text-4xl font-bold text-white mb-6 leading-tight">Mari Berkolaborasi dan<br>Berinovasi Bersama!</h3>
                <p class="text-gray-400 mb-10 text-lg leading-relaxed">
                    Apakah Anda memiliki pertanyaan, tawaran kerja sama, Mentoring, atau butuh bantuan terkait riset dan lomba? Tim kami siap merespons Anda.
                </p>

                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-[#111] border border-[#333] rounded-full flex items-center justify-center text-[#FFC107] text-xl mr-5 shadow-[0_0_15px_rgba(255,193,7,0.1)]">📧</div>
                        <div>
                            <h4 class="text-white font-bold text-lg mb-1">Email</h4>
                            <p class="text-gray-400">perisaiumi.umi.ac.id <br> <span class="text-sm opacity-60">(Estimasi balasan 1x24 jam)</span></p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-[#111] border border-[#333] rounded-full flex items-center justify-center text-[#FFC107] text-xl mr-5 shadow-[0_0_15px_rgba(255,193,7,0.1)]">📞</div>
                        <div>
                            <h4 class="text-white font-bold text-lg mb-1">Phone / WhatsApp</h4>
                            <p class="text-gray-400">+62 8958 0079 4794</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-[#111] border border-[#333] rounded-full flex items-center justify-center text-[#FFC107] text-xl mr-5 shadow-[0_0_15px_rgba(255,193,7,0.1)]">📍</div>
                        <div>
                            <h4 class="text-white font-bold text-lg mb-1">Alamat Kesekretariatan</h4>
                            <p class="text-gray-400 leading-relaxed">Jl. Urip Sumoharjo KM.5, Panaikang Kec. Panakkukang,<br>Kota Makassar, Sulawesi Selatan 90231</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-[#0a0a0a]/80 backdrop-blur-xl p-8 md:p-10 rounded-3xl border border-gray-800 shadow-[0_20px_50px_rgba(0,0,0,0.5)]" data-aos="fade-left">
                <h3 class="text-2xl font-bold text-[#FFC107] mb-6">Kirim Pesan Langsung</h3>
                
                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-gray-400 text-sm font-semibold mb-2">Nama Lengkap / Instansi</label>
                        <input type="text" name="name" class="input-field" placeholder="Masukkan nama Anda" required>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-gray-400 text-sm font-semibold mb-2">Alamat Email</label>
                            <input type="email" name="email" class="input-field" placeholder="email@contoh.com" required>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm font-semibold mb-2">No. WhatsApp</label>
                            <input type="text" name="phone" class="input-field" placeholder="08xx xxxx xxxx">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-400 text-sm font-semibold mb-2">Subjek Pesan</label>
                        <input type="text" name="subject" class="input-field" placeholder="Pertanyaan / Kerja Sama" required>
                    </div>

                    <div>
                        <label class="block text-gray-400 text-sm font-semibold mb-2">Isi Pesan</label>
                        <textarea name="message" rows="4" class="input-field resize-none" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#FFC107] text-black font-extrabold text-lg py-4 rounded-xl hover:bg-yellow-500 hover:-translate-y-1 transition-all shadow-[0_0_20px_rgba(255,193,7,0.3)] mt-4">
                        Kirim Pesan Sekarang
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection