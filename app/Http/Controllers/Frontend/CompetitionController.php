<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        // Ambil semua kompetisi aktif dengan pagination
        $competitions = Competition::active()
            ->orderBy('deadline', 'asc')
            ->paginate(9);

        return view('pages.competition.index', compact('competitions'));
    }

    public function detail($slug = null)
    {
        // Ambil kompetisi berdasarkan slug
        $competition = Competition::where('slug', $slug)->active()->firstOrFail();

        // Ambil kompetisi lain sebagai saran
        $relatedCompetitions = Competition::active()
            ->where('id', '!=', $competition->id)
            ->where('category', $competition->category)
            ->limit(3)
            ->get();

        return view('pages.competition.detail', compact('competition', 'relatedCompetitions'));
    }
}
