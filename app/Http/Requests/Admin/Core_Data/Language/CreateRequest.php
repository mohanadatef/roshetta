<?php

namespace App\Http\Requests\Admin\Core_Data\Language;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'code'=> 'required|string|unique:languages',
            'title'=> 'required|string|unique:languages',
            'order'=> 'required|unique:languages',
            'image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
}
