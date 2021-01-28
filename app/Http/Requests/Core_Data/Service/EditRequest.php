<?php

namespace App\Http\Requests\Core_Data\Service;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
                'detail.*'=>'required',
                'title.*'=>'required|unique_translation:services,title,'.$this->id,
                'service_category_id' => 'required|exists:service_categories,id',
                'order'=> 'required|numeric|unique:services,order,'.$this->id.',id',
            ];

    }
    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'detail.*.required' => 'برجاء ادخال الوصف',
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'service_category_id.required' => 'برجاء ادخال الخدمه',
                'service_category_id.exists' => 'برجاء الاختيار من القائمه',
                'order.numeric' => 'برجاء ادخال ارقام',
            ] : [];
    }
}
