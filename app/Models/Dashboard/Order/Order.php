<?php

namespace App\Models\Dashboard\Order;

use App\Models\Dashboard\Governorate\Governorate;
use App\Models\Dashboard\Order\OrderItem;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'order_number', 'customer_name', 'customer_phone', 'customer_email',
    'governorate_id', 'city', 'address', 'notes', 'payment_method',
    'subtotal', 'shipping', 'discount', 'total', 'status'
])]
class Order extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'subtotal' => 'float',
            'shipping' => 'float',
            'discount' => 'float',
            'total'    => 'float',
        ];
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
}
