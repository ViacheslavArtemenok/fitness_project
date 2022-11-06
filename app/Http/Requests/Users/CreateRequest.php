<?php

namespace App\Http\Requests\Users;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function __construct()
    {
        $this->roles = Role::all();
    }

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
        $arr = [];
        foreach ($this->roles as $role) {
            $arr[] = $role->id;
        }
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:5', 'max:255'],
            'phone' =>  ['required', 'string'],
            'password' => ['required_with:confirmPassword', 'string', 'same:confirmPassword', 'min:8'],
            'confirmPassword' => ['required', 'string', 'min:8'],
            'role_id' => ['required', 'integer', Rule::in($arr)],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Никнейм',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтверждение пароля',
            'role_id' => 'Роль'
        ];
    }
}
