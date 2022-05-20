<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBookFormRequest extends FormRequest
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
            'b_title' => 'required|max:100',
            'b_pages' => 'required|numeric',
            'b_lang' => 'required|regex:/^[\pL\s\-]+$/u',
            'b_author' => 'required',
            'b_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
            'b_isbn' => 'required|unique:books,book_isbn',
            'b_desc' => 'required|max:300',
            'b_price' => 'required|numeric',
        ];
    }
}
