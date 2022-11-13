<?php

namespace App\Http\Requests\Gyms;

use App\Models\Gyms;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'phone_main' => ['required', 'string'],
            'email' =>  ['required', 'email', 'min:5', 'max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'Идентификатор пользователя',
            'title' => 'Наименование',
            'phone_main' => 'Телефон основной',
            'phone_second' => 'Телефон дополнительный',
            'email' => 'E-mail',
            'url' => 'URL',
            'description' => 'Описание',
        ];
    }
}
