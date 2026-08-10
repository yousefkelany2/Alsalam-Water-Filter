<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'name_ar'  => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:admins,email',
            'phone'    => 'nullable|string|max:20|unique:admins,phone',
            'password' => 'required|string|min:6|confirmed',

            'role'     => 'required|array',
            'role.ar'  => 'required_with:role|string',
            'role.en'  => 'required_with:role|string',

            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'password.confirmed' => 'Password confirmation does not match',
            'role.ar.required_with' => 'The Arabic role name is required.',
            'role.en.required_with' => 'The English role name is required.',
        ];
    }
}
