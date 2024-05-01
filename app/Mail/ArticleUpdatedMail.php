<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArticleUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Article $article)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Article updated',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.article-updated-mail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
