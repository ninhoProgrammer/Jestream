<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function author(User $user, Post $post)
    {
        if($user->id == $post->user_id)
            return true;
        else
            return false;
    }

    public function published(User $user, Post $post)
    {
        if($post->status = 1)
            return true;
        else
            return false;
    }

}
