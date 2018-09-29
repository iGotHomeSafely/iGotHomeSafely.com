<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friends()
    {
        return $this->belongsToMany('App\User', 'friend_user', 'user_id', 'friend_id')->where('validated', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function receivedInvites()
    {
        return $this->belongsToMany('App\User', 'friend_user', 'friend_id', 'user_id')->where('validated', 0);
    }

    public function notifications()
    {
        $this->hasMany('App\Notifications');
    }

    public function getLastCheckinAttribute()
    {
        return Notification::where('user_id', $this->id)->max('created_at');
    }
}
