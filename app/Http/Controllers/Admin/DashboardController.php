<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Department;
use App\Models\Statistic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $stats = [
            'news_count' => News::count(),
            'department_count' => Department::count(),
            'statistic_count' => Statistic::count(),
        ];

        return view('pages.admin.dashboard', compact('stats'));
    }
}
