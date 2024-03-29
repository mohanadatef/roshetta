<?php

namespace App\Http\Requests\Core_Data\Medicine;

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
                'title.*'=>'required|unique_translation:medicines,title,'.$this->id,
                'medicine_category_id' => 'required|exists:medicine_categories,id',
                'order'=> 'required|numeric|unique:medicines,order,'.$this->id.',id',
                'price'=> 'required|numeric',
                'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
            ];

    }
    public function messages()
    {
        return Language_Locale() == 'ar' ? [
                'price.required' => 'برجاء ادخال السعر',
                'detail.*.required' => 'برجاء ادخال الوصف',
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'medicine_category_id.required' => 'برجاء ادخال تخصص الادويه',
                'medicine_category_id.exists' => 'برجاء الاختيار من القائمه',
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
                'order.numeric' => 'برجاء ادخال ارقام',
                'price.numeric' => 'برجاء ادخال ارقام',
            ] : [];
    }
}
