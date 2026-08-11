<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'category_id'    => $this->category_id,
            'sku'            => $this->sku,
            'name'           => $this->name,
            'shortDesc'      => $this->short_desc,
            'description'    => $this->description,
            'price'          => $this->price,
            'oldPrice'       => $this->old_price,
            'rating'         => $this->rating,
            'reviewCount'    => $this->review_count,
            'inStock'        => $this->in_stock,
            'stockQty'       => $this->stock_qty,
            'image'          => $this->image ? url('storage/' . $this->image) : null,
            'gallery'        => $this->formatGallery(),
            'specifications' => $this->specifications,
            'features'       => $this->features,
            'whatsIncluded'  => $this->whats_included,
            'warranty'       => $this->warranty,
            'salesCount'     => $this->sales_count,
            'featured'       => $this->featured,
            'status'         => $this->status,
            'createdAt'      => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }

    private function formatGallery(): ?array
    {
        if (!$this->gallery) return null;
        return array_map(fn($path) => url('storage/' . $path), $this->gallery);
    }
}
