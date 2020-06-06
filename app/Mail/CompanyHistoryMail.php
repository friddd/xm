<?php

namespace App\Mail;

use App\Dtos\CompanyHistoryDto;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class CompanyHistoryMail extends Mailable
{
    use Queueable, SerializesModels;

    private Carbon $startDate;
    private Carbon $endDate;

    public function __construct(string $subject, CompanyHistoryDto $companyHistoryDto)
    {
        $this->subject($subject);
        $this->startDate = $companyHistoryDto->getStartDate();
        $this->endDate = $companyHistoryDto->getEndDate();
    }

    public function build(): self
    {
        return $this->view('mail', [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ]);
    }
}
