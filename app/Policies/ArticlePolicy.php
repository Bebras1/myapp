<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function update(User $user)
    {
        return auth()->check(); // Check if the user is authenticated
    }

    public function delete(User $user)
    {
        return auth()->check(); // Check if the user is authenticated
    }

    public function create(User $user)
    {
        return auth()->check(); // Check if the user is authenticated
    }
}
