<?php

namespace App\Observers;

use App\Mail\NewContentMail;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class PostObserver
{
    /**
     * Fire when a Post is updated.
     * Send email only the FIRST TIME status changes to 'published'.
     */
    public function updated(Post $post): void
    {
        // Only trigger if status just changed TO published
        if ($post->wasChanged('status') && $post->status === 'published') {
            $this->dispatchEmails($post);
        }
    }

    /**
     * Fire when a Post is created already published (edge case).
     */
    public function created(Post $post): void
    {
        if ($post->status === 'published') {
            $this->dispatchEmails($post);
        }
    }

    private function dispatchEmails(Post $post): void
    {
        $subscribers = Subscriber::where('verified', true)->get();

        if ($subscribers->isEmpty()) {
            return;
        }

        $url = route('newsletter.show', $post->slug);

        $content = [
            'type'      => 'post',
            'title'     => $post->title,
            'excerpt'   => $post->excerpt ?? '',
            'url'       => $url,
            'thumbnail' => $post->thumbnail,
            'date'      => $post->published_at?->format('d F Y') ?? now()->format('d F Y'),
            'category'  => $post->category_label,
        ];

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)
                ->send(new NewContentMail($content, $subscriber->token));
        }
    }
}
