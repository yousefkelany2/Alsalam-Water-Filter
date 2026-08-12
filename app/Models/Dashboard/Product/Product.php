<?php

namespace App\Models\Dashboard\Product;

use App\Models\Dashboard\Category\Category;
use App\Models\Dashboard\Order\OrderItem;
use App\Models\Dashboard\Review\Review;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'category_id', 'sku', 'name', 'short_desc', 'description',
    'price', 'old_price', 'in_stock', 'stock_qty',
    'image', 'gallery', 'specifications', 'features',
    'whats_included', 'warranty', 'rating', 'review_count',
    'sales_count', 'featured', 'status'
])]

class Product extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'name'           => 'array',
            'short_desc'     => 'array',
            'description'    => 'array',
            'gallery'        => 'array',
            'specifications' => 'array',
            'features'       => 'array',
            'whats_included' => 'array',
            'warranty'       => 'array',
            'in_stock'       => 'boolean',
            'featured'       => 'boolean',
            'price'          => 'float',
            'old_price'      => 'float',
            'rating'         => 'float',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
