<?php

namespace App\Models\Dashboard\Governorate;

use App\Models\Dashboard\Order\Order;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'shipping_price', 'status'])]
class Governorate extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'name'           => 'array',
            'shipping_price' => 'float',
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
