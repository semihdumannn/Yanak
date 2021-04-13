<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order,string  $type = 'customer')
    {
        $this->order = $order;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('emails.customer_order');
        if ($this->type != 'customer')
        {
            $view = 'emails.order';
        }
        else
        {
            $view = 'emails.orderShipped';
        }
        $this
            ->subject('Sipariş Bilgilendirmesi')
            //->attach($this->makeInvoice($this->order))
            ->markdown($view)
            ->with(['order' => $this->order]);
    }

    public function makeInvoice($order)
    {

    }
}
