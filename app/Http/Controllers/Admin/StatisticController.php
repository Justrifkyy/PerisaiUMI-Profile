<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::ordered()->paginate(10);
        return view('admin.statistics.index', compact('statistics')); // Path diperbarui
    }

    public function create()
    {
        return view('admin.statistics.create'); // Path diperbarui
    }

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

    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic')); // Path diperbarui
    }

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

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic deleted successfully!');
    }
}
