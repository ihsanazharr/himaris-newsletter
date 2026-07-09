<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');

        // 1. Fetch published Events
        $events = Event::where('status', 'published')->get();

        // 2. Fetch published Student Resources
        $resources = \App\Models\StudentResource::where('status', 'published')->get();

        // 3. Map both to a unified structure
        $items = collect();

        foreach ($events as $event) {
            $items->push([
                'type'         => 'event',
                'title'        => $event->title,
                'slug'         => $event->slug,
                'thumbnail'    => $event->thumbnail,
                'category'     => 'events',
                'source'       => $event->organizer ?? 'Event',
                'date'         => $event->start_date,
                'description'  => $event->description,
                'file_path'    => null,
                'external_url' => null,
                'url'          => route('student-resources.show', $event->slug),
            ]);
        }

        foreach ($resources as $res) {
            $items->push([
                'type'         => 'resource',
                'title'        => $res->title,
                'slug'         => $res->slug,
                'thumbnail'    => $res->thumbnail,
                'category'     => $res->category,
                'source'       => $res->source ?? 'Resource',
                'date'         => $res->published_at ?? $res->created_at,
                'description'  => $res->description,
                'file_path'    => $res->file_path,
                'external_url' => $res->external_url,
                'url'          => $res->file_path ? asset('storage/' . $res->file_path) : ($res->external_url ?? '#'),
            ]);
        }

        // 4. Apply category filter if not 'all'
        if ($filter !== 'all') {
            $items = $items->filter(function ($item) use ($filter) {
                return $item['category'] === $filter;
            });
        }

        // 5. Sort by date descending (newest first)
        $items = $items->sortByDesc('date');

        // 6. Paginate manually
        $page = $request->get('page', 1);
        $perPage = 9;
        
        $paginatedItems = new \Illuminate\Pagination\LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('student-resources.index', compact('paginatedItems', 'filter'));
    }

    public function show(string $slug)
    {
        $event = Event::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $moreEvents = Event::where('status', 'published')
            ->where('id', '!=', $event->id)
            ->where(function ($q) {
                $q->where('start_date', '>=', now())
                  ->orWhere('end_date', '>=', now());
            })
            ->orderBy('start_date', 'asc')
            ->limit(3)
            ->get();

        return view('student-resources.show', compact('event', 'moreEvents'));
    }
}