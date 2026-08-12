<?php

namespace App\Http\Requests\Review;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
            'product_id' => 'sometimes|required|exists:products,id',
            'name'       => 'sometimes|required|string|max:255',
            'rating'     => 'sometimes|required|integer|min:1|max:5',
            'comment'    => 'sometimes|required|array',
            'comment.ar' => 'required_with:comment|string',
            'comment.en' => 'required_with:comment|string',
            'status'     => 'sometimes|required|in:pending,approved,rejected',
        ];
    }
}
