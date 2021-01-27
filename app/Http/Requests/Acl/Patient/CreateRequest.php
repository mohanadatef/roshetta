<?php

namespace App\Http\Requests\Acl\Patient;

use App\Models\Core_Data\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

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
            'first_title' => 'required',
            'second_title' => 'required',
            'gender' => 'required|string',
            'mobile' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|string|unique:users',
            'date_birth' => 'required|date',
            'image'=> 'string',
            'password' => 'required|string|min:6',
            'language_id'=> 'required|exists:languages,id',
        ];
    }
    public function messages()
    {
        if (Language::find($this->language_id)->code == 'ar') {
            return [
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
                'first_title.required' => 'برجاء ادخال الاسم',
                'second_title.required' => 'برجاء ادخال الاسم',
                'gender.required' => 'برجاء ادخال النوع',
                'mobile.required' => 'برجاء ادخال الموبيل',
                'mobile.unique' => 'لا يمكن ادخال الموبيل متكرر',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => 'لا يمكن ادخال البريد الالكتروني متكرر',
                'date_birth.required' => 'برجاء ادخال تاريخ الميلاد',
                'date_birth.date' => 'برجاء ادخال تاريخ الميلاد تاريخ',
                'password.required' => 'برجاء ادخال كلمه السر',
                'password.string' => 'برجاء ادخال كلمه السر حروف',
                'password.min' => 'برجاء ادخال كلمه السر اكثر من 6',
            ];
        }
        else{
            return [];
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response(['status' => 0, 'data' => ['errors'=>$errors]], 400)
        );
    }
}
