<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends FormRequest
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
            'name' => 'string|max:255',
            'email' => 'string|email',
            'phone' => 'string',
            'users_role' => Rule::in(['applicant','executor']),
            'passport_number' => 'integer',
            'is_admin' => 'boolean',
            'password' => ['string', Password::min(8)],
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
            'users_role' => 'роль',
            'passport_number' => 'паспорт пользователя',
            'is_admin' => 'админ',
            'password' => 'пароль'
        ];
    }
}
