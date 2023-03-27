<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\UserService;
use App\Traits\ApiResponse;

class CompanyController extends Controller
{
    use ApiResponse;

    /**
     * @param CompanyService $companyService
     */
    public function __construct(protected CompanyService $companyService)
    {

    }

}
