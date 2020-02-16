<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\ProductCampaignUser as ProductCampaignUser;

class ProductCampaignUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 200)->create();
        $users->each(function ($user) {
            factory(ProductCampaignUser::class)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
