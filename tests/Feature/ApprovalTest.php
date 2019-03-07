<?php

namespace Tests\Feature;

use App\Events\UserApproved;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
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
        $this->post(route('users.approve', $this->user), [
            'user_id' => $this->user->id,
        ])->assertSessionHas('success', 'User(s) successfully approved!');

        Event::assertDispatched(UserApproved::class, function ($event) {
            return $event->getUser()->id === $this->user->id;
        });
    }
}
