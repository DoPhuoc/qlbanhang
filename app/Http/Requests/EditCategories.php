<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Http\Request;
class EditCategories extends FormRequest
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
        //$id = $request->id;
        //$id = is_numeric($id) && $id > 0 ? $id : 0;
        return [
            'nameCate' => 'unique:categories,name'.$this->segment(3).',id',
            'descCate' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nameCate.required' => 'Tên danh mục không được để trống',
            'nameCate.max' => 'Tên danh mục không lớn hơn :max ký tự',
            'nameCate.unique' => 'Ten danh mục đã tồn tại',
            'descCate.required'=>"Trường này không được để trông",
        ];
    }
}
