<?php

namespace Tests\Feature;

use App\Events\UserApproved;
use App\Models\Approval;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApprovalTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        Event::fake();
    }

    /** @test */
    public function a_user_can_be_approved()
    {
        factory(Approval::class)->create(['user_id' => $this->user->id]);
        $this->patch(route('users.approve', $this->user))
            ->assertRedirect()->assertSessionHas('success', 'User(s) successfully approved!');

        Event::assertDispatched(UserApproved::class, function ($event) {
            return $event->getUser()->id === $this->user->id;
        });
    }

    /** @test */
    public function a_user_is_not_approved_if_they_havent_requested_it()
    {
        $this->patch(route('users.approve', $this->user))
            ->assertRedirect()->assertSessionHas('error');

        Event::assertNotDispatched(UserApproved::class);
    }
}
