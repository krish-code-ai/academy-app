<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::withCount('images')->with('images')->orderByDesc('id')->paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'images' => 'array',
            'images.*' => 'string',
        ]);

        $gallery = Gallery::create([
            'title' => $request->title,
            'year' => $request->year,
        ]);

        if (is_array($request->images) && is_array($request->thumbnailImages)) {
            foreach ($request->images as $index => $path) {
                $thumbnail = $request->thumbnailImages[$index];

                $gallery->images()->create([
                    'image_path' => $path,
                    'thumbnail_path' => $thumbnail,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        $gallery = Gallery::with('images')->findOrFail($gallery->id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|digits:4',
            'images' => 'array',
            'images.*' => 'string',
        ]);

        $gallery = Gallery::findOrFail($gallery->id);
        $gallery->update([
            'title' => $request->title,
            'year' => $request->year,
        ]);

        // Save new uploaded images
        if (is_array($request->images) && is_array($request->thumbnailImages)) {
            foreach ($request->images as $index => $path) {
                $thumbnail = $request->thumbnailImages[$index];

                $gallery->images()->create([
                    'image_path' => $path,
                    'thumbnail_path' => $thumbnail,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = $request->file('file')->store('galleries', 'public');

        $manager = new ImageManager(new Driver());
        $image = $manager->read($file)->resize(300, 300);

        // Create thumbnail
        $thumbnailPath = 'galleries/thumbnails/' . $fileName;
        // $image = Image::make($file)->fit(300, 300);
        Storage::disk('public')->put($thumbnailPath, (string) $image->encode());

        return response()->json([
            'name' => $originalName,
            'size' => $file->getSize(),
            'image_path' => $path,
            'thumbnail_path' => $thumbnailPath,
        ]);
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'path' => 'required|string',
        ]);

        $publicUrlPrefix = asset('storage') . '/';

        $path = str_replace($publicUrlPrefix, '', $request->path);
        $thumbnail = $request->thumbnail_path
            ? str_replace($publicUrlPrefix, '', $request->thumbnail_path)
            : null;

        $deleted = false;

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            $deleted = true;
        }

        if ($request->thumbnail_path && Storage::disk('public')->exists($thumbnail)) {
            Storage::disk('public')->delete($thumbnail);
            $deleted = true;
        }

        $image = GalleryImage::where('image_path', $path)->first();
        if ($image) {
            $image->delete();
        }

        return response()->json(['success' => $deleted]);
    }

    public function fetchImages(Request $request)
    {
        $gallery = Gallery::findOrFail($request->gallery_id);

        $images = [];

        foreach ($gallery->images as $img) {
            $images[] = [
                'name' => basename($img->image_path),
                'size' => Storage::disk('public')->size($img->image_path),
                'path' => asset('storage/' . $img->image_path),
                'thumbnail' => asset('storage/' . $img->thumbnail_path),
            ];
        }

        return response()->json($images);
    }
}
