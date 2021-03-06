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
        return ['name'=>'required','national_number'=>'required','guardian_name'=>'required','guardian_national_number'=>'required','email'=>'required','ministry_nomination'=>'required','school_nomination'=>'required','program_school_id'=>'required'];
    }
}
