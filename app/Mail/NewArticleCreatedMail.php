<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewArticleCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Article $article)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Article Created Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.new-article-created-mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
