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
            'user_id' => 'required|integer',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'animal_type_id' => 'required|integer',
            'price' => 'required|string',
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
            'status' => 'статус'
        ];
    }
}
