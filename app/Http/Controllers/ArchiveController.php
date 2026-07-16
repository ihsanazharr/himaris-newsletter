<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Facades\Schema;

class ArchiveController extends Controller
{
    public function index(): View
    {
        $magazines = collect();

        if (Schema::hasTable('magazines')) {
            try {
                $magazines = Magazine::published()
                    ->orderByDesc('published_date')
                    ->orderByDesc('created_at')
                    ->get();
            } catch (\Exception $e) {
                // Fail silently
            }
        }

        $postsByCategory = collect();
        try {
            $postsByCategory = Post::where('status', 'published')
                ->orderBy('published_at', 'desc')
                ->get()
                ->groupBy('category');
        } catch (\Exception $e) {
            // Fail silently
        }

        return view('archive.index', compact('magazines', 'postsByCategory'));
    }
}
