<?php

namespace App\Observers;

use App\Mail\NewContentMail;
use App\Models\Event;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class EventObserver
{
    public function updated(Event $event): void
    {
        if ($event->wasChanged('status') && $event->status === 'published') {
            $this->dispatchEmails($event);
        }
    }

    public function created(Event $event): void
    {
        if ($event->status === 'published') {
            $this->dispatchEmails($event);
        }
    }

    private function dispatchEmails(Event $event): void
    {
        $subscribers = Subscriber::where('verified', true)->get();

        if ($subscribers->isEmpty()) {
            return;
        }

        $url = route('student-resources.show', $event->slug);

        $content = [
            'type'      => 'event',
            'title'     => $event->title,
            'excerpt'   => $event->description ?? '',
            'url'       => $url,
            'thumbnail' => $event->thumbnail,
            'date'      => $event->start_date?->format('d F Y, H:i') . ' WIB',
            'category'  => $event->organizer ?? 'Event',
        ];

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new NewContentMail($content, $subscriber->token));
        }
    }
}
