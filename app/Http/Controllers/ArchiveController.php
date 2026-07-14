<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\View\View;

class ArchiveController extends Controller
{
    public function index(): View
    {
        $magazines = Magazine::published()
            ->orderByDesc('published_date')
            ->orderByDesc('created_at')
            ->get();

        return view('archive.index', compact('magazines'));
    }
}
