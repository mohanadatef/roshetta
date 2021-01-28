<?php

namespace App\Http\Requests\Core_Data\City;

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
            'title.*'=>'required|unique_translation:cities',
            'country_id' => 'required|exists:countries,id',
            'order' => 'required|numeric|unique:cities',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'country_id.required' => 'برجاء ادخال البلد',
                'country_id.exists' => 'برجاء الاختيار من القائمه',
                'order.numeric' => 'برجاء ادخال ارقام',
            ] : [];
    }
}
