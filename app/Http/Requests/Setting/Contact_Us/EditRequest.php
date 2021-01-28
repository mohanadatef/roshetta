<?php

namespace App\Http\Requests\Setting\Contact_Us;

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
            'address.*'=>'required',
            'time_work.*'=>'required',
            'email' => 'required|email|max:255|string|unique:contact_us,email,'.$this->id.',id',
            'mobile'=>'required|numeric|digits:11',
        ];
    }
    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'address.*.required' => 'برجاء ادخال العنوان',
                'mobile.numeric' => 'برجاء ادخال ارقام',
                'time_work.*.required' => 'برجاء ادخال وقت العمل',
                'mobile.required' => 'برجاء ادخال الهاتف',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => ' برجاء ادخال البريد الالكتروني غير متكرر',
            'mobile.digits' => 'برجاء ادخال ارقام 11',
            ] : [];
    }
}
