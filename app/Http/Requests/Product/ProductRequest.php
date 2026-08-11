<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'      => 'required|exists:categories,id',
            'sku'              => 'nullable|string|max:255|unique:products,sku',
            'name'             => 'required|array',
            'name.ar'          => 'required_with:name|string',
            'name.en'          => 'required_with:name|string',
            'description'      => 'required|array',
            'short_desc'       => 'nullable|array',
            'price'            => 'required|numeric|min:0',
            'old_price'        => 'nullable|numeric|min:0',
            'stock_qty'        => 'required|integer|min:0',

            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp,jfif|max:2048',
            'gallery'          => 'nullable|array',
            'gallery.*'        => 'image|mimes:jpeg,png,jpg,webp,jfif|max:2048',

            'specifications'   => 'nullable|array',
            'features'         => 'nullable|array',
            'whats_included'   => 'nullable|array',
            'warranty'         => 'nullable|array',
            'featured'         => 'nullable|boolean',
            'status'           => 'nullable|string|in:active,inactive',
        ];
    }
}
