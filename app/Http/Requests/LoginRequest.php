<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => 'required|email:filter',
            'password' => 'required|min:4|max:30',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Không được bỏ trống email',
            'email.email'       => 'Email không đúng định dạng',
            'password.required' => 'Không được bỏ trống mật khẩu',
            'password.max'      => 'Mật khẩu không quá 30 kí tự',
            'password.min'      => 'Mật khẩu không dưới 5 kí tự',
        ];
    }
}
