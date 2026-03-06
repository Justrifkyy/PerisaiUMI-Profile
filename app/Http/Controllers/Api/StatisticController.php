<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display all active statistics
     */
    public function index()
    {
        $statistics = Statistic::active()->ordered()->get();

        return response()->json([
            'data' => $statistics,
        ]);
    }

    /**
     * Update statistics (admin only).
     */
    public function update(Request $request, $id)
    {
        $statistic = Statistic::findOrFail($id);

        $validated = $request->validate([
            'label' => 'sometimes|required|string|max:255',
            'period' => 'nullable|string|max:255',
            'number' => 'sometimes|required|integer', // Konsisten menggunakan 'number'
            'bg_class' => 'nullable|string|max:255',
            'text_class' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $statistic->update($validated);

        return response()->json([
            'message' => 'Statistic updated successfully',
            'data' => $statistic,
        ]);
    }
}
