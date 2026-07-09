<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->get();

        $upcomingEvents = Event::where('status', 'published')
            ->where(function ($q) {
                $q->where('start_date', '>=', now())
                  ->orWhere('end_date', '>=', now());
            })
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        return view('home', compact('latestPosts', 'upcomingEvents'));
    }
}