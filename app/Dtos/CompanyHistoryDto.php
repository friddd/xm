<?php

namespace App\Dtos;

use Illuminate\Support\Carbon;

class CompanyHistoryDto
{
    private string $company_symbol;
    private Carbon $start_date;
    private Carbon $end_date;
    private string $email;

    private function __construct(
        string $company_symbol,
        Carbon $start_date,
        Carbon $end_date,
        string $email
    )
    {
        $this->company_symbol = $company_symbol;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->email = $email;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['company_symbol'],
            Carbon::parse($data['start_date']),
            Carbon::parse($data['end_date']),
            $data['email'],
        );
    }

    public function getCompanySymbol(): string
    {
        return $this->company_symbol;
    }

    public function getStartDate(): Carbon
    {
        return $this->start_date;
    }

    public function getEndDate(): Carbon
    {
        return $this->end_date;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
