<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'unique:App\Models\User,email', 'email', 'min:5', 'max:255'],
            'phone' => ['required', 'regex:/\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}/','min:18'],
            'password' => ['required_with:confirmPassword', 'string', 'same:confirmPassword', 'min:8'],
            'confirmPassword' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтверждение пароля',
            'role' => 'Роль'
        ];
    }
}
