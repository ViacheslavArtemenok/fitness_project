<?php

namespace App\Http\Requests\Profiles;

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
            'user_id' => ['required', 'integer'],
            'first_name' => ['required', 'string', 'min:3', 'max:100'],
            'last_name' => ['required', 'string', 'min:3', 'max:100'],
            'father_name' => ['required', 'string', 'min:3', 'max:100'],
            'age' =>  ['required', 'integer'],
            'gender' => ['required', 'string'],
            'image' => ['required', 'min:3', 'max:100']
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'Идентификатор',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'father_name' => 'Отчество',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'image' => 'Аватар'
        ];
    }
}
