<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'productId' => $this->product_id,
            'product'   => $this->whenLoaded('product', function () {
                return [
                    'id'   => $this->product->id,
                    'name' => $this->product->name,
                ];
            }),
            'name'      => $this->name,
            'rating'    => $this->rating,
            'comment'   => $this->comment,
            'status'    => $this->status,
            'date'      => $this->created_at?->format('Y-m-d'),
            'createdAt' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
