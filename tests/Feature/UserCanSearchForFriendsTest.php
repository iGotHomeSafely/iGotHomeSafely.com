<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserCanSearchForFriendsTest extends TestCase
{
    use DatabaseTransactions;

    public function testUserCanSearchForFriend()
    {
        $user = factory(User::class)->create();
        $friend = factory(User::class)->create();

        $this->actingAs($user)
             ->visit('/search')
             ->type($friend->email, 'email')
             ->press('search')
             ->see($friend->email)
             ->see('Add '.$friend->name);

        $this->assertResponseOk();
    }
}
