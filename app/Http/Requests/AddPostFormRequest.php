<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostFormRequest extends FormRequest
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
            'title' => 'required|max:120',
            'desc' => 'required|max:300',
            'post_image' => 'required|mimes:jpg,jpeg,png,gif,mp4,ogg,ogv,avi,mpeg,mov,wmv,flv,mkv|max:5000',
            'post_country' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please Enter Post Title',
            'title.max' => 'Maximum 120 characters allowed',
            'desc.required' => 'Please Enter Post Description',
            'desc.max' => 'Maximum 300 characters allowed',
            'post_image.required' => 'Please Upload Post Image',
            'post_image.mimes' => 'Only jpg,jpeg,png,gif,mp4,ogg,ogv,avi,mpeg,mov,wmv,flv,mkv image or video extension are allowed',
            'post_image.max' => 'File should be less than 5MB',
            'post_country.required' => 'Please Select Country',
        ];
    }
}
