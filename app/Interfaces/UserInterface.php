<?php

namespace App\Interfaces;

use App\Models\User;

interface UserInterface
{
    /**
     * Find user by email
     * @param $email
     */
    public function findBy($email);

    /**
     * Create new user
     * @param $user
     */
    public function create($user);

    /**
     * Get all users
     */
    public function all();
}
