<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserUpdateRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => ['required', 'email'],
            'date_of_birth' => ['nullable', 'date'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле имя обязательное',
            'last_name.required' => 'Поле фамилия обязательное',
            'password.required' => 'Поле пароль обязательное',
            'email.required' => 'Поле почта обязательное',
            'email.email' => 'Почтовый адрес введен неверно',
            'date_of_birth.date' => 'Укажите дату',
        ];
    }
}
