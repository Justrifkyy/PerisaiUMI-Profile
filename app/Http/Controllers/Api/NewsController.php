<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of news (published only for public)
     */
    public function index()
    {
        $news = News::published()->ordered()->get();

        return response()->json([
            'data' => $news,
        ]);
    }

    /**
     * Display the specified news.
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        return response()->json([
            'data' => $news,
        ]);
    }

    /**
     * Store a newly created news (admin only).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Diubah menjadi validasi image
            'gradient' => 'nullable|string',
            'category' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news = News::create($validated);

        return response()->json([
            'message' => 'News created successfully',
            'data' => $news,
        ], 201);
    }

    /**
     * Update the specified news (admin only).
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Diubah menjadi validasi image
            'gradient' => 'nullable|string',
            'category' => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);

        return response()->json([
            'message' => 'News updated successfully',
            'data' => $news,
        ]);
    }

    /**
     * Remove the specified news (admin only).
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json([
            'message' => 'News deleted successfully',
        ]);
    }
}
