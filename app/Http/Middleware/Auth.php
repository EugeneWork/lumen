<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepositoryInterface;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class Auth
{
    use ApiResponse;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->bearerToken()) {
            $user = $this->userRepository->getByApiToken($request->bearerToken());
            if ($user) {
                $request->merge(['user' => $user]);
                return $next($request);
            }
            return $this->responseUnauthorized("Wrong token");
        }
        return $this->responseUnauthorized("No token");
    }
}
