<?php

namespace App\Providers;

use App\Events\UserLoggedIn;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Login;


class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
   {

   }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {



    Event::listen(Login::class, function ($event) {
        event(new UserLoggedIn($event->user));
    });
}

}
