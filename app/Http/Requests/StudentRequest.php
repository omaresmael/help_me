<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required|string|min:8',
            'national_number' => 'required|digits_between:12,14|unique:students',
            'guardian_name' => 'required|different:name|string|min:8',
            'guardian_national_number' => 'required|different:national_number|digits_between:12,14',
            'email' => 'required|regex:/^.+@.+$/i|unique:students',
            'ministry_nomination' => 'sometimes|boolean',
            'school_nomination' => 'sometimes|boolean',
            'program_school_id' => 'required|numeric'
        ];
    }
}
