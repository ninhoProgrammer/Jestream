<?php

namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App; 
use Illuminate\Support\Facades\Storage;


use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function creating(Post $post)
    {
        if (!App::runningInConsole()) {
            $post->user_id = Auth::id();
        }
    }
 

    /**
     * Handle the Post "updated" event.
     */
    public function deleting(Post $post)
    {
        Storage::delete($post->image->url);
    }

}
