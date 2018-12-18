<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use \Conner\Tagging\Taggable;

    protected $fillable = ['title', 'body', 'user_id'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function getCreatedAtFormatted()
    {
        return \Carbon\Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getTagsSeparatedByComma()
    {
        return implode(',', $this->tagNames());
    }
}
