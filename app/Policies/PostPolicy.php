<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {

        return $user->id == $post->user_id || $user->is_admin;

    }

    public function edit(User $user, Post $post)
    {

        return $user->id == $post->user_id || $user->is_admin;
    }

    public function update(User $user, Post $post)
    {

        return $user->id == $post->user_id || $user->is_admin;
    }


}
