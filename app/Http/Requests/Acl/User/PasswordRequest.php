<?php

namespace App\Http\Requests\Acl\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function messages()
    {
        if (Language_Locale() == 'ar') {
            return [
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
