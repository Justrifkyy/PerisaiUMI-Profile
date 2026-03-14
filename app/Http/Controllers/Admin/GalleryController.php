<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('admin.gallery.index', compact('galleries')); // Path diperbarui
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery', 'public');

                Gallery::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image_path' => $path,
                    'is_active' => true,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Images uploaded successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image deleted successfully!');
    }
}
