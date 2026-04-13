<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompetitionController extends Controller
{
    /**
     * Display all competitions
     */
    public function index()
    {
        $competitions = Competition::orderBy('deadline')->paginate(10);
        return view('admin.competitions.index', compact('competitions'));
    }

    /**
     * Show form to create new competition
     */
    public function create()
    {
        $categories = [
            'internasional' => 'Internasional',
            'nasional' => 'Nasional',
            'dikti' => 'Dikti',
            'kti_essay' => 'KTI/Essay',
            'poster' => 'Poster',
            'debat' => 'Debat',
            'business_plan' => 'Business Plan',
            'video_editing' => 'Video Editing',
        ];
        return view('admin.competitions.create', compact('categories'));
    }

    /**
     * Store new competition
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:internasional,nasional,dikti,kti_essay,poster,debat,business_plan,video_editing',
            'deadline' => 'required|date',
            'description' => 'nullable|string',
            'registration_link' => 'nullable|url',
            'poster_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);

        // Handle poster images
        $posterImages = [];
        if ($request->hasFile('poster_images')) {
            foreach ($request->file('poster_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('competitions', $filename, 'public');
                $posterImages[] = $path;
            }
            $validated['poster_images'] = $posterImages;
        }

        Competition::create($validated);

        return redirect()->route('admin.competitions.index')->with('success', 'Lomba berhasil ditambahkan');
    }

    /**
     * Show form to edit competition
     */
    public function edit(Competition $competition)
    {
        $categories = [
            'internasional' => 'Internasional',
            'nasional' => 'Nasional',
            'dikti' => 'Dikti',
            'kti_essay' => 'KTI/Essay',
            'poster' => 'Poster',
            'debat' => 'Debat',
            'business_plan' => 'Business Plan',
            'video_editing' => 'Video Editing',
        ];
        return view('admin.competitions.edit', compact('competition', 'categories'));
    }

    /**
     * Update competition
     */
    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:internasional,nasional,dikti,kti_essay,poster,debat,business_plan,video_editing',
            'deadline' => 'required|date',
            'description' => 'nullable|string',
            'registration_link' => 'nullable|url',
            'poster_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);

        // Handle poster images (append to existing)
        if ($request->hasFile('poster_images')) {
            $posterImages = $competition->poster_images ?? [];
            foreach ($request->file('poster_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('competitions', $filename, 'public');
                $posterImages[] = $path;
            }
            $validated['poster_images'] = $posterImages;
        }

        $competition->update($validated);

        return redirect()->route('admin.competitions.index')->with('success', 'Lomba berhasil diperbarui');
    }

    /**
     * Delete competition
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect()->route('admin.competitions.index')->with('success', 'Lomba berhasil dihapus');
    }
}
