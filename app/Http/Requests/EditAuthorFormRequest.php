<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAuthorFormRequest extends FormRequest
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
            //
            'a_fname' => 'required|max:120|regex:/^[\pL\s\-]+$/u',
            'a_lname' => 'required|max:120|regex:/^[\pL\s\-]+$/u',
            'a_dob' => 'required',
            'a_gen' => 'required',
            'a_address' => 'required|max:300',
            'a_mobile_no' => 'required|min:10|numeric',
            'a_desc' => 'required|max:300'
        ];
    }
    public function messages()
    {
        return [
            'a_fname.required' => 'Please Enter First Name',
            'a_fname.max' => 'Maximum 120 Characters allowed',
            'a_fname.regex' => 'First Name must be in characters only',
            'a_lname.required' => 'Please Enter Last Name',
            'a_lname.max' => 'Maximum 120 Characters allowed',
            'a_lname.regex' => 'Last Name must be in characters only',
            'a_dob.required' => 'Please Choose Date of Birth',
            'a_gen.required' => 'Please Choose Gender',
            'a_address.required' => 'Please Enter Address',
            'a_address.max' => 'Maximum 300 characters allowed',
            'a_mobile_no.required' => 'Please Enter Mobile No.',
            'a_mobile_no.min' => 'Minimum 10 digits are required',
            'a_mobile_no.numeric' => 'Mobile Number Must be Numeric',
            'a_desc.required' => 'Please Enter Author\'s Description',
            'a_desc.max' => 'Maximum 300 characters allowed',
        ];
    }
}
