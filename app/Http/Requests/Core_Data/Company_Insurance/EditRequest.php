<?php

namespace App\Http\Requests\Core_Data\Company_Insurance;

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
                'title.*'=>'required|unique_translation:company_insurances,title,'.$this->id,
                'order'=> 'required|numeric|unique:company_insurances,order,'.$this->id.',id',
            ];

    }
    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'order.numeric' => 'برجاء ادخال ارقام',
            ] : [];
    }
}
