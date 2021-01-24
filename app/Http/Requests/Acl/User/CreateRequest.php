<?php

namespace App\Http\Requests\Acl\User;

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
            'first_title.*' => 'required|unique_translation:users',
            'second_title.*' => 'required|unique_translation:users',
            'gender' => 'required|string',
            'mobile' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|string|unique:users',
            'date_birth' => 'required|date',
            'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function messages()
    {
        if (Language_Locale() == 'ar') {
            return [
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
                'first_title.*.required' => 'برجاء ادخال الاسم',
                'first_title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'second_title.*.required' => 'برجاء ادخال الاسم',
                'second_title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'gender.required' => 'برجاء ادخال النوع',
                'mobile.required' => 'برجاء ادخال الموبيل',
                'mobile.unique' => 'لا يمكن ادخال الموبيل متكرر',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => 'لا يمكن ادخال البريد الالكتروني متكرر',
                'date_birth.required' => 'برجاء ادخال تاريخ الميلاد',
                'date_birth.date' => 'برجاء ادخال تاريخ الميلاد تاريخ',
                'image.required' => 'برجاء ادخال الصوره',
                'password.required' => 'برجاء ادخال كلمه السر',
                'password.string' => 'برجاء ادخال كلمه السر حروف',
                'password.confirmed' => 'برجاء ادخال تاكيد كلمه السر',
                'password.min' => 'برجاء ادخال كلمه السر اكثر من 6',
            ];
        }
        else{
            return [];
        }
    }
}
