<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateStoreProductPost extends FormRequest
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
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        return [
            'product_id' =>'|numeric|required|unique:products,product_id,' .$id,
            'nameProduct' => 'required|max:180',
            'priceProduct' => 'required',
            'qtyProduct' => 'required|numeric',
            'categoryProduct' => 'required|numeric',
            'brandProduct' => 'required|numeric',
            'images' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'product_id.required' => 'Mã sản phẩm không được để trống',
            'product_id.unique' => 'Mã sản phẩm là duy nhất',
            'product_id.numeric' =>' Mã sản phẩm phải là số ',
            'nameProduct.required' => 'Tên sản phẩm không được trống',
            'nameProduct.max' => 'Tên sản phẩm không vượt quá  :max ký tự',
            'priceProduct.required' => 'Giá sản phẩm không được trống',
            'qtyProduct.required' => 'Số lượng sản phẩm không được trống',
            'qtyProduct.numeric' => 'Số lượng sản phẩm phải là số',
            'categoryProduct.required' => 'Hãy chọn danh mục sản phẩm',
            'categoryProduct.numeric' => 'ID của danh mục phải là số',
            'brandProduct.required' => 'Hãy chọn thương hiệu sản phẩm',
            'brandProduct.numeric' => 'ID thương hiệu sản phẩm phải là số',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm',
           
        ];
    }
}
