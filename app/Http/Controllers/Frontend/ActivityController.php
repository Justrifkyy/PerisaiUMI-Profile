<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        // WAJIB menggunakan paginate(), BUKAN get() atau toArray()
        $activities = News::published()
            ->where('category', 'Activity')
            ->orWhere('category', 'Kegiatan')
            ->ordered()
            ->paginate(9);

        return view('pages.activity.index', compact('activities'));
    }
}
