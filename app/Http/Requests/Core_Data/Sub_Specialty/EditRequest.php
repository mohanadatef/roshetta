<?php

namespace App\Http\Requests\Core_Data\Sub_Specialty;

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
                'title.*'=>'required|unique_translation:sub_specialties,title,'.$this->id,
                'specialty_id' => 'required|exists:specialties,id',
                'order'=> 'required|numeric|unique:sub_specialties,order,'.$this->id.',id',
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
                'specialty_id.required' => 'برجاء ادخال البلد',
                'specialty_id.exists' => 'برجاء الاختيار من القائمه',
            ] : [];
    }
}
