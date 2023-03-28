<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class UserStoreRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'The first_name is required.',
            'last_name.required' => 'The last_name is required.',
            'email.required' => 'The email is required.',
            'phone.required' => 'The phone is required.',
            'password.required' => 'The password is required.',
        ];
    }
}
