<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function publication()
    {
        $this->belongsTo('App\Publication', 'publication_id');
    }
}
