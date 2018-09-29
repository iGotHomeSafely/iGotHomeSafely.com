<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserCanSendFriendRequest extends TestCase
{
    use DatabaseTransactions;

    public function testUserCanSendFriendRequest()
    {
        $user = factory(User::class)->create();
        $user->email_verified_at = '2018-09-29 02:36:12';
        $user->save();

        $friend = factory(User::class)->create();
        $friend->email_verified_at = '2018-09-29 02:36:12';
        $friend->save();

        $this->actingAs($user)
             ->visit('/search')
             ->type($friend->email, 'email')
             ->press('search')
             ->see($friend->email)
             ->press('Add '.$friend->name)
             ->seePageIs('/home');

        $this->assertResponseOk();
    }
}
