<?php

namespace Tests\Unit\Services;

use App\Contracts\Repositories\CompanyRepository;
use App\Dtos\CompanyHistoryDto;
use App\Mail\CompanyHistoryMail;
use App\Services\CompanyService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CompanyServiceTest extends TestCase
{
    protected CompanyRepository $companyRepository;
    private CompanyService $companyService;

    public function setUp(): void
    {
        parent::setUp();
        $this->companyRepository = $this->getMockBuilder(CompanyRepository::class)->getMock();
        $this->companyService = new CompanyService($this->companyRepository);
    }

    public function testGetDictionary(): void
    {
        $this->companyRepository
            ->expects($this->once())
            ->method('getDictionary')
            ->willReturn(new Collection([1,2]));

        $dictionary = $this->companyService->getDictionary();
        $this->assertInstanceOf(Collection::class, $dictionary);
        $this->assertCount(2, $dictionary);
    }

    public function testGetHistory(): void
    {
        $companyHistoryDto = CompanyHistoryDto::fromArray([
            'company_symbol' => 'AAIT',
            'start_date' => '2020-05-01',
            'end_date' => '2020-06-01',
            'email' => 'test@test.com',
        ]);

        $this->companyRepository
            ->expects($this->once())
            ->method('getDictionary')
            ->willReturn(new Collection([1,2]));

        $this->companyRepository
            ->expects($this->once())
            ->method('getHistory')
            ->willReturn(new Collection([1,2,3]));

        Mail::fake();
        $history = $this->companyService->getHistory($companyHistoryDto);
        $this->assertInstanceOf(Collection::class, $history);
        Mail::assertSent(CompanyHistoryMail::class);
        $this->assertCount(3, $history);
    }
}
