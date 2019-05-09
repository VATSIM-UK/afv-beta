<?php

namespace App\Listeners;

use App\Events\UserApproved;
use App\Notifications\ApprovalWelcomeEmail;

class SendApprovalNotification
{
    /**
     * Handle the event.
     *
     * @param  UserApproved $event
     * @return void
     */
    public function handle(UserApproved $event)
    {
        $event->approval->user->notify(new ApprovalWelcomeEmail());
    }
}
