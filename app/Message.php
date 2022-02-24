<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillabel = [
        'text',
        'user_id',
        'from_user_id'
    ];

    public function toUser()
    {
        return $this->belongsTp('App\User');
    }
}
