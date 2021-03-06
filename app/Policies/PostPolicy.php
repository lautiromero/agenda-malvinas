<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Post $post)
    {
        if ($user->id == $post->user->id) {
            return true;
        } elseif ($user->roles->pluck('name')[0] ?? '' === 'admin') {
            return true;
        } else {
            return false;
        }
        
    }

    public function published(?User $user, Post $post)
    {
        if ($post->status == 2) {
            return true;
        } elseif (isset($user->id)) {
            if($user->id == $post->user->id) {
                return true;
            }
        } else {
            return false;
        }
    }
}
