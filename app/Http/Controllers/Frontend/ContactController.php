<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use App\Models\InboxMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Menampilkan halaman Contact Us
     */
    public function index()
    {
        // Ambil web settings untuk info kontak
        $settings = WebSetting::getSettings();

        return view('pages.contact.index', compact('settings'));
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
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan pesan ke database
        InboxMessage::create($validated);

        // Mengembalikan user ke halaman contact dengan pesan sukses
        return back()->with('success', 'Terima kasih, pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
