<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
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
            'name'=>'required',
            'name_english'=>'required',
            'phone_number'=>'required|numeric|unique:schools,id',
            'email'=>'required|unique:schools,id',
            'address'=>'required',
            'state'=>'required'
        ];
    }
}
