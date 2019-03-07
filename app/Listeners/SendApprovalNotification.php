<?php

namespace App\Listeners;

use App\Events\UserApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendApprovalNotification
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
     * @param  UserApproved  $event
     * @return void
     */
    public function handle(UserApproved $event)
    {
        //
    }
}
