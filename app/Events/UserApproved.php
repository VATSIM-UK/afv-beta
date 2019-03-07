<?php

namespace App\Events;

use App\Models\Approval;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $approval;

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

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
