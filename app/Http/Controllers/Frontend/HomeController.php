<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (Landing Page)
     */
    public function index()
    {
        // Ambil 2 berita terbaru yang sudah dipublish
        $latestNews = News::published()->ordered()->take(2)->get();

        // Ambil semua statistik yang aktif
        $statistics = Statistic::active()->ordered()->get();

        return view('pages.home.index', compact('latestNews', 'statistics'));
    }
}