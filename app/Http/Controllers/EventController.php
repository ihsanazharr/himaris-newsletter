<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');

        $query = Event::where('status', 'published')->orderBy('start_date', 'asc');

        if ($filter === 'upcoming') $query->where('start_date', '>=', now());
        elseif ($filter === 'past')   $query->where('start_date', '<',  now());

        $events   = $query->paginate(9);
        $featured = Event::where('status', 'published')
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        return view('student-resources.index', compact('events', 'featured', 'filter'));
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $moreEvents = Event::where('status', 'published')
            ->where('id', '!=', $event->id)
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        return view('student-resources.show', compact('event', 'moreEvents'));
    }
}