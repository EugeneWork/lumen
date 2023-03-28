<?php

namespace App\Services;

use App\Repositories\CompanyRepositoryInterface;
use App\Traits\ServiceResponse;

class CompanyService
{
    use ServiceResponse;

    /**
     * @param CompanyRepositoryInterface $companyRepository
     */
    public function __construct(protected CompanyRepositoryInterface $companyRepository)
    {
    }

    /**
     * @param $user
     * @return array
     */
    public function getByUser($user): array
    {
        return $this->success($user->companies);
    }

    /**
     * @param $attributes
     * @return array
     */
    public function store($attributes): array
    {
        $company = $this->companyRepository->create($attributes);
        if ($company->id) {
            return $this->success($company);
        }
        return $this->error("Can't store company");
    }

}
