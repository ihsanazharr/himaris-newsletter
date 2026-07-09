<?php

namespace App\Http\Controllers;

use App\Models\Moment;

class AboutNewsletterController extends Controller
{
    public function index()
    {
        $moments = Moment::where('status', 'published')
            ->latest()
            ->limit(12)
            ->get();

        return view('pages.about-newsletter', compact('moments'));
    }
}
