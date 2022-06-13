<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class NewPostFormRequest extends FormRequest
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
            'media' => 'required|mimes:jpg,jpeg,webp,png,gif,mp4,ogg,ogv,avi,mpeg,mov,wmv,flv,mkv|max:15000',
        ];
    }

    public function messages()
    {
        return [
            'caption.required' => 'Please Enter Caption',
            'caption.max' => 'Maximum 300 characters allowed',
            'media.required' => 'Please Upload Post Image',
            'media.mimes' => 'Only jpg,jpeg,webp,png,gif,mp4,ogg,ogv,avi,mpeg,mov,wmv,flv,mkv image or video extension are allowed',
            'media.max' => 'File should be less than 15MB',
        ];
    }
}
