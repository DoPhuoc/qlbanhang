<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateStoreBannerPost extends FormRequest
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
     * @param Request $request
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        return [
            'titleBanner' => 'required|max:100|unique:banners,title,'.$id,
            'statusBanner' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'titleBanner.required' => 'Ten thuong hieu khong duoc trong',
            'titleBanner.unique' => 'Ten thuong hieu da ton tai, vui long chon ten khac',
            'titleBanner.max' => 'Tên banner không vượt quá :max ký tự',
            'statusBanner.required' => 'Vui long chon trang thai thuong hieu',
        ];
    }

}
