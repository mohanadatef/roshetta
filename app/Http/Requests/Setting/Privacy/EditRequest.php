<?php

namespace App\Http\Requests\Setting\Privacy;

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
            'detail.*'=>'required'
        ];
    }
    public function messages()
    {
        if (Language_Locale() == 'ar') {
            return [
                'detail.required' => 'برجاء ادخال الاسم',
            ];
        }
        else{
            return [];
        }
    }
}
