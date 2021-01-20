<?php

namespace App\Http\Requests\Setting\Contact_Us;

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
            'address.*'=>'required',
            'time_work.*'=>'required',
            'email' => 'email|max:255|string|unique:contact_us',
            'mobile'=>'required',
        ];
    }
    public function messages()
    {
        if (Language_Locale() == 'ar') {
            return [
                'address.*.required' => 'برجاء ادخال العنوان',
                'time_work.*.required' => 'برجاء ادخال وقت العمل',
                'mobile.required' => 'برجاء ادخال الهاتف',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => ' برجاء ادخال البريد الالكتروني غير متكرر',
            ];
        }
        else{
            return [];
        }
    }
}
