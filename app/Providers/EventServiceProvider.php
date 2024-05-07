<?php

namespace App\Providers;

use App\Events\FoodOrderedEvent;
use App\Events\OrderShippedEvent;
use App\Listeners\LogShipmentListener;
use App\Listeners\OrderListener;
use App\Listeners\SendShipmentNotificationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        FoodOrderedEvent::class => [
            OrderListener::class,
        ],        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderShippedEvent::class=>[
            LogShipmentListener::class,SendShipmentNotificationListener::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
