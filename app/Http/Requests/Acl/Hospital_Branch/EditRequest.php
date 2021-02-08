<?php

namespace App\Http\Requests\Acl\Hospital_Branch;

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
            'title.*' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'required|exists:areas,id',
            'address.*'=>'required',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
            'title.*.required' => 'برجاء ادخال الاسم',
            'country_id.required' => 'برجاء ادخال البلد',
            'country_id.exists' => 'برجاء ادخال البلد',
            'city_id.required' => 'برجاء ادخال المدينه',
            'city_id.exists' => 'برجاء ادخال المدينه',
            'area_id.required' => 'برجاء ادخال المنطقه',
            'area_id.exists' => 'برجاء ادخال المنطقه',
            'address.*.required' => 'برجاء ادخال العنوان',
        ] : [];
    }
}
