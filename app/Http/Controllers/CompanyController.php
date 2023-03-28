<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Services\CompanyService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use ApiResponse;

    /**
     * @param CompanyService $companyService
     */
    public function __construct(protected CompanyService $companyService)
    {

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $companies = $this->companyService->getByUser($request->user);
        return $this->responseSuccess('Success', ['companies' => $companies['body']]);

    }

    /**
     * @param StoreCompanyRequest $request
     * @return JsonResponse
     */
    public function store(StoreCompanyRequest $request): JsonResponse
    {
        $company = $this->companyService->store([
            'title' => $request->get('title'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'user_id' => $request->user->id
        ]);
        if ($company['status'] == 'Success') {
            return $this->responseSuccess('Success', $company['body']);
        }
        return $this->responseServerError($company['message']);
    }

}
