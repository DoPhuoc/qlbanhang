<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class StoreUpdateTag extends FormRequest
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
            'titleTag' => 'required|max:100|unique:tags,title,'.$id,
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
