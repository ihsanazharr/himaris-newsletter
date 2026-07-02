<?php

namespace App\Http\Controllers;

use App\Models\JobOpportunity;
use Illuminate\Http\Request;

class JobOpportunityController extends Controller
{
    public function index(Request $request)
    {
        $type   = $request->get('type', 'all');
        $search = $request->get('search');

        $query = JobOpportunity::where('status', 'published');

        if ($type && $type !== 'all') {
            $query->where('type', $type);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'ilike', "%{$search}%")
                  ->orWhere('company', 'ilike', "%{$search}%")
                  ->orWhere('description', 'ilike', "%{$search}%");
            });
        }

        $jobs              = $query->latest()->paginate(10);
        $totalOpen         = JobOpportunity::where('status', 'published')->count();
        $totalInternships  = JobOpportunity::where('status', 'published')
                                            ->where('type', 'internship')
                                            ->count();

        return view('jobs.index', compact('jobs', 'totalOpen', 'totalInternships', 'type', 'search'));
    }

    public function show(JobOpportunity $job)
    {
        abort_if($job->status !== 'published', 404);

        $related = JobOpportunity::where('status', 'published')
            ->where('type', $job->type)
            ->where('id', '!=', $job->id)
            ->latest()
            ->take(3)
            ->get();

        return view('jobs.show', compact('job', 'related'));
    }
}