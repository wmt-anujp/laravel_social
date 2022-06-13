<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class editAccountFormRequest extends FormRequest
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
            'name' => 'required|max:50',
            'username' => 'required|max: 15|regex:/^[A-Za-z][a-z0-9_]{7,29}$/|unique:users',
            'profile' => 'image|mimes:jpg,webp,png,jpeg,svg|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'name.max' => "Maximum 50 characters are allowed",
            'username.required' => 'Please Enter Username',
            'username.max' => 'Maximum 15 characters are allowed',
            'username.regex' => 'Username should contain lower,upper,_,.,numbers',
            'profile.mimes' => 'Only jpg,webp,png,jpeg,svg image extension are allowed',
            'profile.max' => 'Image should be less than 10MB',
        ];
    }
}
