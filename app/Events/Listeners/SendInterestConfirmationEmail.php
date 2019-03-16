<?php

namespace App\Events\Listeners;

use App\Events\UserExpressedInterest;
use App\Notifications\InterestConfirmationEmail;

class SendInterestConfirmationEmail
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
     * @param  UserExpressedInterest  $event
     * @return void
     */
    public function handle(UserExpressedInterest $event)
    {
        $event->approval->user->notify(new InterestConfirmationEmail());
    }
}
