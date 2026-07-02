<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContentMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @param  array{
     *   type: string,
     *   title: string,
     *   excerpt: string,
     *   url: string,
     *   thumbnail: string|null,
     *   date: string,
     *   category: string|null,
     * }  $content
     * @param  string  $unsubscribeToken
     */
    public function __construct(
        public readonly array  $content,
        public readonly string $unsubscribeToken,
    ) {}

    public function envelope(): Envelope
    {
        $subject = match ($this->content['type']) {
            'event' => '📅 New Event: ' . $this->content['title'],
            'job'   => '💼 New Job Opportunity: ' . $this->content['title'],
            default => '📰 New Article: ' . $this->content['title'],
        };

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-content',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
