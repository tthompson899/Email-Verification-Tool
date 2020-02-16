<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\Eloquent\Collection;

class ApiAdminController extends BaseController
{
    /**
     * @var UserInterface
     */
    protected $users;

    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    public function all()
    {
        $allUsers = $this->users->all();

        return $allUsers;
    }
}
