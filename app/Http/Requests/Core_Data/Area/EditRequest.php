<?php

namespace App\Http\Requests\Core_Data\Area;

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
                'title.*'=>'required|unique_translation:areas,title,'.$this->id,
                'country_id' => 'required|exists:countries,id',
                'city_id' => 'required|exists:cities,id',
                'order'=> 'required|numeric|unique:areas,order,'.$this->id.',id',
            ];

    }
    public function messages()
    {
        if (Language_Locale() == 'ar') {
            return [
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'country_id.required' => 'برجاء ادخال البلد',
                'country_id.exists' => 'برجاء الاختيار من القائمه',
                'city_id.required' => 'برجاء ادخال المدينه',
                'city_id.exists' => 'برجاء الاختيار من القائمه',
                'order.numeric' => 'برجاء ادخال ارقام',
            ];
        }
        else{
            return [];
        }
    }
}
