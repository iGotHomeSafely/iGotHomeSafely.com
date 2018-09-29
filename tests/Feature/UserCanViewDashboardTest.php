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
        $user->email_verified_at = '2018-09-29 02:36:12';
        $user->save();

        $this->actingAs($user)
             ->visit('/home')
             ->see('Dashboard');

        $this->assertResponseOk();
    }
}
