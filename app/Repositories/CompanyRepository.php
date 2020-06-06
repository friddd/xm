<?php

namespace App\Repositories;

use App\Dtos\CompanyHistoryDto;
use App\Models\Company;
use Illuminate\Support\Collection;

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
        return new Collection();
    }
}
