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
    * @param $users UserInterface
    */
    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Create new user
     * @param Request $request
     * @return string
     */
    public function create(Request $request)
    {
        if (! $request->email) {
            return 'Email is required.';
        }

        if (! filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return 'Email is invalid.';
        }

        # only get the requested data
        $data = $request->only(['first_name', 'last_name', 'email']);

        if ($previousUser = $this->verify($data['email'])) {
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
     * @return object|bool
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
