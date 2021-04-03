<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        //dd($this->user());
        $rules =  [
            'name'=>'required|string',
            'position' =>'required|string',
            'email'=>'required|email',
            Rule::unique('users')->ignore($this->user),

        ];
        if($this->method()=="POST"){
            $rules['password']='sometimes|required|string|min:6';
            $rules['passwordConfirm']='sometimes|required_with:password|same:password';
        }
        return $rules;
    }
}
