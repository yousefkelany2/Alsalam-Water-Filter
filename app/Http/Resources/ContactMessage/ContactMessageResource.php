<?php

namespace App\Http\Resources\ContactMessage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'subject'   => $this->subject,
            'message'   => $this->message,
            'read'      => $this->read,
            'createdAt' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
