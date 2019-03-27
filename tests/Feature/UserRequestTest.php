<?php

namespace Tests\Feature;

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
        $this->actingAs($this->user)
            ->followingRedirects()
            ->post(route('requests.store'))
            ->assertSee('Thanks For Registering!');
    }
}
