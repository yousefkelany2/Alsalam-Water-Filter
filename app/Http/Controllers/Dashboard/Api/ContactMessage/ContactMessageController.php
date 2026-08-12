<?php

namespace App\Http\Controllers\Dashboard\Api\ContactMessage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactMessage\ContactMessageRequest;
use App\Http\Requests\ContactMessage\UpdateContactMessageRequest;
use App\Http\Resources\ContactMessage\ContactMessageResource;
use App\Models\Dashboard\ContactMessage\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Messages retrieved successfully',
            'data'    => ContactMessageResource::collection($messages),
        ], 200);
    }

    public function store(ContactMessageRequest $request)
    {
        $message = ContactMessage::create($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Message created successfully',
            'data'    => new ContactMessageResource($message),
        ], 201);
    }

    public function show(string $id)
    {
        $message = ContactMessage::find($id);

        if (!$message) {
            return response()->json(['status' => false, 'message' => 'Message not found'], 404);
        }

        if (!$message->read) {
            $message->update(['read' => true]);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Message retrieved successfully',
            'data'    => new ContactMessageResource($message),
        ], 200);
    }

    public function update(UpdateContactMessageRequest $request, string $id)
    {
        $message = ContactMessage::find($id);

        if (!$message) {
            return response()->json(['status' => false, 'message' => 'Message not found'], 404);
        }

        $message->update($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'Message status updated successfully',
            'data'    => new ContactMessageResource($message),
        ], 200);
    }

    public function softDelete(string $id)
    {
        $message = ContactMessage::find($id);

        if (!$message) {
            return response()->json(['status' => false, 'message' => 'Message not found'], 404);
        }

        $message->delete();

        return response()->json(['status' => true, 'message' => 'Message soft deleted successfully']);
    }

    public function trashed()
    {
        $messages = ContactMessage::onlyTrashed()->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Trashed messages retrieved successfully',
            'data'    => ContactMessageResource::collection($messages),
        ], 200);
    }

    public function restore(string $id)
    {
        $message = ContactMessage::withTrashed()->find($id);

        if (!$message || !$message->trashed()) {
            return response()->json(['status' => false, 'message' => 'Message not found or not deleted'], 404);
        }

        $message->restore();

        return response()->json(['status' => true, 'message' => 'Message restored successfully']);
    }

    public function forceDelete(string $id)
    {
        $message = ContactMessage::withTrashed()->find($id);

        if (!$message) {
            return response()->json(['status' => false, 'message' => 'Message not found'], 404);
        }

        $message->forceDelete();

        return response()->json(['status' => true, 'message' => 'Message permanently deleted']);
    }
}
