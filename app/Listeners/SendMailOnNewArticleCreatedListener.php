<?php

namespace App\Listeners;

use App\Events\ArticleCreatedEvent;
use App\Mail\NewArticleCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnNewArticleCreatedListener
{
    public function handle(ArticleCreatedEvent $event): void
    {
        $address = config('mail.from.address');
        
        if (! $address) {
            return;
        }

        Mail::to($address)->send(new NewArticleCreatedMail($event->article));
    }
}
