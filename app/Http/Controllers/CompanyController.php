<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CompanyService;
use App\Dtos\CompanyHistoryDto;
use App\Http\Requests\CompanyHistoryRequest;

class CompanyController extends Controller
{
    private CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function postHistory(CompanyHistoryRequest $request)
    {
        $companyHistoryDto = CompanyHistoryDto::fromArray($request->all());
        if ($request->validated()) {
            return view('history', [
                'history' => $this->companyService->getHistory($companyHistoryDto),
            ]);
        }
        else {
            return view('form', [
                'dictionary' => $this->companyService->getDictionary(),
            ]);
        }
    }

    public function getHistory()
    {
        return view('form', [
            'dictionary' => $this->companyService->getDictionary(),
        ]);
    }
}
