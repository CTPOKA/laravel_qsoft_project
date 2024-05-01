<?php

namespace App\Listeners;

use App\Events\ArticleUpdatedEvent;
use App\Mail\ArticleUpdatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnArticleUpdatedListener
{
    public function handle(ArticleUpdatedEvent $event): void
    {
        $address = config('mail.from.address');
        
        if (! $address) {
            return;
        }

        Mail::to($address)->send(new ArticleUpdatedMail($event->article));
    }
}
