<?php

namespace App\Http\Requests\Acl\Patient;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'first_title' => 'required',
            'second_title' => 'required',
            'gender' => 'required|string',
            'mobile' => 'required|numeric|digits:11|unique:users,mobile,'.$this->id.',id',
            'email' => 'required|email|max:255|string|unique:users,email,'.$this->id.',id',
            'date_birth' => 'required|date',
            'image'=> 'string',
            'language_id'=> 'required|exists:languages,id',
        ];
    }
    public function messages()
    {
        if (check_locale_language($this->language_id) == 'ar') {
            return [
                'image.string' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'first_title.required' => 'برجاء ادخال الاسم',
                'second_title.required' => 'برجاء ادخال الاسم',
                'gender.required' => 'برجاء ادخال النوع',
                'mobile.required' => 'برجاء ادخال الموبيل',
                'mobile.unique' => 'لا يمكن ادخال الموبيل متكرر',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => 'لا يمكن ادخال البريد الالكتروني متكرر',
                'date_birth.required' => 'برجاء ادخال تاريخ الميلاد',
                'date_birth.date' => 'برجاء ادخال تاريخ الميلاد تاريخ',
                'mobile.numeric' => 'برجاء ادخال ارقام',
                'mobile.digits' => 'برجاء ادخال ارقام 11',
                'language_id.required' => 'برجاء ادخال اللغه',
                'language_id.exists' => 'برجاء ادخال اللغه من القائمه',
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
