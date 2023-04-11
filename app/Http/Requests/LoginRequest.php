<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => __('message.required'),
            'max' => __('message.max'),
            'min' => __('message.min'),
        ];
    }

    public function attributes()
    {
        return [
            // 'username' => 'Tên tài khoản',
            // 'password' => 'Mật khẩu',
        ];
    }
}