<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserSignupFormRequest extends FormRequest
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
            'username' => 'required|max: 15|regex:/^[A-Za-z][a-z0-9_]{7,29}$/|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/',
            'cpassword' => 'required|same:password|min:8',
            'profile' => 'required|image|mimes:jpg,png,jpeg,svg|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'name.max' => 'Maximum 50 characters are allowed',
            'name.regex' => 'Name must be in alphabets only',
            'username.required' => 'Please Enter Username',
            'username.max' => 'Maximum 15 characters are allowed',
            'username.regex' => 'Username should contain lower,upper,_,.,numbers',
            'username.unique' => 'Username already exists!!',
            'email.required' => 'Please Enter Email',
            'email.email' => 'Email should contain @,should have alphabets after .',
            'email.unique' => 'Email already exists',
            'password.required' => 'Please Enter Password',
            'password.regex' => 'Password must containe lower,upper,numbers,special characters and should be 8 characters long',
            'cpassword.required' => 'Please Enter Password Again',
            'cpassword.same' => 'Confirm password must be same as Password',
            'cpassword.min' => 'Password must be 8 characters long',
            'profile.required' => 'Please Upload Profile Image',
            'profile.image' => 'Please upload valid Image',
            'profile.mimes' => 'Only jpg,png,jpeg,svg image extension are allowed',
            'profile.max' => 'Image should be less than 3MB',
        ];
    }
}
