<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Order\OrderItemResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'orderNumber'   => $this->order_number,
            'customer'      => [
                'name'  => $this->customer_name,
                'phone' => $this->customer_phone,
                'email' => $this->customer_email,
            ],
            'governorate'   => $this->governorate->name['ar'] ?? null,
            'city'          => $this->city,
            'address'       => $this->address,
            'notes'         => $this->notes,
            'paymentMethod' => $this->payment_method,
            'items'         => OrderItemResource::collection($this->whenLoaded('items')),
            'subtotal'      => $this->subtotal,
            'shipping'      => $this->shipping,
            'discount'      => $this->discount,
            'total'         => $this->total,
            'status'        => $this->status,
            'createdAt'     => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
