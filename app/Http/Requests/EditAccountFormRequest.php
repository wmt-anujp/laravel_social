<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAccountFormRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'username' => 'required|max:15|',
            'email' => 'required|email|',
            'profile' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'name.regex' => 'Name must be in letters only',
            'username.required' => 'Please Enter Username',
            'username.max' => 'Username must be less than 15 characters',
            'email.required' => 'Please Enter Email',
            'email.email' => 'Please Enter Valid Email',
            'profile.required' => 'Please Upload Profile Image',
            'profile.image' => 'Please upload valid Image',
            'profile.mimes' => 'Only jpg,png,jpeg,gif,svg formats are allowed',
            'profile.max' => 'Image should be less than 3MB',
        ];
    }
}
