<?php

namespace App\Listeners;

use App\Events\UserApproved;

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
        //
    }
}
