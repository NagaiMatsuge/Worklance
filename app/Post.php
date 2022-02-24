<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
            'name',
            'description',
            'contact',
            'about',
            'reference',
            'user_id'
        ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function skills()
    {
        return $this->hasMany('App\PostSkill');
    }

}
