<?php

namespace App\Models\Dashboard\Category;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'icon', 'status'])]
class Category extends Model
{
    use SoftDeletes;


    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'name' => 'array',
        ];
    }
}
