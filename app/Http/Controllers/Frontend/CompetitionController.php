<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        // Mengambil berita dengan kategori 'Competition' / 'Prestasi'
        $competitions = News::published()
            ->where('category', 'Competition')
            ->orWhere('category', 'Prestasi')
            ->ordered()
            ->paginate(9);

        return view('pages.competition.index', compact('competitions'));
    }
}