<?php

namespace App\Http\Requests\Acl\Hospital;

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
            'title.*' => 'required',
            'detail.*' => 'required',
            'license' => 'required|string',
            'image_license' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'required|exists:areas,id',
            'company_insurance.*' => 'exists:company_insurances,id',
            'date_license_end' => 'required|date',
            'address.*'=>'required',
            'mobile'=>'required|numeric|digits:11',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
            'title.*.required' => 'برجاء ادخال الاسم',
            'image_license.required' => 'برجاء ادخال صوره الترخيص',
            'image.required' => 'برجاء ادخال صوره شهاده الجامعه',
            'detail.*.required' => 'برجاء ادخال الوصف',
            'license.required' => 'برجاء ادخال رقم الترخيص',
            'license.string' => 'برجاء ادخال رقم الترخيص حروف',
            'image_license.mimes' => 'برجاء ادخال الصوره الترخيص jpg,jpeg,png,gif',
            'image_license.max' => 'برجاء ادخال الصوره الترخيص اقل من 2048',
            'image.mimes' => 'برجاء ادخال الصوره جامعه jpg,jpeg,png,gif',
            'image.max' => 'برجاء ادخال الصوره جامعه اقل من 2048',
            'date_license_end.required' => 'برجاء ادخال تاريخ انتهاء الترخيص',
            'date_license.date' => 'برجاء ادخال تاريخ انتهاء الترخيص تاريخ',
            'country_id.required' => 'برجاء ادخال البلد',
            'country_id.exists' => 'برجاء ادخال البلد',
            'city_id.required' => 'برجاء ادخال المدينه',
            'city_id.exists' => 'برجاء ادخال المدينه',
            'area_id.required' => 'برجاء ادخال المنطقه',
            'area_id.exists' => 'برجاء ادخال المنطقه',
            'company_insurance.required' => 'برجاء ادخال شركه التامين',
            'company_insurance.exists' => 'برجاء ادخال شركه التامين',
            'address.*.required' => 'برجاء ادخال العنوان',
            'mobile.required' => 'برجاء ادخال الهاتف',
            'mobile.numeric' => 'برجاء ادخال ارقام',
            'mobile.digits' => 'برجاء ادخال ارقام 11',
        ] : [];
    }
}
