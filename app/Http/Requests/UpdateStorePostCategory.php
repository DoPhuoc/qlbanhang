<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateStorePostCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'title' => 'required|unique:post_categories,title,'.request()->postCategory->id,
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' =>'Tên danh mục không được để trống',
            'title.unique' => 'Ten danh muc bai viet da ton tai, vui long chon ten khac',
            'description.required'=>"Trường này không được để trông",
        ];
    }
}
