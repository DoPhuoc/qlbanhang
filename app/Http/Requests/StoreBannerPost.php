<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerPost extends FormRequest
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
            'titleBanner'=> 'required|max:100',
            'photoBanner' => 'required|mimes:jpeg,bmp,png,jpg'
        ];
    }
    public function messages()
    {
        return [
            'titleBanner.required' => 'Ten banner khong duoc trong',
            'titleBanner.max' => 'Ten banner khong vuot qua :max ky tu',
            'photoBanner.required' => 'Nhap anh ',
            'photoBanner.mimes' => 'Dinh dang banner la anh: jpeg,bmp,png,jpg'
        ];
    }
}
