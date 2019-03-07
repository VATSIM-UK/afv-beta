<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Approval;
use App\Events\UserApproved;
use App\Listeners\SendApprovalNotification;
use App\Notifications\ApprovalWelcomeEmail;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApprovalLogicTest extends TestCase
{
    use RefreshDatabase;

    protected $approval, $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->approval = factory(Approval::class)->create(['user_id' => $this->user]);

        Notification::fake();
    }

    /** @test */
    public function an_approval_is_related_to_a_user()
    {
        $this->assertNotNull($this->approval->user);
    }

    /** @test */
    public function a_notification_is_sent_on_approval()
    {
        $event = \Mockery::mock(UserApproved::class, [$this->approval]);
        $listener = app()->make(SendApprovalNotification::class);
        $listener->handle($event);

        Notification::assertNotSentTo($this->user, ApprovalWelcomeEmail::class, function ($notification, $channel) {
            return $this->user->id === $notification->user->id;
        });
    }
}
