<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('status', 'published')->orderBy('published_at', 'desc');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('search')) {
            $lower = strtolower($request->search);
            $query->whereRaw('LOWER(title) LIKE ?', ["%{$lower}%"]);
        }

        $posts    = $query->paginate(9);
        $featured = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('newsletter.index', compact('posts', 'featured'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $related = Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->limit(3)
            ->get();

        return view('newsletter.show', compact('post', 'related'));
    }
}