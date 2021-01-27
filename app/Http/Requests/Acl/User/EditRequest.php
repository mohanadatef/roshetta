<?php

namespace App\Http\Requests\Acl\User;

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
            'first_title.*' => 'required',
            'second_title.*' => 'required',
            'gender' => 'required|string',
            'mobile' => 'required|string|max:255|unique:users,mobile,'.$this->id.',id',
            'email' => 'required|email|max:255|string|unique:users,email,'.$this->id.',id',
            'date_birth' => 'required|date',
            'image'=> 'image|mimes:jpg,jpeg,png|max:2048',
            'role_id'=> 'required|exists:roles,id',
        ];
    }
    public function messages()
    {
        if (User::find($this->id)->language->code == 'ar') {
            return [
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
                'first_title.*.required' => 'برجاء ادخال الاسم',
                'second_title.*.required' => 'برجاء ادخال الاسم',
                'gender.required' => 'برجاء ادخال النوع',
                'mobile.required' => 'برجاء ادخال الموبيل',
                'mobile.unique' => 'لا يمكن ادخال الموبيل متكرر',
                'email.required' => 'برجاء ادخال البريد الالكتروني',
                'email.unique' => 'لا يمكن ادخال البريد الالكتروني متكرر',
                'date_birth.required' => 'برجاء ادخال تاريخ الميلاد',
                'date_birth.date' => 'برجاء ادخال تاريخ الميلاد تاريخ',
                'role_id.required' => 'برجاء ادخال صلحيات',
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
