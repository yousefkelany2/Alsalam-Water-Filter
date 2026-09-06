<?php

namespace App\Http\Requests\Order;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePublicOrderRequest extends FormRequest
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
            'customer'             => 'required|array',
            'customer.fullName'    => 'required|string|min:2',
            'customer.phone'       => 'required|string',
            'customer.email'       => 'nullable|email',
            'customer.governorate' => 'required|exists:governorates,id',
            'customer.city'        => 'required|string',
            'customer.address'     => 'required|string|min:10',
            'items'                => 'required|array|min:1',
            'items.*.product_id'   => 'required|exists:products,id',
            'items.*.quantity'     => 'required|integer|min:1',
            'payment_method'       => 'required|string',
            'notes'                => 'nullable|string',
        ];
    }

    public function toServiceFormat(): array
    {
        $data = $this->validated();

        $items = array_map(function ($item) {
            return [
                'id'  => $item['product_id'],
                'qty' => $item['quantity'],
            ];
        }, $data['items']);

        return [
            'customer_name'  => $data['customer']['fullName'],
            'customer_phone' => $data['customer']['phone'],
            'customer_email' => $data['customer']['email'] ?? null,
            'governorate_id' => $data['customer']['governorate'],
            'city'           => $data['customer']['city'],
            'address'        => $data['customer']['address'],
            'notes'          => $data['notes'] ?? null,
            'discount'       => 0,
            'payment_method' => $data['payment_method'],
            'items'          => $items,
        ];
    }
}
