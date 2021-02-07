<?php

namespace App\Http\Requests\Acl\Hospital;

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
            'title_doctor.*' => 'required',
            'detail.*' => 'required',
            'university.*' => 'required',
            'status_mobile' => 'required|string',
            'status_home' => 'required|string',
            'license' => 'required|string',
            'year_experience' => 'required|numeric',
            'image_license' => 'image|mimes:jpg,jpeg,png|max:2048',
            'image_university' => 'image|mimes:jpg,jpeg,png|max:2048',
            'specialty_id' => 'required|exists:specialties,id',
            'scientific_degree_id' => 'required|exists:scientific_degrees,id',
            'date_license_end' => 'required|date',
            'sub_specialty.*' => 'required|exists:sub_specialties,id',
        ];
    }

    public function messages()
    {
        return Language_Locale() == 'ar' ? [
            'title_doctor.*.required' => 'برجاء ادخال الاسم',
            'detail.*.required' => 'برجاء ادخال الوصف',
            'university.*.required' => 'برجاء ادخال جامعه',
            'status_mobile.required' => 'برجاء ادخال امكانيه الكشف موبيل',
            'status_home.required' => 'برجاء ادخال امكانيه الكشف المنزل',
            'license.required' => 'برجاء ادخال رقم الترخيص',
            'license.string' => 'برجاء ادخال رقم الترخيص حروف',
            'year_experience.required' => 'برجاء ادخال سنين الخيره',
            'year_experience.numeric' => 'برجاء ادخال سنين الخيره ارقام',
            'image_license.mimes' => 'برجاء ادخال الصوره الترخيص jpg,jpeg,png,gif',
            'image_license.max' => 'برجاء ادخال الصوره الترخيص اقل من 2048',
            'image_university.mimes' => 'برجاء ادخال الصوره جامعه jpg,jpeg,png,gif',
            'image_university.max' => 'برجاء ادخال الصوره جامعه اقل من 2048',
            'date_license_end.required' => 'برجاء ادخال تاريخ انتهاء الترخيص',
            'date_license.date' => 'برجاء ادخال تاريخ انتهاء الترخيص تاريخ',
            'specialty_id.required' => 'برجاء ادخال التخصص',
            'specialty_id.exists' => 'برجاء ادخال التخصص',
            'scientific_degree_id.required' => 'برجاء ادخال الدرجه العلميه',
            'scientific_degree_id.exists' => 'برجاء ادخال الدرجه العلميه',
            'sub_specialty.required' => 'برجاء ادخال تخصص التخصصات',
            'sub_specialty.exists' => 'برجاء ادخال تخصص التخصصات',
        ] : [];
    }
}
