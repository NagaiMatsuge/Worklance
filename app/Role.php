<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
