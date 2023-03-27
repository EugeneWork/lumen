<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

}
