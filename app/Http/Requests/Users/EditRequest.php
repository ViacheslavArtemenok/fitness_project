<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
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
            'email' => ['required', 'email', 'min:5', 'max:255'],
            'phone' =>  ['required', 'string'],
            'password' => ['required', 'min:8', 'max:50'],
            'newPassword' => ['nullable', 'min:8', 'max:50', 'confirmed'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Никнейм',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'newPassword' => 'Новый пароль',
        ];
    }
}
