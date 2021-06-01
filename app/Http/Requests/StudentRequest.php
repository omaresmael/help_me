<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
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
            'dateOfBirth' => 'required|date',
            'gender' => 'required',
            'guardian_national_number' => 'required|different:national_number|digits_between:12,14',
            'email' => 'required|regex:/^.+@.+$/i|unique:students',
            'ministry_nomination' => 'sometimes',
            'school_nomination' => 'sometimes',
            'program_school_id' => 'nullable|numeric',
            'disability_type' => 'required',
            'disability_power' => 'required',
            'attendance_begin' => 'required|date',
            'attendance_end' => 'required|date|after:attendance_begin',
            'date_send' => 'required|date',
            'report_type' =>'required',
            'section' =>'required'
        ];
    }
}
