<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePosts extends FormRequest
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
            'title'=>'required',
            'summary'=>'required',
            'description'=>'required',
            'images'=>'required',
            'quote'=>'required',
            'tagPost'=>'required',
            'catePost'=>'required',
            'status'=>'required'
        ];
    }
    public function messages()
    {
        // thong bao loi ra ngoai view
        return [
            'title.required' => 'Trường này không được để trống ',
            'summary.required' =>'Trường này không được để trống',
            'description.required' => 'Trường này không được để trống',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm',
            'quote.required'=>'Trường này không được để trống',
            'post_tag_id'=>'Trường này không được để trống',
            'post_cat_id'=>'Trường này không được để trống',
            'status.required' => 'Trường này không được để trống'
        ];
    }
}
