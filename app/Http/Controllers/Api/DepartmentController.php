<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    /**
     * Display all active departments
     */
    public function index()
    {
        $departments = Department::active()->ordered()->get();

        return response()->json([
            'data' => $departments,
        ]);
    }

    /**
     * Display the specified department with org structure
     */
    public function show($id)
    {
        $department = Department::with('organizationalStructures')->findOrFail($id);

        return response()->json([
            'data' => $department,
        ]);
    }

    /**
     * Store a newly created department (admin only).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Diubah menjadi validasi image
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('departments', 'public');
        }

        $department = Department::create($validated);

        return response()->json([
            'message' => 'Department created successfully',
            'data' => $department,
        ], 201);
    }

    /**
     * Update the specified department (admin only).
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'full_name' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Diubah menjadi validasi image
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('icon')) {
            if ($department->icon) {
                Storage::disk('public')->delete($department->icon);
            }
            $validated['icon'] = $request->file('icon')->store('departments', 'public');
        }

        $department->update($validated);

        return response()->json([
            'message' => 'Department updated successfully',
            'data' => $department,
        ]);
    }

    /**
     * Remove the specified department (admin only).
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        if ($department->icon) {
            Storage::disk('public')->delete($department->icon);
        }

        $department->delete();

        return response()->json([
            'message' => 'Department deleted successfully',
        ]);
    }
}