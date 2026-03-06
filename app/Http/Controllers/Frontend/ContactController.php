<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman Contact Us
     */
    public function index()
    {
        return view('pages.contact.index');
    }

    /**
     * Memproses form pengiriman pesan
     */
    public function send(Request $request)
    {
        // Validasi inputan form dari user
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO untuk tahap selanjutnya: 
        // 1. Simpan ke database tabel `messages`
        // ATAU 2. Kirim ke email UKM menggunakan fungsi Mail::to()

        // Mengembalikan user ke halaman contact dengan pesan sukses
        return back()->with('success', 'Terima kasih, pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}