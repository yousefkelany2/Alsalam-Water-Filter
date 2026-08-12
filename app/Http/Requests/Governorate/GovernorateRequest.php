<?php

namespace App\Http\Requests\Governorate;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GovernorateRequest extends FormRequest
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
            'name'             => 'required|array',
            'name.ar'          => 'required_with:name|string|max:255',
            'name.en'          => 'required_with:name|string|max:255',
            'shipping_price'   => 'required|numeric|min:0',
            'status'           => 'nullable|string|in:active,inactive',
        ];
    }
}
