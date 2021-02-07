<?php

namespace App\Http\Requests\Acl\Vendor;

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
            'address.*' => 'required',
            'detail.*' => 'required',
            'license' => 'required|string',
            'image_license' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'date_license_end' => 'required|date',
            'mobile' => 'required|numeric|digits:11',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
            'title.*.required' => 'برجاء ادخال الاسم',
            'address.*.required' => 'برجاء ادخال العنوان',
            'detail.*.required' => 'برجاء ادخال الوصف',
            'license.required' => 'برجاء ادخال رقم الترخيص',
            'license.string' => 'برجاء ادخال رقم الترخيص حروف',
            'image_license.required' => 'برجاء ادخال صوره الترخيص',
            'image_license.mimes' => 'برجاء ادخال الصوره الترخيص jpg,jpeg,png,gif',
            'image_license.max' => 'برجاء ادخال الصوره الترخيص اقل من 2048',
            'image.required' => 'برجاء ادخال صوره',
            'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
            'image.max' => 'برجاء ادخال الصوره اقل من 2048',
            'date_license_end.required' => 'برجاء ادخال تاريخ انتهاء الترخيص',
            'date_license.date' => 'برجاء ادخال تاريخ انتهاء الترخيص تاريخ',
            'mobile.required' => 'برجاء ادخال الموبيل',
            'mobile.unique' => 'لا يمكن ادخال الموبيل متكرر',
        ] : [];
    }
}
