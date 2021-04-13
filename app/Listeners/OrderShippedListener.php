<?php

namespace App\Listeners;

use App\Events\OrderShippedEvent;
use App\Mail\ContactMail;
use App\Mail\OrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderShippedListener
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
    public function handle(OrderShippedEvent $orderShipped)
    {
        //TODO : Kullanıcı e-mail girdiyse bilgilendirme maili gönderilecek
        if (!empty($orderShipped->order->email))
        {
            Mail::to($orderShipped->order->email)
                ->send(new OrderMail($orderShipped->order));
        }
        //TODO : Yöneticiye Yeni Sipariş Maili Gönderilecek
        Mail::to('sduman10@gmail.com')
            ->send(new OrderMail($orderShipped->order,'manager'));
    }
}
