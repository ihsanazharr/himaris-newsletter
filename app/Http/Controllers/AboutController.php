<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class AboutController extends Controller
{
    public function index(string $tab = 'himaris')
    {
        $validTabs = ['himaris', 'esaa', 'english-dept'];

        if (!in_array($tab, $validTabs)) {
            abort(404);
        }

        $moments = Gallery::where('status', 'published')
            ->latest()
            ->limit(8)
            ->get();

        return view('about', compact('tab', 'moments'));
    }
}