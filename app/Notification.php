<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'start',
        'finish',
        'home',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
