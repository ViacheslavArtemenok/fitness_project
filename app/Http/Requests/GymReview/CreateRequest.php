<?php

namespace App\Http\Requests\GymReview;

use App\Models\GymReview;
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
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'status' =>  ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Наименование',
            'description' => 'Описание',
            'status' => 'Статус',
            'score' => 'Счет',
        ];
    }

}
