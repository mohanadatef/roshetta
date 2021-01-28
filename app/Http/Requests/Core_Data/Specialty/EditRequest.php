<?php

namespace App\Http\Requests\Core_Data\Specialty;

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
                'title.*'=>'required|unique_translation:specialties,title,'.$this->id,
                'order'=> 'required|numeric|unique:specialties,order,'.$this->id.',id',
                'image'=> 'image|mimes:jpg,jpeg,png,gif|max:2048',
            ];

    }
    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'order.numeric' => 'برجاء ادخال ارقام',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
            ] : [];
    }
}
