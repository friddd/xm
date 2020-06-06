<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Company
 *
 * @property string $symbol
 * @property string $company_name
 * @property string $security_name
 * @property int $round_lot_size
 * @property string $financial_status
 * @property string $market_category
 * @property string $test_issue
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */

class Company extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'symbol';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;
}
