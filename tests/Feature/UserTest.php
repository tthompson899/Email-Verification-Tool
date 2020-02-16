<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create user
     *
     * @return void
     */
    public function testCreateUserTest()
    {
        $faker = \Faker\Factory::create();

        $data = [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->unique->email
        ];

        $response = $this->post(route('api.users.create', $data));

        $response->assertOk();
    }

    /**
     * User already exists
     *
     * @return void
     */
    public function testUserExistsTest()
    {
        $user = factory(\App\Models\User::class)->create([
            'first_name' => 'Abigail',
            'last_name' => 'Johnston',
            'email' => 'abby@johnston.com'
        ]);

        $requestData = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email
        ];

        $response = $this->post(route('api.users.create', $requestData));

        $response->assertStatus(200);
    }
}
