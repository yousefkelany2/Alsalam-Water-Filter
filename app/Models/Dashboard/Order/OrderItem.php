<?php

namespace App\Models\Dashboard\Order;

use App\Models\Dashboard\Order\Order;
use App\Models\Dashboard\Product\Product;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['order_id', 'product_id', 'price', 'quantity', 'line_total'])]
class OrderItem extends Model
{
    protected function casts(): array
    {
        return [
            'price'      => 'float',
            'quantity'   => 'integer',
            'line_total' => 'float',
        ];
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
