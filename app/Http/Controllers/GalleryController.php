<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Gallery::where('status', 'published')
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('gallery.index', compact('photos'));
    }

    public function show(Gallery $gallery)
    {
        abort_if($gallery->status !== 'published', 404);

        $morePhotos = Gallery::where('status', 'published')
            ->where('id', '!=', $gallery->id)
            ->orderBy('date', 'desc')
            ->limit(4)
            ->get();

        return view('gallery.show', compact('gallery', 'morePhotos'));
    }
}
