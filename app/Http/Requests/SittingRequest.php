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
            'price' => 'required|integer',
            'teacher_id'=>'required|numeric',
            'student_id'=>'required|numeric',
            'start_at' => 'required',
            'end_at' => 'required'
        ];
    }
}
