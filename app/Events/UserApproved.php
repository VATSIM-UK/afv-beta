<?php

namespace App\Events;

use App\Models\User;
use App\Models\Approval;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class UserApproved
{
    use Dispatchable, SerializesModels;

    public $approval;

    /**
     * Create a new event instance.
     *
     * @param Approval $approval
     */
    public function __construct(Approval $approval)
    {
        $this->approval = $approval;
    }

    public function getUser(): User
    {
        return $this->approval->user;
    }
}
