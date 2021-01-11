<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'product_id' =>'required|unique:products,product_id|numeric',
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
            'product_id.required' => 'Max sarn pham khong duoc de trong',
            'product_id.unique' => 'Ma san pham la duy nhat',
            'product_id.numeric' =>' Ma san pham phai la so ',
            'nameProduct.required' => 'Tên sản phẩm không được trống',
            'nameProduct.max' => 'Tên sản phẩm không vượt quá  :max ký tự',
            'priceProduct.required' => 'Giá sản phẩm không được trống',
            'qtyProduct.required' => 'Số lượng sản phẩm không được trống',
            'qtyProduct.numeric' => 'Số lượng sản phẩm phải là số',
            'categoryProduct.required' => 'Hãy chọn danh mục sản phẩm',
            'categoryProduct.numeric' => 'ID của danh mục phải là số',
            'brandProduct.required' => 'Hãy chọn thương hiệu sản phẩm',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm',
           
        ];
    }
}
