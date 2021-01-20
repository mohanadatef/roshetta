<?php

namespace App\Http\Requests\Setting\About_Us;

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
            'detail.*'=>'required',
            'image'=> 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }
    public function messages()
    {
        if (Language_Locale() == 'ar') {
            return [
                'detail.*.required' => 'برجاء ادخال الوصف',
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
            ];
        }
        else{
            return [];
        }
    }
}
