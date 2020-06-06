<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyHistoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_symbol' => ['required', 'exists:companies,symbol'],
            'start_date' => ['required', 'date_format:Y-m-d', 'before_or_equal:end_date', 'before_or_equal:'.date('Y-m-d')],
            'end_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:start_date', 'before_or_equal:'.date('Y-m-d')],
            'email' => ['required', 'email'],
        ];
    }
}
