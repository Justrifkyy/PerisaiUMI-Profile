<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of statistics
     */
    public function index()
    {
        $statistics = Statistic::ordered()->paginate(10);
        return view('pages.admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new statistic
     */
    public function create()
    {
        return view('pages.admin.statistics.create');
    }

    /**
     * Store a newly created statistic in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'number' => 'required|integer',
            'bg_class' => 'nullable|string|max:255',
            'text_class' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Statistic::create($validated);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic created successfully!');
    }

    /**
     * Show the form for editing the specified statistic
     */
    public function edit(Statistic $statistic)
    {
        return view('pages.admin.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified statistic in storage
     */
    public function update(Request $request, Statistic $statistic)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'number' => 'required|integer',
            'bg_class' => 'nullable|string|max:255',
            'text_class' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $statistic->update($validated);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic updated successfully!');
    }

    /**
     * Remove the specified statistic from storage
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic deleted successfully!');
    }
}
