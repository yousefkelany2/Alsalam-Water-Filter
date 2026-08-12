<?php

namespace App\Models\Dashboard\Governorate;

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
}
