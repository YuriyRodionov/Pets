<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplicationUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'integer',
            'address' => 'string|max:255',
            'description' => 'string|max:255',
            'animal_type_id' => 'integer',
            'price' => 'integer',
            'executor_user_id' => 'integer',
            'status' => Rule::in(['PUBLISHED','IN PROGRESS','DONE'])
        ];
    }

    public function messages(): array
    {
        return parent::messages();
    }

    public function attributes(): array
    {
        return [
            'user_id' => 'имя',
            'address' => 'адрес',
            'description' => 'текс',
            'animal_type_id' => 'картинка',
            'price' => 'цена',
            'executor_user_id' => 'исполнитель',
            'status' => 'статус'
        ];
    }
}
