<?php

namespace App\Http\Requests\Review;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'name'       => 'required|string|max:255',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|array',
            'comment.ar' => 'required_with:comment|string',
            'comment.en' => 'required_with:comment|string',
            'status'     => 'nullable|in:pending,approved,rejected',
        ];
    }
}
