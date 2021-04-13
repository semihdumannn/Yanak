<?php

namespace App\Providers;

use App\Events\OrderShippedEvent;
use App\Events\SendContactMailEvent;
use App\Listeners\OrderShippedListener;
use App\Listeners\SendContactMailListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendContactMailEvent::class =>  [
            SendContactMailListener::class,
        ],
        OrderShippedEvent::class => [
            OrderShippedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
