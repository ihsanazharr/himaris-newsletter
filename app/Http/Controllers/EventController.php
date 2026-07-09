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
                'url'          => route('student-resources.show', $res->slug),
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
        // 1. Try to find in Event model first
        $event = Event::where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if ($event) {
            $moreEvents = Event::where('status', 'published')
                ->where('id', '!=', $event->id)
                ->orderBy('start_date', 'asc')
                ->limit(3)
                ->get();

            return view('student-resources.show', [
                'type'        => 'event',
                'title'       => $event->title,
                'thumbnail'   => $event->thumbnail,
                'description' => $event->description,
                'date'        => $event->start_date,
                'location'    => $event->location,
                'source'      => $event->organizer,
                'file_path'   => null,
                'external_url'=> null,
                'category'    => 'events',
                'moreEvents'  => $moreEvents,
            ]);
        }

        // 2. Try to find in StudentResource model
        $res = \App\Models\StudentResource::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Get other student resources for the sidebar/bottom
        $moreResources = \App\Models\StudentResource::where('status', 'published')
            ->where('id', '!=', $res->id)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Map to common structure for moreEvents loop on view
        $moreEvents = collect();
        foreach ($moreResources as $m) {
            $moreEvents->push((object)[
                'title'      => $m->title,
                'slug'       => $m->slug,
                'thumbnail'  => $m->thumbnail,
                'start_date' => $m->published_at ?? $m->created_at,
                'organizer'  => $m->source ?? 'Resource',
            ]);
        }

        return view('student-resources.show', [
            'type'        => 'resource',
            'title'       => $res->title,
            'thumbnail'   => $res->thumbnail,
            'description' => $res->description,
            'date'        => $res->published_at ?? $res->created_at,
            'location'    => null,
            'source'      => $res->source,
            'file_path'   => $res->file_path,
            'external_url'=> $res->external_url,
            'category'    => $res->category,
            'moreEvents'  => $moreEvents,
        ]);
    }
}