<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTag extends FormRequest
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
            'titleTag' => 'required|max:100|unique:tags,title',
            'descTag' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'titleTag.required' => 'Tên tag không được để trống',
            'titleTag.max' => 'Tên tag không lớn hơn :max ký tự',
            'titleTag.unique' => 'Tên Tag đã tồn tại',
            'descTag.required'=>"Trường này không được để trống",
        ];
    }
}
