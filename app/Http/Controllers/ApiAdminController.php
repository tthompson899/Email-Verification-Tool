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

    /**
     * ApiAdminController constructor.
     * @param UserInterface $users
     */
    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Get all users
     */
    public function all()
    {
        return $this->users->all();
    }
}
