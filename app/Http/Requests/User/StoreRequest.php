<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:64',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'passwordConfirm' => 'required|string|min:8|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Данная строка пустая',
            'name.string' => 'Данная строка не стринговая',
            'name.max' => 'Ваше имя слишком длинное (максимальная длина: 64)',
            'email.required' => 'Данная строка пустая',
            'email.string' => 'Данная строка не стринговая',
            'email.email' => 'Вы не ввели почту',
            'email.max' => 'Почта слишком длинная(максимальная длина: 255)',
            'email.unique' => 'Данная почта уже существует',
            'password.required' => 'Данная строка пустая',
            'password.string' => 'Данная строка не стринговая',
            'password.min' => 'Пароль должен содержать не менее 8 символов',
            'passwordConfirm.required' => 'Данная строка пустая',
            'passwordConfirm.string' => 'Данная строка не стринговая',
            'passwordConfirm.min' => 'Пароль должен содержать не менее 8 символов',
            'passwordConfirm.same' => 'Пароли не совпадают',
        ];
    }
}
