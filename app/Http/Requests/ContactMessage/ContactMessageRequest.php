<?php

namespace App\Http\Requests\ContactMessage;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
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
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',

            'subject'    => 'required|array',
            'subject.ar' => 'required_with:subject|string',
            'subject.en' => 'required_with:subject|string',

            'message'    => 'required|array',
            'message.ar' => 'required_with:message|string',
            'message.en' => 'required_with:message|string',

            'read'       => 'nullable|boolean',
        ];
    }
}
