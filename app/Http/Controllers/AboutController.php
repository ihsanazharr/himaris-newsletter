<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index(string $tab = 'himaris')
    {
        $validTabs = ['himaris', 'esaa', 'english-dept'];

        if (!in_array($tab, $validTabs)) {
            abort(404);
        }

        return view('about', compact('tab'));
    }
}