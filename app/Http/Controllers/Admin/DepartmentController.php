<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::ordered()->paginate(10);
        return view('admin.departments.index', compact('departments')); // Path diperbarui
    }

    public function create()
    {
        return view('admin.departments.create'); // Path diperbarui
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('departments', 'public');
        }

        Department::create($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department created successfully!');
    }

    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department')); // Path diperbarui
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department updated successfully!');
    }

    public function destroy(Department $department)
    {
        if ($department->icon) {
            Storage::disk('public')->delete($department->icon);
        }

        $department->delete();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department deleted successfully!');
    }
}
