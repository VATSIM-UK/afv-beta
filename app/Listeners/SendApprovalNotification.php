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
        if ($event->approval->user) { // FIX for imported Approvals from FSExpo with no User
            $event->approval->user->notify(new ApprovalWelcomeEmail());
        }
    }
}
