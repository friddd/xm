<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    public function run()
    {
        $content = file_get_contents(config('app.companies_url'));
        $companies = json_decode($content);
        foreach ($companies as $value) {
            factory(Company::class)->create([
                'symbol' => $value->Symbol,
                'company_name' => $value->{'Company Name'},
                'security_name' => $value->{'Security Name'},
                'round_lot_size' => $value->{'Round Lot Size'},
                'financial_status' => $value->{'Financial Status'},
                'market_category' => $value->{'Market Category'},
                'test_issue' => $value->{'Test Issue'},
            ]);
        }
    }
}
