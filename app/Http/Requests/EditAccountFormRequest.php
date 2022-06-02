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
            'name' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'username' => 'required|max:15|regex:/^[a-zA-Z0-9_\.]+$/',
            'email' => 'email',
            'profile' => 'image|mimes:jpg,png,jpeg,svg|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'name.regex' => 'Name must be in letters only',
            'name.max' => "Maximum 50 characters are allowed",
            'username.required' => 'Please Enter Username',
            'username.max' => 'Username must be less than 15 characters',
            'username.regex' => 'Username should only have lower,upper,.,numbers,_',
            'email.email' => 'Please Enter Valid Email',
            'profile.image' => 'Please upload valid Image',
            'profile.mimes' => 'Only jpg,png,jpeg,svg formats are allowed',
            'profile.max' => 'Image should be less than 3MB',
        ];
    }
}
