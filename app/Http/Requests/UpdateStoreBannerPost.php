<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateStoreBannerPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules(Request $request)
    {
        return [
            'title' => 'required|max:100|unique:banners,title,'.request()->banner->id,
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Ten thuong hieu khong duoc trong',
            'title.unique' => 'Ten thuong hieu da ton tai, vui long chon ten khac',
            'title.max' => 'Tên banner không vượt quá :max ký tự',
            'status.required' => 'Vui long chon trang thai thuong hieu',
        ];
    }

}
