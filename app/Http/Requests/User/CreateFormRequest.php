<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'name'=>'required',
            'email' => 'required||email',
            'password' => 'required',
            'role_id' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'required' => __('message.required'),
            'email' => __('message.email'),
            'numeric' => __('message.min'),
        ];
    }
}
