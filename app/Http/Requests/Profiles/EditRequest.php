<?php

namespace App\Http\Requests\Profiles;

use App\Models\Profile;
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
            'user_id' => ['required', 'integer'],
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'last_name' => ['required', 'string', 'min:3', 'max:100'],
            'father_name' => ['required', 'string', 'min:3', 'max:100'],
            'age' =>  ['required', 'integer'],
            'gender' => ['required', Rule::in([Profile::MALE, Profile::FEMALE])],
            'image' => ['required', 'image',  'mimes:jpeg, png, jpg']
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'Идентификатор пользователя',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'father_name' => 'Отчество',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'image' => 'Аватар'
        ];
    }
}
