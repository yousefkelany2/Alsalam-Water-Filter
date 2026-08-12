<?php

namespace App\Models\Dashboard\ContactMessage;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name', 'email', 'phone', 'subject', 'message', 'read'])]
class ContactMessage extends Model
{
    use SoftDeletes;

    protected function casts(): array
    {
        return [
            'subject' => 'array',
            'message' => 'array',
            'read'    => 'boolean',
        ];
    }
}
