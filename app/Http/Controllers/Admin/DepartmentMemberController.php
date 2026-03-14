<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentMemberController extends Controller
{
    public function index(Department $department)
    {
        $members = $department->organizationalStructures()->ordered()->paginate(20);
        return view('admin.departments.members', compact('department', 'members')); // Path diperbarui
    }

    public function create(Department $department)
    {
        return view('admin.departments.members-create', compact('department')); // Path diperbarui
    }

    public function store(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'level' => 'nullable|integer',
            'order' => 'nullable|integer',
            'period' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['department_id'] = $department->id;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('members', 'public');
        }

        OrganizationalStructure::create($validated);

        return redirect()->route('admin.departments.members.index', $department)
            ->with('success', 'Member added successfully!');
    }

    public function edit(Department $department, OrganizationalStructure $member)
    {
        return view('admin.departments.members-edit', compact('department', 'member')); // Path diperbarui
    }

    public function update(Request $request, Department $department, OrganizationalStructure $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'level' => 'nullable|integer',
            'order' => 'nullable|integer',
            'period' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $validated['photo'] = $request->file('photo')->store('members', 'public');
        }

        $member->update($validated);

        return redirect()->route('admin.departments.members.index', $department)
            ->with('success', 'Member updated successfully!');
    }

    public function destroy(Department $department, OrganizationalStructure $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }

        $member->delete();

        return redirect()->route('admin.departments.members.index', $department)
            ->with('success', 'Member deleted successfully!');
    }
}
