<?php

namespace App\Http\Requests\Characteristics;

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
            'location' => ['required', 'string', 'min:3', 'max:120'],
            'height' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'health' => ['required', 'string', 'min:1', 'max:1'],
            'description' =>  ['required', 'string', 'min:3', 'max:800']
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'Идентификатор пользователя',
            'location' => 'Расположение',
            'height' => 'Рост',
            'weight' => 'Вес',
            'health' => 'Группа здоровья',
            'description' => 'Описание'
        ];
    }
}
