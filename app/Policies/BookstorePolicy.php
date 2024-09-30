<?php

namespace App\Policies;

use App\Models\Bookstore;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookstorePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Bookstore $bookstore)
    {
        return $user->id === $bookstore->user_id;
    }
}