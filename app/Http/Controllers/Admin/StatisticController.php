<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display all statistics
     */
    public function index()
    {
        $statistics = Statistic::orderBy('order')->paginate(10);
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show form to create new statistic
     */
    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store new statistic
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        Statistic::create($validated);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistik berhasil ditambahkan');
    }

    /**
     * Show form to edit statistic
     */
    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    /**
     * Update statistic
     */
    public function update(Request $request, Statistic $statistic)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $statistic->update($validated);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistik berhasil diperbarui');
    }

    /**
     * Delete statistic
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('admin.statistics.index')->with('success', 'Statistik berhasil dihapus');
    }
}
