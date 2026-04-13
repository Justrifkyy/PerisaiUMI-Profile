<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\WorkProgram;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        // Ambil berita & kegiatan dengan pagination
        $news = News::published()->ordered()->paginate(9);

        return view('pages.activity.index', compact('news'));
    }

    public function proker()
    {
        // Ambil semua program kerja aktif dengan pagination
        $workPrograms = WorkProgram::active()->ordered()->with('department')->paginate(9);

        return view('pages.activity.proker', compact('workPrograms'));
    }

    public function detailProker($slug = null)
    {
        // Ambil program kerja berdasarkan slug
        $workProgram = WorkProgram::where('slug', $slug)->active()->with('department')->firstOrFail();

        return view('pages.activity.detail-proker', compact('workProgram'));
    }

    public function detailNews($slug = null)
    {
        // Ambil berita berdasarkan slug
        $news = News::where('slug', $slug)->published()->firstOrFail();

        return view('pages.activity.detail-news', compact('news'));
    }
}
