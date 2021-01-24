<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class StoreUpdateCoupon extends FormRequest
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
            'code' => 'required|unique:coupons,code,'.$id,
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Mã coupon không được để trống',
            'code.unique' => 'Mã code là duy nhất',
            'status.required' => 'Trường này không được để trống',
            
        ];
    }
}
