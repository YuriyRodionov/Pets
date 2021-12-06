<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserCreateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'passport_number' => 'nullable|string',
            'password' => ['required', 'string', Password::min(8)],
        ];
    }

    public function messages(): array
    {
        return parent::messages();
    }

    public function attributes(): array
    {
        return [
            'name' => 'имя',
            'email' => 'почта',
            'phone' => 'телефон',
            'passport_number' => 'паспорт пользователя',
            'password' => 'пароль'
        ];
    }
}
