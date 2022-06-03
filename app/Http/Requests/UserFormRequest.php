<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required|max: 50',
            'email' => 'required|email',
            'mobile'=> 'required|max: 13|regex:/^[0-9]+$/',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Please Enter Name',
            'name.max' => 'Maximum 50 characters are allowed',
            'email.required' => 'Please Enter Email',
            'email.email' => 'Please Enter Valid Email',
            'email.regex' => 'Please Enter valid Email',
            'mobile.required'=>'Please enter mobile number',
            'mobile.max'=> 'Maximum 13 digits are allowed',
            'mobile.regex'=>'Only number are allowed',
        ];
    }
}
