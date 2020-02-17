<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\ProductCampaignUser;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

class UserRepository implements UserInterface
{
    /**
     * Find user by email
     * @param $email
     * @return object
     */
    public function findBy($email)
    {
        return User::where('email', 'like', $email . '%')->first();
    }

    /**
     * Create new user
     *
     * @param $user
     * @return bool
     */
    public function create($user)
    {
        $newUser = User::create($user);

        $campaign = new ProductCampaignUser();
        $campaign->user_id = $newUser->id;
        $campaign->save();

        return true;
    }

    /**
     * Get all users
     *
     * @return object
     */
    public function all()
    {
        $users = User::get();

        return $users->sortByDesc('id');
    }
}
