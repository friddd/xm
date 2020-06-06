<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'symbol' => null,
        'company_name' => null,
        'security_name' => null,
        'round_lot_size' => 0,
        'financial_status' => null,
        'market_category' => null,
        'test_issue' => null,
    ];
});
