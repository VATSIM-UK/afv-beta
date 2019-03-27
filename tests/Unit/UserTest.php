<?php

namespace Tests\Unit;

use App\Models\Approval;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function it_has_approvals()
    {
        factory(Approval::class)->create(['user_id' => $this->user->id]);
        $this->assertInstanceOf(Approval::class, $this->user->approval);
    }

    /** @test */
    public function it_has_approval_requests()
    {
        $this->assertFalse($this->user->has_request);
        factory(Approval::class)->create(['user_id' => $this->user->id]);
        $this->assertTrue($this->user->fresh()->has_request);
    }

    /** @test */
    public function it_can_be_approved()
    {
        factory(Approval::class)->state('pending')->create(['user_id' => $this->user->id]);
        $this->assertFalse($this->user->approved);
        $this->user->approval->first()->setAsApproved();
        $this->assertTrue($this->user->fresh()->approved);
    }

    /** @test */
    public function it_can_be_pending()
    {
        factory(Approval::class)->state('pending')->create(['user_id' => $this->user->id]);
        $this->assertTrue($this->user->pending);
        $this->user->approval->first()->setAsApproved();
        $this->assertFalse($this->user->fresh()->pending);
    }
}
