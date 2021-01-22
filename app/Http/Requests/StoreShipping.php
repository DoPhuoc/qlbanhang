<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipping extends FormRequest
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
            'title' => 'required|unique:shippings,title',
            'price' => 'required',
            'status'=> 'required'
        ];
    }
    public function messages()
    {
        // thong bao loi ra ngoai view
        return [
            'title.required' => 'Trường này không được để trống ',
            'price.required' => 'Trường này không được để trống',
            'status.required' => 'Trường này không được để trống'
        ];
    }

}
