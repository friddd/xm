<?php

namespace App\Services;

use App\Contracts\Repositories\CompanyRepository;
use App\Dtos\CompanyHistoryDto;
use App\Mail\CompanyHistoryMail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class CompanyService implements \App\Contracts\Services\CompanyService
{
    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getDictionary(): Collection
    {
        return $this->companyRepository->getDictionary();
    }

    public function getHistory(CompanyHistoryDto $companyHistoryDto): Collection
    {
        $history = $this->companyRepository->getHistory($companyHistoryDto);

        $dictionary = self::getDictionary();
        $subject = $dictionary->get($companyHistoryDto->getCompanySymbol());
        $mail = new CompanyHistoryMail($subject, $companyHistoryDto);

        Mail::to($companyHistoryDto->getEmail())->send($mail);

        return $history;
    }
}
