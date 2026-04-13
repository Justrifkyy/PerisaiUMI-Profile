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
            'member_count' => \App\Models\Member::count(),
            'work_program_count' => \App\Models\WorkProgram::count(),
            'competition_count' => \App\Models\Competition::count(),
            'message_count' => \App\Models\InboxMessage::where('is_read', false)->count(),
            'statistic_count' => Statistic::count(),
        ];

        // Get statistics data for dashboard display
        $statistics = Statistic::active()->ordered()->get();

        // Prepare stat boxes data
        $statBoxes = [];
        $colors = [
            'bg-blue-600',
            'bg-purple-600',
            'bg-pink-600',
            'bg-indigo-600',
            'bg-green-600',
            'bg-red-600',
            'bg-yellow-600'
        ];

        foreach ($statistics as $index => $stat) {
            $statBoxes[] = [
                'label' => $stat->label,
                'value' => $stat->value,
                'description' => $stat->description,
                'bgClass' => $colors[$index % count($colors)] ?? 'bg-blue-600',
            ];
        }

        return view('admin.dashboard', compact('stats', 'statBoxes'));
    }
}
