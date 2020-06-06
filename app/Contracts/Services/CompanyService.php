<?php

namespace App\Contracts\Services;

use App\Dtos\CompanyHistoryDto;
use Illuminate\Support\Collection;

interface CompanyService
{
    public function getDictionary(): Collection;
    public function getHistory(CompanyHistoryDto $companyHistoryDto): Collection;
}
