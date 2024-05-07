<?php

namespace App\Listeners;

use App\Events\OrderShippedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogShipmentListener implements ShouldQueue
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
        Log::info('Order Shipped: ' . $event->order->id);
    }
}
