<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['body', 'user_id', 'thread_id'];


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }

    public function getCreatedAtFormatted()
    {
        return \Carbon\Carbon::parse($this->created_at)->diffForHumans();
    }
}
