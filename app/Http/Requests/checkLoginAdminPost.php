<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkLoginAdminPost extends FormRequest
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
            // khai bao mang cac rules validate data
            'user' => 'required|min:3|max:60',
            'pass' => 'required|min:3|max:60'
        ];
    }

    // tao mot ham thong loi ra ngoai view
    public function messages()
    {
        return [
            'user.required' => 'username khong duoc trong',
            'user.min' => ':attribute khong nho hon :min ki tu',
            'user.max' => ':attribute khong lon hon :max ki tu',
            'pass.required' => ':attribute khong duoc trong',
            'pass.min' => ':attribute khong nho hon :min ki tu',
            'pass.max' => ':attribute khong lon hon :max ki tu',
        ];
    }
}
