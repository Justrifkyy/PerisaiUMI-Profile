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
        // Get basic counts
        $stats = [
            'news_count' => News::count(),
            'department_count' => Department::count(),
            'statistic_count' => Statistic::count(),
        ];

        // Get statistics data similar to landing page
        $statistics = Statistic::all();

        // Prepare stat boxes data matching landing page format
        $statBoxes = [];
        foreach ($statistics as $stat) {
            $statBoxes[] = [
                'label' => strtoupper($stat->label),
                'period' => $stat->period,
                'number' => $stat->value,
                'bgClass' => $stat->bg_class ?? 'bg-zinc-800',
                'textClass' => $stat->text_class ?? 'text-gray-400',
                'periodClass' => $stat->period_class ?? 'text-gray-300',
                'numberClass' => $stat->number_class ?? 'text-yellow-400',
                'linkClass' => $stat->link_class ?? 'text-yellow-400 hover:text-yellow-500',
                'borderClass' => $stat->border_class ?? 'border-gray-700',
                'shadowClass' => $stat->shadow_class ?? 'hover:shadow-yellow-400/20',
            ];
        }

        return view('pages.admin.dashboard', compact('stats', 'statBoxes'));
    }
}
