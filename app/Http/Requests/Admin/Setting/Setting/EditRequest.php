<?php

namespace App\Http\Requests\Admin\Setting\Setting;

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
                'facebook'=> 'required',
                'youtube'=> 'required',
                'twitter'=> 'required',
                'instagram'=> 'required',
                'app_google'=> 'required',
                'app_ios'=> 'required',
                'logo' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            ];
    }
    public function messages()
    {
        if (\Illuminate\Support\Facades\App::getLocale() == 'ar') {
            return [
                'title.required' => 'برجاء ادخال الاسم',
                'title.string' => 'برجاء ادخال الاسم حروف',
                'title.unique' => 'لا يمكن ادخال الاسم متكرر',
                'code.required' => 'برجاء ادخال كود',
                'code.string' => 'برجاء ادخال كود حروف',
                'code.unique' => 'لا يمكن ادخال كود متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'logo.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'logo.max' => 'برجاء ادخال الصوره اقل من 2048',
                'app_ios.required' => 'برجاء ادخال متجر ابل',
                'app_google.required' => 'برجاء ادخال متجر جوجل',
                'instagram.required' => 'برجاء ادخال انستجرام',
            ];
        }
        else{
            return [];
        }
    }
}
