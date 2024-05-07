<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\FoodOrderedEvent;

class OrderListener
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
    public function handle(FoodOrderedEvent $event): void
    {
        $item = $event->item;
         Log::info("Order placed for $item.");
    }
}
