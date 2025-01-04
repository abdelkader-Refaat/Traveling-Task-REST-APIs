<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Notifications\LoginNewUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewLoginNotification
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
    public function handle(UserLoggedIn $event): void
    {
        // $event->user->notify(new LoginNewUser());

    }
}
