<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostFormRequest extends FormRequest
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
            'caption' => 'required|max:300',
            'post_country' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'caption.required' => 'Please Enter Post Description',
            'caption.max' => 'Maximum 300 characters allowed',
            'post_country.required' => 'Please Select Country',
        ];
    }
}
