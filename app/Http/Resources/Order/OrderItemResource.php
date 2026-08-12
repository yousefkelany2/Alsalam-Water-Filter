<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'productId' => $this->product_id,
            'name'      => $this->product->name ?? null,
            'image'     => $this->product?->image ? url('storage/' . $this->product->image) : null,
            'price'     => $this->price,
            'quantity'  => $this->quantity,
            'lineTotal' => $this->line_total,
        ];
    }
}
