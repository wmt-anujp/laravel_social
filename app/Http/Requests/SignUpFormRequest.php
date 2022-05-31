<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpFormRequest extends FormRequest
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
            'name' => 'required|max: 50|regex: /^[\pL\s\-]+$/u/',
            'username' => 'required|max: 15|regex: /^[a-zA-Z0-9_\.]+$/|unique: users',
            'email' => 'required|email|unique:users|regex: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/',
            'dob' => 'required',
            'profile' => 'required|image|mimes:jpg,png,jpeg,svg|max:3000',
            'cpassword' => 'required|same:password|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'name.max' => 'Maximum 50 characters are allowed',
            'name.regex' => 'Name must be in letters only',
            'username.required' => 'Please Enter Username',
            'username.max' => 'Maximum 15 characters are allowed',
            'username.regex' => 'Username should contain lower,upper,_,.,numbers',
            'username.unique' => 'Username already exists!!',
            'email.required' => 'Please Enter Email',
            'email.email' => 'Please Enter Valid Email',
            'email.unique' => 'Email already exists',
            'email.regex' => 'Please Enter valid Email',
            'password.required' => 'Please Enter Password',
            'password.regex' => 'Password must containe lower,upper,numbers,special characters and should be 8 characters long',
            'dob.required' => 'Please Choose Date of Birth',
            'dob.max' => 'Please enter date less than 31/12/2022',
            'profile.required' => 'Please Upload Profile Image',
            'profile.image' => 'Please upload valid Image',
            'profile.mimes' => 'Only jpg,png,jpeg,svg image extension are allowed',
            'profile.max' => 'Image should be less than 3MB',
            'cpassword.required' => 'Please Enter Password Again',
            'cpassword.same' => 'Confirm password must be same as Password',
            'cpassword.min' => 'Password must be 8 characters long',
        ];
    }
}
