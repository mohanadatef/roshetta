<?php

namespace App\Http\Requests\Core_Data\Product;

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
            'title.*'=>'required|unique_translation:products',
            'product_category_id' => 'required|exists:product_categories,id',
            'order' => 'required|unique:products',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        if (Language_Locale() == 'ar') {
            return [
                'title.*.required' => 'برجاء ادخال الاسم',
                'title.*.unique_translation' => 'لا يمكن ادخال الاسم متكرر',
                'order.required' => 'برجاء ادخال الترتيب',
                'order.unique' => 'لا يمكن ادخال الترتيب متكرر',
                'product_category_id.required' => 'برجاء ادخال تخصص المنتج',
                'product_category_id.exists' => 'برجاء الاختيار من القائمه',
                'image.required' => 'برجاء ادخال الصوره',
                'image.mimes' => 'برجاء ادخال الصوره jpg,jpeg,png,gif',
                'image.max' => 'برجاء ادخال الصوره اقل من 2048',
            ];
        }
        else{
            return [];
        }
    }
}
