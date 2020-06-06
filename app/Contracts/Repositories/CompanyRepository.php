<?php

namespace App\Contracts\Repositories;

use App\Dtos\CompanyHistoryDto;
use Illuminate\Support\Collection;

interface CompanyRepository
{
    public function getDictionary(): Collection;
    public function getHistory(CompanyHistoryDto $companyHistoryDto): Collection;
}
