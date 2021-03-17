<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SittingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'required|data|after:start_at',
            'price' => 'required|integer',
            'teacher_id'=>'required'
        ];
    }
}
