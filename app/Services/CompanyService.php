<?php

namespace App\Services;

use App\Repositories\CompanyRepositoryInterface;

class CompanyService
{

    /**
     * @param CompanyRepositoryInterface $companyRepository
     */
    public function __construct(protected CompanyRepositoryInterface $companyRepository)
    {
    }

}
