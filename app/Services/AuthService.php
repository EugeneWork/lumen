<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Traits\ServiceResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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


    /**
     * @param $attributes
     * @return array
     */
    public function login($attributes):array
    {
        $user=$this->userRepository->getByEmail($attributes['email']);
        if($user){
            if(Hash::check($attributes['password'], $user->password)) {
                $user=$this->userRepository->updateApiToken($user,Str::random(16));
                return $this->success($user);
            }
            return $this->error("Wrong password");
        }
        return $this->error("Wrong email");
    }

    public function passwordRecover($attributes)
    {
        $user=$this->userRepository->getByEmail($attributes);
        if($user){

        }
        return $this->error("Wrong email");
    }
}
