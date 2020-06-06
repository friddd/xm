<?php

namespace App\Repositories;

use App\Dtos\CompanyHistoryDto;
use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class CompanyRepository implements \App\Contracts\Repositories\CompanyRepository
{
    private Company $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function getDictionary(): Collection
    {
        return $this->model
            ->get()
            ->pluck('company_name', 'symbol')
            ->prepend('-- Select --','');
    }

    public function getHistory(CompanyHistoryDto $companyHistoryDto): Collection
    {
        $endpointUrl = config('app.finance_api.prefix').config('app.finance_api.url').config('app.finance_api.endpoint');
        $response = Http::withHeaders([
            'x-rapidapi-host' => config('app.finance_api.url'),
            'x-rapidapi-key' => config('app.finance_api.token'),
            'useQueryString' => true
        ])->get($endpointUrl, [
            'frequency' => '1d',
            'filter' => 'history',
            'period1' => $companyHistoryDto->getStartDate()->timestamp,
            'period2' => $companyHistoryDto->getEndDate()->timestamp,
            'symbol'=> $companyHistoryDto->getCompanySymbol(),
        ]);

        $jsonData = $response->json();

        foreach ($jsonData['prices'] as $key => $value) {
            if (
                empty($value['open']) ||
                empty($value['high']) ||
                empty($value['low']) ||
                empty($value['close']) ||
                empty($value['volume'])
            ) {
                unset($jsonData['prices'][$key]);
            }
        }

        return collect($jsonData['prices']);
    }
}
