<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display all news
     */
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show form to create new news
     */
    public function create()
    {
        $categories = ['Prestasi', 'Kegiatan', 'Informasi'];
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store new news
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);

        // Set published_at to now if empty
        if (empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('news', $filename, 'public');
            $validated['cover_image'] = $path;
        }

        // Handle gallery images
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('news/gallery', $filename, 'public');
                $galleryImages[] = $path;
            }
            $validated['gallery_images'] = $galleryImages;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Show form to edit news
     */
    public function edit(News $news)
    {
        $categories = ['Prestasi', 'Kegiatan', 'Informasi'];
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update news
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string',
            'content' => 'nullable|string',
            'published_at' => 'nullable|date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('news', $filename, 'public');
            $validated['cover_image'] = $path;
        }

        // Handle gallery images (append to existing)
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $news->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->storeAs('news/gallery', $filename, 'public');
                $galleryImages[] = $path;
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Delete news
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}