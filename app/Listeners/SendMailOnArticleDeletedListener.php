<?php

namespace App\Listeners;

use App\Events\ArticleDeletedEvent;
use App\Mail\ArticleDeletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailOnArticleDeletedListener
{
    public function handle(ArticleDeletedEvent $event): void
    {
        $address = config('mail.from.address');
        
        if (! $address) {
            return;
        }

        Mail::to($address)->send(new ArticleDeletedMail($event->article));
    }
}
