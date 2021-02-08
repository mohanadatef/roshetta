<?php

namespace App\Http\Requests\Acl\Clinic_Doctor;

use Illuminate\Foundation\Http\FormRequest;

class FindRequest extends FormRequest
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
            'code' => 'required|exists:doctors,code_number',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
            'code.required' => 'برجاء ادخال الاسم',
        ] : [];
    }
}
