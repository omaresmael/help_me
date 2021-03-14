<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'name' =>'required|unique:schools',
            'name_english'=>'required|unique:schools',
            'stage'=>'required',
            'address'=>'required|string',
            'phone_number'=>'required|numeric|unique:schools',
            'fax_number'=>'required|numeric',
            'email'=>'required|unique:schools',
            'type'=>'required',
            'license_type'=> 'required',
            'country' => 'nullable',
            'city' => 'nullable',
            'area' => 'nullable',
            'part' => 'nullable',
            'street' => 'nullable',
            'geolocation' => 'nullable',
            'general_manager' => 'required'
        ];
    }
}
