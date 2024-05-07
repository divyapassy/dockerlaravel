<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class IsopProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('isop',function(){
            return new Isop();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
