<?php

namespace App\Http\Requests\Core_Data\Service_Category;

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
            'title.*'=>'required|unique_translation:service_categories',
            'order' => 'required|numeric|unique:service_categories',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'image.required' => 'برجاء ادخال الصوره',
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
                'order.numeric' => 'برجاء ادخال ارقام',
            ] : [];
    }
}
