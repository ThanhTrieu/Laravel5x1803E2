<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManufacturePost extends FormRequest
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
            'nameManu' => 'required|min:3|unique:manufactures,name',
            'addressManu' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'nameManu.required' => ':attribute khong duoc de trong',
            'nameManu.min' => ':attribute khong duoc nho hon :min ki tu',
            'addressManu.required' => ':attribute khong duoc de trong',
            'addressManu.min' => ':attribute khong duoc nho hon :min ki tu',
            'nameManu.unique' => ':attribute da ton tai, chon :attribute khac'
        ];
    }
}
