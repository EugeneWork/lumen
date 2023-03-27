<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Traits\ServiceResponse;

class AuthService
{
    use ServiceResponse;
    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @param $attributes
     * @return array
     */
    public function register($attributes):array
    {
        $user=$this->userRepository->create($attributes);
        if($user->id){
            return $this->success($user);
        }
        return $this->error("Can't store user");
    }

}
