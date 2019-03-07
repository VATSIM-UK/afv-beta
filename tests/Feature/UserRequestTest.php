<?php

namespace Tests\Feature;

use App\Models\Approval;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRequestTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_user_can_make_a_request_to_sign_up_to_the_beta()
    {
        $name = $this->user->name_first;
        $this->actingAs($this->user)->post(route('requests.store'))
            ->assertSessionHas('success',
                "Thanks for registering! <br /> We will send you an follow up email if you are invited to the beta.");
    }

    /** @test */
    public function a_user_cannot_make_multiple_requests_to_sign_up()
    {
        $approval = factory(Approval::class)->create(['user_id' => $this->user]);
        $this->actingAs($this->user)->post(route('requests.store'))
            ->assertSessionHas('error', 'You have already made a request to signup to the beta.');

    }
}
