<?php

namespace App\Http\Requests\Core_Data\Language;

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
            'title' => 'required|string|unique:languages',
            'code' => 'required|string|unique:languages',
            'order' => 'required|numeric|unique:languages',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'title.required' => 'برجاء ادخال الاسم',
                'title.string' => 'برجاء ادخال الاسم حروف',
                'title.unique' => 'لا يمكن ادخال الاسم متكرر',
                'code.required' => 'برجاء ادخال كود',
                'code.string' => 'برجاء ادخال كود حروف',
                'code.unique' => 'لا يمكن ادخال كود متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'image.required' => 'برجاء ادخال الصوره',
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
                'order.numeric' => 'برجاء ادخال ارقام',
            ] : [];
    }
}
