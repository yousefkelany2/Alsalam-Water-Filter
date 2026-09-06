<?php

namespace App\Http\Controllers\Website\Api\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessage\StoreContactRequest;
use App\Models\Dashboard\ContactMessage\ContactMessage;
use Illuminate\Http\Request;

class PublicContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();

        $data['message'] = [
            'ar' => $data['message'],
            'en' => null
        ];

        $data['subject'] = [
            'ar' => 'رسالة من صفحة تواصل معنا',
            'en' => 'Message from Contact Us page'
        ];

        $message = ContactMessage::create($data);

        return response()->json([
            'status'  => true,
            'message' => 'Message sent successfully',
        ], 201);
    }
}
