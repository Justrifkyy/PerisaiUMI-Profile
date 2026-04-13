<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkProgram;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkProgramController extends Controller
{
    /**
     * Display all work programs
     */
    public function index()
    {
        $workPrograms = WorkProgram::with('department')->orderBy('order')->paginate(10);
        return view('admin.work-programs.index', compact('workPrograms'));
    }

    /**
     * Show form to create new work program
     */
    public function create()
    {
        $departments = Department::where('is_active', true)->get();
        return view('admin.work-programs.create', compact('departments'));
    }

    /**
     * Store new work program
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:250',
            'content' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('work-programs', $filename, 'public');
            $validated['cover_image'] = $path;
        }

        // Handle gallery images
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('work-programs/gallery', $filename, 'public');
                $galleryImages[] = $path;
            }
            $validated['gallery_images'] = $galleryImages;
        }

        WorkProgram::create($validated);

        return redirect()->route('admin.work-programs.index')->with('success', 'Program Kerja berhasil ditambahkan');
    }

    /**
     * Show form to edit work program
     */
    public function edit(WorkProgram $workProgram)
    {
        $departments = Department::where('is_active', true)->get();
        return view('admin.work-programs.edit', compact('workProgram', 'departments'));
    }

    /**
     * Update work program
     */
    public function update(Request $request, WorkProgram $workProgram)
    {
        $validated = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:250',
            'content' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('work-programs', $filename, 'public');
            $validated['cover_image'] = $path;
        }

        // Handle gallery images (append to existing)
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $workProgram->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('work-programs/gallery', $filename, 'public');
                $galleryImages[] = $path;
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $workProgram->update($validated);

        return redirect()->route('admin.work-programs.index')->with('success', 'Program Kerja berhasil diperbarui');
    }

    /**
     * Delete work program
     */
    public function destroy(WorkProgram $workProgram)
    {
        $workProgram->delete();
        return redirect()->route('admin.work-programs.index')->with('success', 'Program Kerja berhasil dihapus');
    }
}
