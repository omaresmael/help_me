<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'financial_year_id' => 'required',
            'name' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'financial_ratio' => 'required|integer',
            'schools'=>'required'
        ];
    }
}
