<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class UserCanViewDashboardTest extends TestCase
{
    public function testUserCanViewDashboard()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
             ->visit('/home')
             ->see('Dashboard');

        $this->assertResponseOk();
    }
}
