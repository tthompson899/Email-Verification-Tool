<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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
    public function create(Request $request)
    {
        # only get the requested data
        $data = $request->only(['first_name', 'last_name', 'email']);
        
        # verify user
        $email = $data['email'];

        if ($previousUser = $this->verify($email)) {
            return 'Unable to add user, ' . $previousUser->first_name . ' is already active.';
        }

        if ($user = $this->users->create($data)) {
            return 'User created.';
        }
    }

    /**
     * Verify email
     *
     * @param string $email
     * @return object
     */
    protected function verify($email)
    {
        // check if email is already in the database
        $user = $this->users->findBy($email);

        if ($user) {
            return $user;
        }

        return false;
    }
}
