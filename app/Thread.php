<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
