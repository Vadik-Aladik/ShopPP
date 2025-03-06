<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|exists:users,email',
            'password'=> 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return[
            'email.required' => 'Данная строка пустая',
            'email.string' => 'Данная строка не стринговая',
            'email.email' => 'Вы не ввели почту',
            'email.max' => 'Почта слишком длинная(максимальная длина: 255)',
            'email.exists' => "Данной почты не существует",
            'password.required' => 'Данная строка пустая',
            'password.string' => 'Данная строка не стринговая',
            'password.min' => 'Пароль должен содержать не менее 8 символов',
        ];
    }
}
