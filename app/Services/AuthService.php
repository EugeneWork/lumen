<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Traits\ServiceResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthService
{
    use ServiceResponse;

    //This link sends to user mail for recover password .Frontend need to handles it (after user come to him) and take
    //last segment of it , and then send it to /api/user/reset-password with new password that user put
    const FRONTEND_LINK = 'test.com.ua/token/';

    /**
     * @param UserRepositoryInterface $userRepository
     * @param EmailService $emailService
     */
    public function __construct(protected UserRepositoryInterface $userRepository, protected EmailService $emailService)
    {
    }

    /**
     * @param $attributes
     * @return array
     */
    public function register($attributes): array
    {
        $user = $this->userRepository->create($attributes);
        if ($user->id) {
            return $this->success($user);
        }
        return $this->error("Can't store user");
    }


    /**
     * @param $attributes
     * @return array
     */
    public function login($attributes): array
    {
        $user = $this->userRepository->getByEmail($attributes['email']);
        if ($user) {
            if (Hash::check($attributes['password'], $user->password)) {
                $user = $this->userRepository->updateApiToken($user, Str::random(64));
                return $this->success($user);
            }
            return $this->error("Wrong password");
        }
        return $this->error("Wrong email");
    }


    /**
     * @param $email
     * @return array
     */
    public function passwordRecover($email): array
    {
        $user = $this->userRepository->getByEmail($email);
        if ($user) {
            $user = $this->userRepository->setEmailToken($user, Str::random(64));
            $this->emailService->recover(self::FRONTEND_LINK . $user->reset_email_token, $user->email);
            return $this->success($user);
        }
        return $this->error("Wrong email");
    }

    /**
     * @param $attributes
     * @return array
     */
    public function resetPassword($attributes): array
    {
        $user = $this->userRepository->getByEmailToken($attributes['reset_email_token']);
        if ($user) {
            $user = $user->update([
                'reset_email_token' => null,
                'password' => Hash::make($attributes['password']),
                'api_token' => null
            ]);
            return $this->success($user);
        }
        return $this->error("Wrong email token");
    }

    /**
     * @param $token
     * @return array
     */
    public function logout($token): array
    {
        $user = $this->userRepository->getByApiToken($token);
        if ($user) {
            $user = $user->update(['api_token' => null]);
            return $this->success($user);
        }
        return $this->error("Wrong token");
    }
}
