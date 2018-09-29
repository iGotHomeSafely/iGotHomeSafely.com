<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserCanViewDashboardTest extends TestCase
{
    use DatabaseTransactions;

    public function testUserCanViewDashboard()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->visit('/home')
             ->see('Dashboard');

        $this->assertResponseOk();
    }
}
