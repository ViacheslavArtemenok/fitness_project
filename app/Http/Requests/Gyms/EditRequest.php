<?php

namespace App\Http\Requests\Gyms;

use App\Models\Gyms;
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
            'gym_id' => ['required', 'integer'],
            'index' => ['required', 'integer'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'street' => ['required', 'string'],
            'house_number' => ['required', 'string'],
            'floor' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'gym_id' => 'Идентификатор тренажерного зала',
            'index' => 'Индекс',
            'country' => 'Страна',
            'city' => 'Город',
            'street' => 'Улица',
            'house_number' => 'Номер дома',
            'building' => 'Строение',
            'floor' => 'Этаж',
            'apartment' => 'Квартира',
        ];
    }
}
