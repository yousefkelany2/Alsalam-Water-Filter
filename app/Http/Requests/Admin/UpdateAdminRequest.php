<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
        $adminId = $this->route('id');

        return [
            'name'     => 'sometimes|required|string|max:255',
            'name_ar'  => 'sometimes|required|string|max:255',
            'email'    => 'sometimes|required|email|max:255|unique:admins,email,' . $adminId,
            'phone'    => 'nullable|string|max:20|unique:admins,phone,' . $adminId,

            'password'     => 'nullable|string|min:6|confirmed',
            'old_password' => 'required_with:password|string',

            'role'     => 'sometimes|required|array',
            'role.ar'  => 'required_with:role|string',
            'role.en'  => 'required_with:role|string',

            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'password.confirmed' => 'Password confirmation does not match',
            'old_password.required_with' => 'You must provide your old password to set a new one.',
        ];
    }
}
