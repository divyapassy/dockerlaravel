<?php

namespace App\Listeners;

use App\Events\OrderShippedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendShipmentNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderShippedEvent $event): void
    {
        Mail::to($event->order->customer_email)->send((new ShipmentNotification($event->order)));
    }
}
