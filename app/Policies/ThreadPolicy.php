<?php

namespace App\Policies;

use App\User;
use App\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can delete the thread.
     *
     * @param  \App\User  $user
     * @param  \App\Thread  $thread
     * @return mixed
     */
    public function delete(User $user, Thread $thread)
    {
        return $user->id == $thread->user_id || $user->is_admin;
    }

    /**
     * @param User $user
     * @param Thread $thread
     * @return bool
     */
    public function update(User $user, Thread $thread)
    {
        return $user->id == $thread->user_id || $user->is_admin;
    }
}
