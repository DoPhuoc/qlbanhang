<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class StoreUpdatePostCategories extends FormRequest
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
    public function rules(Request $request)
    {
        $id = $request->hddIDCategory;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        return [
            'nameCate' => 'required|unique:post_categories,title,'.$id,
            'descCate' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nameCate.required' =>'Tên danh mục không được để trống',
            'nameCate.unique' => 'Ten danh muc bai viet da ton tai, vui long chon ten khac',
            'descCate.required'=>"Trường này không được để trông",
        ];
    }
}
