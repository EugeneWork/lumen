<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Traits\ApiResponse;

class UserController extends Controller
{
    use ApiResponse;
    /**
     * @param UserService $userService
     */
    public function __construct(protected UserService $userService)
    {

    }

}
