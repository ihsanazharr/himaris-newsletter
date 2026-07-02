<?php

namespace App\Observers;

use App\Mail\NewContentMail;
use App\Models\JobOpportunity;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class JobOpportunityObserver
{
    public function updated(JobOpportunity $job): void
    {
        if ($job->wasChanged('status') && $job->status === 'published') {
            $this->dispatchEmails($job);
        }
    }

    public function created(JobOpportunity $job): void
    {
        if ($job->status === 'published') {
            $this->dispatchEmails($job);
        }
    }

    private function dispatchEmails(JobOpportunity $job): void
    {
        $subscribers = Subscriber::where('verified', true)->get();

        if ($subscribers->isEmpty()) {
            return;
        }

        $url = route('jobs.show', $job->slug);

        $typeLabel = [
            'full-time'  => 'Full-Time',
            'internship' => 'Internship',
            'part-time'  => 'Part-Time',
            'freelance'  => 'Freelance',
        ][$job->type] ?? $job->type;

        $content = [
            'type'      => 'job',
            'title'     => $job->title,
            'excerpt'   => $job->description ? \Illuminate\Support\Str::limit(strip_tags($job->description), 200) : '',
            'url'       => $url,
            'thumbnail' => $job->thumbnail,
            'date'      => $job->deadline ? 'Apply by: ' . \Carbon\Carbon::parse($job->deadline)->format('d F Y') : now()->format('d F Y'),
            'category'  => $job->company . ' — ' . $typeLabel,
        ];

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->queue(new NewContentMail($content, $subscriber->token));
        }
    }
}
