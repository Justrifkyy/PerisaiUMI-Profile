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
            'label' => 'sometimes|required|string',
            'period' => 'nullable|string',
            'number' => 'sometimes|required|integer',
            'bg_class' => 'nullable|string',
            'text_class' => 'nullable|string',
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

