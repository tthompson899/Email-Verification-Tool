<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use Illuminate\Database\Eloquent\Collection;
use App\User;

class UserRepository implements UserInterface
{
    /**
     * Find user by email
     */
    public function findBy($email)
    {
        User::firstWhere('email', 'like', $email . '%');
    }

    /**
     * Create new user
     */
    public function create($user)
    {
        User::create($user);
        // create a new row in product campaign
    }
}
