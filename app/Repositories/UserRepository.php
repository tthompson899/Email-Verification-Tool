<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\ProductCampaign;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

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
        $newUser = User::create($user);
        // create a new row in product campaign

        $campaign = new ProductCampaign();
        $campaign->user_id = $newUser->id;
        $campaign->save();
    }
}
