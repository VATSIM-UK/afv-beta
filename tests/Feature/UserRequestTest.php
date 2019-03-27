<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Approval;
use App\Events\UserExpressedInterest;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRequestTest extends TestCase
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
    public function a_user_can_make_a_request_to_sign_up_to_the_beta()
    {
        $this->actingAs($this->user)
            ->followingRedirects()
            ->post(route('requests.store'))
            ->assertSee('Thanks For Registering!');
    }

    /** @test */
    public function a_user_cannot_make_multiple_requests_to_sign_up()
    {
        factory(Approval::class)->create(['user_id' => $this->user]);
        $this->actingAs($this->user)->post(route('requests.store'))
            ->assertSessionHas('error', 'You have already made a request to signup to the beta.');
    }


    /** @test */
    public function an_email_is_sent_to_a_user_once_they_have_expressed_interest()
    {
        $this->actingAs($this->user)->post(route('requests.store'))
            ->assertRedirect();

        Event::assertDispatched(UserExpressedInterest::class);
    }
}
