<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' =>'required|numeric',
            'name'=>'required|unique:schools,id',
            'name_english'=>'required|unique:schools,id',
            'stage'=>'required',
            'address'=>'required|string',
            'phone_number'=>'required|numeric|unique:schools,id',
            'fax_number'=>'required|numeric',
            'email'=>'required|unique:schools,id',
            'type'=>'required',
            'license_type'=> 'required',
            'nullable' => 'nullable',
            'city' => 'nullable',
            'area' => 'nullable',
            'part' => 'nullable',
            'street' => 'nullable',
            'geolocation' => 'nullable',
            'general_manager' => 'required'
        ];
    }
}
