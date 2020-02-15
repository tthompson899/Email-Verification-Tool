<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Routing\Controller as BaseController;

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
        $data = request()->only('first_name', 'last_name', 'email');
        
        # verify method
        $email = $data['email'];
        $this->verify($email);
    }

    /**
     * Verify email
     */
    public function verify($email)
    {
        // check if email is already in the database
        // $user = $this->users->where('email', $email);

        // dd($user);
    }
}
