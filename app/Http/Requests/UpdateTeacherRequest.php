<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'school_id'=>'required|numeric',
            'national_number' => 'required|digits_between:12,14|unique:teachers,id',
            'speciality' => 'required',
            'birth_day' => 'required',
            'qualification' => 'required',
            'entity_acceptance_date' => 'required|date',
            'entity_acceptance_number' => 'required|numeric',
            'nationality'=>'required',
            'job' => 'required',
        ];
    }
}
