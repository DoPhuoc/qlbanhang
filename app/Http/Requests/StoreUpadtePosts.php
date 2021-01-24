<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class StoreUpadtePosts extends FormRequest
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
        $id = $request->id;
        return [
            'title'=>'required|unique:posts,title,'.$id,
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
            'title.unique' => 'Tên bài viết đã tồn tại',
            'description.required' => 'Trường này không được để trống',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm',
            'quote.required'=>'Truong nay khong duoc de trong',
            'post_tag_id'=>'Trường này không được để trống',
            'post_cat_id'=>'Trường này không được để trống',
            'status.required' => 'Trường này không được để trống'
        ];
    }
}
