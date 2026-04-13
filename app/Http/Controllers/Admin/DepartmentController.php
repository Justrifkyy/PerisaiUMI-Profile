<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display all departments
     */
    public function index()
    {
        $departments = Department::orderBy('order')->paginate(10);
        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show form to create new department
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store new department
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'group_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Handle group photo upload
        if ($request->hasFile('group_photo')) {
            $photo = $request->file('group_photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('departments', $filename, 'public');
            $validated['group_photo'] = $path;
        }

        Department::create($validated);

        return redirect()->route('admin.departments.index')->with('success', 'Departemen berhasil ditambahkan');
    }

    /**
     * Show form to edit department
     */
    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update department
     */
    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'group_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Handle group photo upload
        if ($request->hasFile('group_photo')) {
            $photo = $request->file('group_photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('departments', $filename, 'public');
            $validated['group_photo'] = $path;
        }

        $department->update($validated);

        return redirect()->route('admin.departments.index')->with('success', 'Departemen berhasil diperbarui');
    }

    /**
     * Delete department
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Departemen berhasil dihapus');
    }
}
