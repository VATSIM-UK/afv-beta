<?php

namespace App\Events;

use App\Models\Approval;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class UserExpressedInterest
{
    use Dispatchable, SerializesModels;

    /** @var Approval */
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

    public function getApproval() : Approval
    {
        return $this->approval;
    }
}
