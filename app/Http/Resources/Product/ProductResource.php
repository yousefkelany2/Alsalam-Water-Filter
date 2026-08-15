<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Review\ReviewResource; // استدعاء ملف الـ ReviewResource
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
            'rating'         => $this->reviews_avg_rating ? round($this->reviews_avg_rating, 1) : (float) ($this->rating ?? 0),
            'reviewCount'    => $this->reviews_count ?? (int) ($this->review_count ?? 0),
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
            'reviews'        => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }

    private function formatGallery(): ?array
    {
        if (!$this->gallery) return null;
        return array_map(fn($path) => url('storage/' . $path), $this->gallery);
    }
}
