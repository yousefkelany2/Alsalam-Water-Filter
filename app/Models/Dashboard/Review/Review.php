<?php

namespace App\Models\Dashboard\Review;

use App\Models\Dashboard\Product\Product;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['product_id', 'name', 'rating', 'comment', 'status'])]
class Review extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'comment' => 'array',
            'rating'  => 'integer',
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
