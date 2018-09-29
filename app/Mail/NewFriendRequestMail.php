<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewFriendRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    private $friend;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $friend, User $user)
    {
        $this->friend = $friend;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-friend-request')->with('friend', $this->friend)->with('user', $this->user);
    }
}
