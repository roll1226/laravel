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
            'user' => 'required|email', // 必須チェック
            'passwd' => 'required|min:6', // 必須チェック
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'ユーザIDは必須です。',
            'user.email' => 'ユーザIDはメールアドレスを入力してください。',
            'passwd.required' => 'パスワードは必須です。',
            'passwd.min' => 'パスワード6文字以上で入力してください。',
        ];
    }
}
