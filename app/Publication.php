<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Publication extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Coments', 'publication_id');
    }

    public function likes()
    {
        return $this->hasMany('App\Like', 'publication_id');
    }
}
