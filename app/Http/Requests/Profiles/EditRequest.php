<?php

namespace App\Http\Requests\Profiles;

use Illuminate\Foundation\Http\FormRequest;

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
            'firstName' => ['required', 'string', 'min:3', 'max:100'],
            'lastName' => ['required', 'string', 'min:3', 'max:100'],
            'fatherName' => ['required', 'string', 'min:3', 'max:100'],
            'age' =>  ['required', 'integer'],
            'gender' => ['required', 'string'],
            'image' => ['required', 'string', 'min:3', 'max:100']
        ];
    }

    public function attributes(): array
    {
        return [
            'firstName' => 'Имя',
            'lastName' => 'Фамилия',
            'fatherName' => 'Отчество',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'image' => 'Аватар'
        ];
    }
}
