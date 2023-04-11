<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|max:50|unique:users|alpha_dash',
            'email' => 'required|max:50|unique:users|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('message.required'),
            'alpha_dash' => __('message.alpha_dash'),
            'email' => __('message.email'),
            'max' => __('message.max'),
            'min' => __('message.min'),
            'same' => __('message.same'),
            'unique' => __('message.unique')
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tên tài khoản',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Nhập lại mật khẩu',
        ];
    }
}