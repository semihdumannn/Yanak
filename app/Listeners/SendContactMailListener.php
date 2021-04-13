<?php

namespace App\Listeners;

use App\Events\SendContactMailEvent;
use App\Mail\ContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendContactMailEvent $event)
    {
        Mail::to('semihdumannn@gmail.com')
            ->send(new ContactMail($event->form));
    }
}
