<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required||email',
            'phone_number' => 'required||numeric',
            'address' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'required' => __('message.required'),
            'numeric' => __('message.max'),
            'email' => __('message.email'),
        ];
    }
}
