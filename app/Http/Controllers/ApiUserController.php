<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;


class ApiUserController extends BaseController
{

    /**
    * @var UserInterface
    */
    protected $users;

    /**
    * @param UserInterface
    */
    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Create new user
     */
    public function create()
    {
        # only get the requested data
        $data = request()->only('first_name', 'last_name', 'email');
        
        # verify user
        $email = $data['email'];

        if ($previousUser = $this->verify($email)) {
            return $previousUser->first_name . ' is already active.';
        }

        $this->users->create($data);
    }

    /**
     * Verify email
     *
     * @param string $email
     * @return object
     */
    public function verify($email)
    {
        // check if email is already in the database
        $user = $this->users->findBy($email);
        return $user;
    }
}
