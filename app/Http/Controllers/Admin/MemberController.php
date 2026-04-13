<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Department;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display all members
     */
    public function index()
    {
        $members = Member::with('department')->orderBy('order')->paginate(15);
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show form to create new member
     */
    public function create()
    {
        $departments = Department::where('is_active', true)->get();
        $hierarchies = ['pembina' => 'Pembina', 'inti' => 'Inti', 'kadep' => 'Kepala Departemen', 'staf' => 'Staf Ahli'];
        return view('admin.members.create', compact('departments', 'hierarchies'));
    }

    /**
     * Store new member
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'nullable|exists:departments,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'hierarchy' => 'required|in:pembina,inti,kadep,staf',
            'linkedin_url' => 'nullable|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle photo upload (3:4 ratio)
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('members', $filename, 'public');
            $validated['photo'] = $path;
        }

        Member::create($validated);

        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    /**
     * Show form to edit member
     */
    public function edit(Member $member)
    {
        $departments = Department::where('is_active', true)->get();
        $hierarchies = ['pembina' => 'Pembina', 'inti' => 'Inti', 'kadep' => 'Kepala Departemen', 'staf' => 'Staf Ahli'];
        return view('admin.members.edit', compact('member', 'departments', 'hierarchies'));
    }

    /**
     * Update member
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'department_id' => 'nullable|exists:departments,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'hierarchy' => 'required|in:pembina,inti,kadep,staf',
            'linkedin_url' => 'nullable|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('members', $filename, 'public');
            $validated['photo'] = $path;
        }

        $member->update($validated);

        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil diperbarui');
    }

    /**
     * Delete member
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil dihapus');
    }
}
