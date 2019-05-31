<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Approval;
use App\Events\UserApproved;
use App\Listeners\SendApprovalNotification;
use App\Notifications\ApprovalWelcomeEmail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApprovalTest extends TestCase
{
    use RefreshDatabase;

    protected $approval;
    protected $user;

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

    /** @test */
    public function approved_approvals_can_be_scoped()
    {
        $approvals = factory(Approval::class, 3)->create();
        $pendingApprovals = factory(Approval::class, 2)->state('pending')->create();

        $this->assertCount(4, Approval::approved()->get());

        Approval::approved()->each(function ($item, $key) {
            $this->assertNotNull($item->approved_at);
        });
    }

    /** @test */
    public function pending_approvals_can_be_scoped()
    {
        $approvals = factory(Approval::class, 2)->create();
        $pendingApprovals = factory(Approval::class, 2)->state('pending')->create();

        $this->assertCount(2, Approval::pending()->get());

        Approval::pending()->each(function ($item, $key) {
            $this->assertNull($item->approved_at);
        });
    }

    /** @test */
    public function approved_at_is_casted_to_timestamp()
    {
        $this->assertInstanceOf(\DateTime::class, $this->approval->approved_at);
    }

    /** @test */
    public function can_detect_whether_a_user_has_made_a_request()
    {
        $user = factory(User::class)->create();
        $this->assertTrue($this->user->has_request);
        $this->assertFalse($user->has_request);
    }
}
